<div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Expense</h5>
    <form method="post" action="<?= site_url('expenses/update/'.$expense['id']) ?>">
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" value="<?= esc(old('title', $expense['title'])) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Category</label>
        <input name="category" value="<?= esc(old('category', $expense['category'])) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Amount</label>
        <input name="amount" type="number" step="0.01" value="<?= esc(old('amount', $expense['amount'])) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input name="expense_date" type="date" value="<?= esc(old('expense_date', $expense['expense_date'])) ?>" class="form-control" required>
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="<?= site_url('expenses') ?>" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
