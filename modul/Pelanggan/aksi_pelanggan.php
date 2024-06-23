<?php
include_once "../../koneksi.php";
session_start();

// Handle insert operation for pelanggan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['act']) && $_GET['act'] == "insert") {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $mail = $_POST['mail'];

    $query = "INSERT INTO pelanggan (nama_pelanggan, alamat, telepon, mail) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssss", $nama_pelanggan, $alamat, $telepon, $mail);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data pelanggan telah ditambahkan";
    } else {
        $_SESSION['error'] = "Data pelanggan gagal ditambahkan: " . $stmt->error;
    }

    $stmt->close();
    header('Location: ../../dashboard.php?modul=pelanggan');
    exit();
}

// Handle update operation for pelanggan
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['act']) && $_GET['act'] == "update") {
    $pelanggan_id = $_POST['id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $mail = $_POST['mail'];

    $query = "UPDATE pelanggan SET nama_pelanggan=?, alamat=?, telepon=?, mail=? WHERE pelanggan_id=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssi", $nama_pelanggan, $alamat, $telepon, $mail, $pelanggan_id);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data pelanggan telah diubah";
    } else {
        $_SESSION['error'] = "Data pelanggan gagal diubah: " . $stmt->error;
    }

    $stmt->close();
    header('Location: ../../dashboard.php?modul=pelanggan');
    exit();
}

// Handle delete operation for pelanggan
elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['act']) && $_GET['act'] == "delete") {
    $pelanggan_id = $_GET['id'];

    $query = "DELETE FROM pelanggan WHERE pelanggan_id=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $pelanggan_id);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data pelanggan telah dihapus";
    } else {
        $_SESSION['error'] = "Data pelanggan gagal dihapus: " . $stmt->error;
    }

    $stmt->close();
    header('Location: ../../dashboard.php?modul=pelanggan');
    exit();
}
