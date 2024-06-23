<?php
// Ensure the correct path to koneksi.php
include_once __DIR__ . "/../../koneksi.php";

// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$query = "SELECT * FROM pengguna WHERE username='" . mysqli_real_escape_string($koneksi, $_SESSION['username']) . "'";
$exec = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($exec);
?>
<div class="card mb-3">
    <div class="card-body">
        <form action="http://localhost/app_sia/modul/profile/aksi_profile.php" method="post">
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($data['username']) ?>" readonly>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="nama_lengkap" class="form-label">Nama lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']) ?>">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($data['email']) ?>">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="password_baru" class="form-label">Password baru</label>
                    <input type="password" class="form-control" name="password_baru">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="password_ulang" class="form-label">Ulangi password</label>
                    <input type="password" class="form-control" name="password_ulang">
                </div>
            </div>
            <hr class="text-secondary">
            <div class="d-flex">
                <span class="me-auto text-danger">
                    <?php
                    if (isset($_SESSION['pesan'])) {
                        echo htmlspecialchars($_SESSION['pesan']);
                        unset($_SESSION['pesan']);
                    }
                    ?>
                </span>
                <button type="submit" name="submit" class="btn btn-primary">Perbaharui</button>
            </div>
        </form>
    </div>
</div>