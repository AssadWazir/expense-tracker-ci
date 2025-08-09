<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Expenses</h3>
  <a href="<?= site_url('expenses/create') ?>" class="btn btn-success">Add Expense</a>
</div>

<form class="mb-3" method="get" action="<?= site_url('expenses') ?>">
  <div class="input-group">
    <input name="keyword" value="<?= esc(old('keyword', '')) ?>" class="form-control" placeholder="Search title or category">
    <button class="btn btn-outline-secondary">Search</button>
  </div>
</form>

<table class="table table-striped">
  <thead><tr><th>#</th><th>Title</th><th>Category</th><th>Amount</th><th>Date</th><th>Action</th></tr></thead>
  <tbody>
    <?php foreach ($expenses as $e): ?>
      <tr>
        <td><?= esc($e['id']) ?></td>
        <td><?= esc($e['title']) ?></td>
        <td><?= esc($e['category']) ?></td>
        <td><?= number_format($e['amount'],2) ?></td>
        <td><?= esc($e['expense_date']) ?></td>
        <td>
          <a href="<?= site_url('expenses/edit/'.$e['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
          <a href="<?= site_url('expenses/delete/'.$e['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remove?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $pager->links() ?>

