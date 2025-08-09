<?php namespace App\Controllers;

use App\Models\ExpenseModel;

class ExpenseController extends BaseController
{
    protected $session;
    public function __construct()
    {
        helper(['form','url']);
        $this->session = session();
    }

    protected function ensureLoggedIn()
    {
        if (!$this->session->get('user_id')) {
            return redirect()->to('/login')->with('error','Please login');
        }
    }

    public function index()
    {
        // basic auth guard
        if (!$this->session->get('user_id')) {
            return redirect()->to('/login');
        }

        $model = new ExpenseModel();

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $expenses = $model->like('title', $keyword)
                              ->orLike('category', $keyword)
                              ->orderBy('expense_date', 'DESC')
                              ->paginate(10);
        } else {
            $expenses = $model->orderBy('expense_date', 'DESC')->paginate(10);
        }

        // chart data (monthly totals)
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT DATE_FORMAT(expense_date, '%Y-%m') AS ym, SUM(amount) AS total
            FROM expenses
            GROUP BY ym
            ORDER BY ym ASC
        ");
        $rows = $query->getResult();
        $labels = [];
        $totals = [];
        foreach ($rows as $r) {
            $labels[] = $r->ym;
            $totals[] = (float) $r->total;
        }

        echo view('templates/header', ['title'=>'Expenses']);
        echo view('expenses/index', [
            'expenses' => $expenses,
            'pager'    => $model->pager,
            'chart_labels' => json_encode($labels),
            'chart_totals' => json_encode($totals)
        ]);
        echo view('templates/footer');
    }

    public function create()
    {
        if (!$this->session->get('user_id')) return redirect()->to('/login');

        echo view('templates/header', ['title'=>'Add Expense']);
        echo view('expenses/create');
        echo view('templates/footer');
    }

    public function store()
    {
        if (!$this->session->get('user_id')) return redirect()->to('/login');

        $rules = [
            'title' => 'required|min_length[2]|max_length[191]',
            'category' => 'required',
            'amount' => 'required|decimal',
            'expense_date' => 'required'
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new ExpenseModel();
        $model->save([
            'title' => $this->request->getVar('title'),
            'category' => $this->request->getVar('category'),
            'amount' => $this->request->getVar('amount'),
            'expense_date' => $this->request->getVar('expense_date'),
        ]);

        return redirect()->to('/expenses')->with('success','Expense added');
    }

    public function edit($id = null)
    {
        if (!$this->session->get('user_id')) return redirect()->to('/login');

        $model = new ExpenseModel();
        $expense = $model->find($id);
        if (!$expense) return redirect()->to('/expenses')->with('error','Not found');

        echo view('templates/header', ['title'=>'Edit Expense']);
        echo view('expenses/edit', ['expense' => $expense]);
        echo view('templates/footer');
    }

    public function update($id = null)
    {
        if (!$this->session->get('user_id')) return redirect()->to('/login');

        $rules = [
            'title' => 'required|min_length[2]|max_length[191]',
            'category' => 'required',
            'amount' => 'required|decimal',
            'expense_date' => 'required'
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new ExpenseModel();
        $model->update($id, [
            'title' => $this->request->getVar('title'),
            'category' => $this->request->getVar('category'),
            'amount' => $this->request->getVar('amount'),
            'expense_date' => $this->request->getVar('expense_date'),
        ]);

        return redirect()->to('/expenses')->with('success','Expense updated');
    }

    public function delete($id = null)
    {
        if (!$this->session->get('user_id')) return redirect()->to('/login');

        $model = new ExpenseModel();
        $model->delete($id);
        return redirect()->to('/expenses')->with('success','Expense removed');
    }
}
