<?php
include_once "../../koneksi.php";
session_start();

// Handle insert operation for barang
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['act']) && $_GET['act'] == "insert") {
    $nama_barang = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO barang (nama_barang, harga_beli, harga_jual, stok) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssi", $nama_barang, $harga_beli, $harga_jual, $stok);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data barang telah ditambahkan";
    } else {
        $_SESSION['error'] = "Data barang gagal ditambahkan: " . $stmt->error;
    }

    $stmt->close();
    header('Location: ../../dashboard.php?modul=barang');
    exit();
}

// Handle update operation for barang
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['act']) && $_GET['act'] == "update") {
    $barang_id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $query = "UPDATE barang SET nama_barang=?, harga_beli=?, harga_jual=?, stok=? WHERE barang_id=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssii", $nama_barang, $harga_beli, $harga_jual, $stok, $barang_id);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data barang telah diubah";
    } else {
        $_SESSION['error'] = "Data barang gagal diubah: " . $stmt->error;
    }

    $stmt->close();
    header('Location: ../../dashboard.php?modul=barang');
    exit();
}

// Handle delete operation for barang
elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['act']) && $_GET['act'] == "delete") {
    $barang_id = $_GET['id'];

    $koneksi->begin_transaction();

    try {
        // First, delete rows from penjualan referencing this barang_id
        $query_penjualan = "DELETE FROM penjualan WHERE id_barang=?";
        $stmt_penjualan = $koneksi->prepare($query_penjualan);
        $stmt_penjualan->bind_param("i", $barang_id);
        $stmt_penjualan->execute();
        $stmt_penjualan->close();

        // Now, delete the row from barang
        $query_barang = "DELETE FROM barang WHERE barang_id=?";
        $stmt_barang = $koneksi->prepare($query_barang);
        $stmt_barang->bind_param("i", $barang_id);
        $stmt_barang->execute();
        $stmt_barang->close();

        $koneksi->commit();
        $_SESSION['pesan'] = "Data barang telah dihapus";
    } catch (mysqli_sql_exception $exception) {
        $koneksi->rollback();
        $_SESSION['error'] = "Data barang gagal dihapus: " . $exception->getMessage();
    }

    header('Location: ../../dashboard.php?modul=barang');
    exit();
}
