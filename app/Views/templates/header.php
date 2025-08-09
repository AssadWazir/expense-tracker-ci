<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= isset($title) ? $title . ' - Expense Tracker' : 'Expense Tracker' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('expenses') ?>">Expense Tracker</a>
    <div>
      <?php if (session()->get('user_id')): ?>
        <span class="me-2">Hi, <?= esc(session()->get('username')) ?></span>
        <a class="btn btn-outline-secondary btn-sm" href="<?= site_url('logout') ?>">Logout</a>
      <?php else: ?>
        <a class="btn btn-outline-primary btn-sm" href="<?= site_url('login') ?>">Login</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<div class="container">
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>
  <?php if (isset($errors) && is_array($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $e): ?>
        <div><?= esc($e) ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
