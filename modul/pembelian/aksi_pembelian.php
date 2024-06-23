<?php
include_once "../../koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['act']) && $_GET['act'] == "insert") {
        $invoice_pembelian = $_POST['invoice_pembelian'];
        $tanggal_pembelian = $_POST['tanggal_pembelian'];
        $supplier_id = $_POST['supplier_id'];
        $jumlah_pembelian = $_POST['jumlah_pembelian'];
        $harga_pembelian = $_POST['harga_pembelian'];
        $total_pembelian = $jumlah_pembelian * $harga_pembelian;
        $keterangan = $_POST['keterangan'];

        $query = "INSERT INTO pembelian (invoice_pembelian, tanggal_pembelian, supplier_id, jumlah_pembelian, harga_pembelian, total_pembelian, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sssiiis", $invoice_pembelian, $tanggal_pembelian, $supplier_id, $jumlah_pembelian, $harga_pembelian, $total_pembelian, $keterangan);

        if ($stmt->execute()) {
            $_SESSION['pesan'] = "Data pembelian telah ditambahkan";
        } else {
            $_SESSION['error'] = "Data pembelian gagal ditambahkan: " . $stmt->error;
        }

        $stmt->close();
        header('Location: ../../dashboard.php?modul=pembelian');
        exit();
    } elseif (isset($_GET['act']) && $_GET['act'] == "update") {
        $pembelian_id = $_GET['id'];
        $invoice_pembelian = $_POST['invoice_pembelian'];
        $tanggal_pembelian = $_POST['tanggal_pembelian'];
        $supplier_id = $_POST['supplier_id'];
        $jumlah_pembelian = $_POST['jumlah_pembelian'];
        $harga_pembelian = $_POST['harga_pembelian'];
        $total_pembelian = $jumlah_pembelian * $harga_pembelian;
        $keterangan = $_POST['keterangan'];

        $query = "UPDATE pembelian SET invoice_pembelian = ?, tanggal_pembelian = ?, supplier_id = ?, jumlah_pembelian = ?, harga_pembelian = ?, total_pembelian = ?, keterangan = ? WHERE pembelian_id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("sssiiisi", $invoice_pembelian, $tanggal_pembelian, $supplier_id, $jumlah_pembelian, $harga_pembelian, $total_pembelian, $keterangan, $pembelian_id);

        if ($stmt->execute()) {
            $_SESSION['pesan'] = "Data pembelian telah diubah";
        } else {
            $_SESSION['error'] = "Data pembelian gagal diubah: " . $stmt->error;
        }

        $stmt->close();
        header('Location: ../../dashboard.php?modul=pembelian');
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['act']) && $_GET['act'] == "delete") {
    $id = $_GET['id'];

    $query = "DELETE FROM pembelian WHERE pembelian_id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data pembelian telah dihapus";
    } else {
        $_SESSION['error'] = "Data pembelian gagal dihapus: " . $stmt->error;
    }

    $stmt->close();
    header('Location: ../../dashboard.php?modul=pembelian');
    exit();
}
