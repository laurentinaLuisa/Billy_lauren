<?php
session_start();
include_once('../../koneksi.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    if ($_GET['act'] == "insert") {
        $query = "INSERT INTO supplier (nama_supplier, alamat, telepon, email) VALUES ('$nama_supplier','$alamat','$telepon','$email')";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data supplier telah ditambahkan";
            header('location:../../dashboard.php?modul=supplier');
        } else {
            $_SESSION['pesan'] = "Data supplier gagal ditambahkan";
            header('location:../../dashboard.php?modul=supplier');
        }
    } elseif ($_GET['act'] == "update") {
        $id = $_GET['id'];
        $query = "UPDATE supplier SET nama_supplier='$nama_supplier', alamat='$alamat', telepon='$telepon', email='$email' WHERE id='$id'";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data supplier telah diubah";
            header('location:../../dashboard.php?modul=supplier');
        } else {
            $_SESSION['pesan'] = "Data supplier gagal diubah";
            header('location:../../dashboard.php?modul=supplier');
        }
    }
} else {
    if ($_GET['act'] == "delete") {
        $id = $_GET['id'];
        $query = "DELETE FROM supplier WHERE id='$id'";
        $exec = mysqli_query($koneksi, $query);
        if ($exec) {
            $_SESSION['pesan'] = "Data supplier telah dihapus";
            header('location:../../dashboard.php?modul=supplier');
        } else {
            $_SESSION['pesan'] = "Data supplier gagal dihapus";
            header('location:../../dashboard.php?modul=supplier');
        }
    } else {
        header('location:../../login.php');
    }
}
?>