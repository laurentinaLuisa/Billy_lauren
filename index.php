<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location:dashboard.php');
} else {
?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIA | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="18a105d7cb38e01e5ed0ca255c092992a2e211b39594a7fa57262bfc6fc4ea9c" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .login-container {
        max-width: 400px;
        width: 100%;
      }
    </style>
  </head>

  <body class="bg-secondary">
    <div class="login-container">
      <div class="shadow p-3 bg-white rounded">
        <form action="authentication.php" method="post">
          <h3 class="text-center">Login System</h3>
          <hr>
          <?php
          if (isset($_SESSION['pesan'])) {
          ?>
            <div class="alert alert-danger"><?= $_SESSION['pesan']; ?></div>
          <?php
          }
          ?>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="bi bi-person-fill"></i>
            </span>
            <input type="text" class="form-control" name="username" placeholder="username">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="bi bi-key-fill"></i>
            </span>
            <input type="password" class="form-control" name="password" placeholder="password">
          </div>
          <div class="mb-3 d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
        <div class="text-center">
          <small>Aplikasi Sistem Informasi Akuntansi</small>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY31HB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIds1K1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  </html>
<?php
}
session_destroy();
?>