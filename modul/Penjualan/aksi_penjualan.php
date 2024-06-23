<?php
include_once "../../koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['act']) && $_GET['act'] == "insert") {
        // Sanitize and validate input data
        $invoice_penjualan = $_POST['invoice_penjualan'];
        $tanggal_penjualan = $_POST['tanggal_penjualan'];
        $id_barang = $_POST['id_barang'];
        $pelanggan_id = $_POST['pelanggan_id'];
        $jumlah_penjualan = $_POST['jumlah_penjualan'];
        $harga_penjualan = $_POST['harga_penjualan'];
        $keterangan = $_POST['keterangan'];

        // Calculate total penjualan
        $total_penjualan = $jumlah_penjualan * $harga_penjualan;

        // Prepare and execute INSERT statement
        $stmt = $koneksi->prepare("INSERT INTO penjualan (invoice_penjualan, tanggal_penjualan, id_barang, pelanggan_id, jumlah_penjualan, harga_penjualan, total_penjualan, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiiids", $invoice_penjualan, $tanggal_penjualan, $id_barang, $pelanggan_id, $jumlah_penjualan, $harga_penjualan, $total_penjualan, $keterangan);

        if ($stmt->execute()) {
            // Success message and redirect
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../../index.php?module=penjualan';</script>";
            exit; // Ensure script stops execution after redirect
        } else {
            // Error message and redirect
            echo "<script>alert('Data Gagal Ditambahkan');window.location='../../index.php?module=penjualan';</script>";
            exit;
        }
        $stmt->close();
    } elseif (isset($_GET['act']) && $_GET['act'] == "update") {
        // Sanitize and validate input data
        $penjualan_id = $_POST['penjualan_id'];
        $invoice_penjualan = $_POST['invoice_penjualan'];
        $tanggal_penjualan = $_POST['tanggal_penjualan'];
        $id_barang = $_POST['id_barang'];
        $pelanggan_id = $_POST['pelanggan_id'];
        $jumlah_penjualan = $_POST['jumlah_penjualan'];
        $harga_penjualan = $_POST['harga_penjualan'];
        $keterangan = $_POST['keterangan'];

        // Calculate total penjualan
        $total_penjualan = $jumlah_penjualan * $harga_penjualan;

        // Prepare and execute UPDATE statement
        $stmt = $koneksi->prepare("UPDATE penjualan SET invoice_penjualan = ?, tanggal_penjualan = ?, id_barang = ?, pelanggan_id = ?, jumlah_penjualan = ?, harga_penjualan = ?, total_penjualan = ?, keterangan = ? WHERE penjualan_id = ?");
        $stmt->bind_param("ssiiidsi", $invoice_penjualan, $tanggal_penjualan, $id_barang, $pelanggan_id, $jumlah_penjualan, $harga_penjualan, $total_penjualan, $keterangan, $penjualan_id);

        if ($stmt->execute()) {
            // Success message and redirect
            echo "<script>alert('Data Berhasil Diupdate');window.location='../../index.php?module=penjualan';</script>";
            exit;
        } else {
            // Error message and redirect
            echo "<script>alert('Data Gagal Diupdate');window.location='../../index.php?module=penjualan';</script>";
            exit;
        }
        $stmt->close();
    }
}

if ($_GET['act'] == 'delete') {
    // Sanitize and validate input data
    $penjualan_id = $_GET['id'];

    // Prepare and execute DELETE statement
    $stmt = $koneksi->prepare("DELETE FROM penjualan WHERE penjualan_id = ?");
    $stmt->bind_param("i", $penjualan_id);

    if ($stmt->execute()) {
        // Success message and redirect
        echo "<script>alert('Data Berhasil Dihapus');window.location='../../index.php?module=penjualan';</script>";
        exit;
    } else {
        // Error message and redirect
        echo "<script>alert('Data Gagal Dihapus');window.location='../../index.php?module=penjualan';</script>";
        exit;
    }
    $stmt->close();
}

// If invalid act or no POST request method, handle accordingly (redirect or error response)
echo "<script>alert('Aksi tidak valid');window.location='../../index.php?module=penjualan';</script>";
exit;
