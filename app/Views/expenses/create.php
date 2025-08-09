<div class="card">
  <div class="card-body">
    <h5 class="card-title">Add Expense</h5>
    <form method="post" action="<?= site_url('expenses/store') ?>">
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" value="<?= esc(old('title')) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Category</label>
        <input name="category" value="<?= esc(old('category')) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Amount</label>
        <input name="amount" type="number" step="0.01" value="<?= esc(old('amount')) ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input name="expense_date" type="date" value="<?= esc(old('expense_date')) ?>" class="form-control" required>
      </div>
      <button class="btn btn-success">Save</button>
      <a href="<?= site_url('expenses') ?>" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
