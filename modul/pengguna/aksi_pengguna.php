<?php
include_once "../../koneksi.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['act'] == "insert") {
        $username = $_POST['username'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $jabatan = $_POST['jabatan'];
        $email = $_POST['email'];
        $hak_akses = $_POST['hak_akses'];
        $query = "INSERT INTO pengguna (username, password, nama_lengkap, jabatan, email, hak_akses) VALUES ('$username', '$password', '$nama_lengkap', '$jabatan', '$email', '$hak_akses')";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data pengguna berhasil ditambah";
            header('location:../../dashboard.php?modul=pengguna');
        } else {
            $_SESSION['pesan'] = "Data pengguna gagal ditambah";
            header('location:../../dashboard.php?modul=pengguna');
        }
    } elseif ($_GET['act'] == "update") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jabatan = $_POST['jabatan'];
        $email = $_POST['email'];
        $hak_akses = $_POST['hak_akses'];
        if (empty($password)) {
            $query = "UPDATE pengguna SET nama_lengkap = '$nama_lengkap', jabatan = '$jabatan', email = '$email', hak_akses = '$hak_akses' WHERE username = '$username'";
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE pengguna SET password = '$password', nama_lengkap = '$nama_lengkap', jabatan = '$jabatan', email = '$email', hak_akses = '$hak_akses' WHERE username = '$username'";
        }
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data pengguna berhasil diubah";
            header('location:../../dashboard.php?modul=pengguna');
        } else {
            $_SESSION['pesan'] = "Data pengguna gagal diubah";
            header('location:../../dashboard.php?modul=pengguna');
        }
    }
} else {
    if ($_GET['act'] == "delete") {
        $id = $_GET['id'];
        $query = "DELETE FROM pengguna WHERE id = '$id'";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data pengguna berhasil dihapus";
            header('location:../../dashboard.php?modul=pengguna');
        } else {
            $_SESSION['pesan'] = "Data pengguna gagal dihapus";
            header('location:../../dashboard.php?modul=pengguna');
        }
    } else {
        header('location:../../login.php');
    }
}
?>