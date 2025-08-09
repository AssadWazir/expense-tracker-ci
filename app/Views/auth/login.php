<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Login</h5>

        <?php if(session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('login') ?>">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>
          <button class="btn btn-primary w-100 mb-2">Login</button>
          <a href="<?= site_url('register') ?>" class="btn btn-secondary w-100">Register</a>
        </form>
      </div>
    </div>
  </div>
</div>
