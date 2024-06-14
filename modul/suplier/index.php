<?php
session_start();
include_once('../../koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    if($_GET['act']=="insert"){
        $query = "INSERT INTO supplier (nama_supplier, alamat, telepon, email) 
        VALUES ('$nama_supplier','$alamat','$telepon','$email')";
        $exec = mysqli_query($koneksi, $query);
        if($exec){
            $_SESSION['pesan'] = "Data supplier telah ditambahkan";
            header('location:../../dashboard.php?modul=suplier');
        }else{
            $_SESSION['pesan'] = "Data supplier gagal ditambahkan";
            header('location:../../dashboard.php?modul=suplier');
        }
    }elseif($_GET['act']=="update"){
        $id_supplier = $_GET['id_supplier'];
        $query = "UPDATE supplier SET nama_supplier='$nama_supplier',alamat='$alamat',telepon='$telepon' WHERE id_supplier='$id_supplier'";
        $exec = mysqli_query($koneksi, $query);
        if($exec){
        $_SESSION['pesan'] = "Data supplier telah diubah";
        header('location:../../dashboard.php?modul=suplier');
        }else{
        $_SESSION['pesan'] = "Data suuplier gagal diubah";
        header('location:../../dashboard.php?modul=suplier');
        }
        echo "update";
    }
}
else if($_SERVER['REQUEST_METHOD']=='GET'){
    if($_GET['act']=="delete"){
        $id_supplier = $_GET['id_supplier'];
        $query = "DELETE FROM supplier WHERE id_supplier='$id_supplier'";
        $exec = mysqli_query($koneksi, $query);
        if($exec){
            $_SESSION['pesan'] = "Data supplier telah dihapus";
            header('location:../../dashboard.php?modul=suplier');
        }else{
            $_SESSION['pesan'] = "Data supplier gagal dihapus";
            header('location:../../dashboard.php?modul=suplier');
        }
    }else{
        header('location:../../index.php');
    }
}else{
    echo 'Unknown';
}

?>