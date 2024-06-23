<?php
if(isset($_POST['submit'])){
    session_start();
    include_once($_SERVER['DOCUMENT_ROOT'] . "/app_sia/koneksi.php");
    
    $koneksi = mysqli_connect("localhost", "root", "", "app_sia");
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];<?php
    if (isset($_POST['submit'])) {
        session_start();
        include_once($_SERVER['DOCUMENT_ROOT'] . "/app_sia/koneksi.php");
    
        // Sanitize and validate input data
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = $_POST['password'];
        $password_baru = $_POST['password_baru'];
        $password_ulang = $_POST['password_ulang'];
    
        // Connect to the database
        $koneksi = mysqli_connect("localhost", "root", "", "app_sia");
    
        if (empty($password)) {
            $query = "UPDATE pengguna SET nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
            $exec = mysqli_query($koneksi, $query);
    
            if ($exec) {
                $_SESSION['pesan'] = "Data profile telah diperbaharui";
            } else {
                $_SESSION['pesan'] = "Data profile gagal diperbaharui";
            }
            header('location:../../dashboard.php?modul=profile');
        } else {
            $query = "SELECT * FROM pengguna WHERE username='$username'";
            $exec = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_array($exec);
    
            if (password_verify($password, $data['password'])) {
                if ($password_baru === $password_ulang) {
                    $hashed_password = password_hash($password_baru, PASSWORD_BCRYPT);
                    $query = "UPDATE pengguna SET password='$hashed_password', nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
                    $exec = mysqli_query($koneksi, $query);
    
                    if ($exec) {
                        $_SESSION['pesan'] = "Data profile telah diperbaharui";
                    } else {
                        $_SESSION['pesan'] = "Data profile gagal diperbaharui";
                    }
                } else {
                    $_SESSION['pesan'] = "Password baru tidak sesuai";
                }
            } else {
                $_SESSION['pesan'] = "Password lama tidak sesuai";
            }
            header('location:../../dashboard.php?modul=profile');
        }
    } else {
        header('location:../../index.php');
        exit;
    }
    
    $password_baru = $_POST['password_baru'];
    $password_ulang = $_POST['password_ulang'];
    
    if(empty($password)){
        $query = "UPDATE pengguna SET nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
        $exec = mysqli_query($koneksi, $query);
        
        if($exec) {
            $_SESSION['pesan'] = "Data profile telah diperbaharui";
            header('location:../../dashboard.php?modul=profile');
        } else {
            $_SESSION['pesan'] = "Data profile gagal diperbaharui";
            header('location:../../dashboard.php?modul=profile');
        }
    } else {
        $query = "SELECT * FROM pengguna WHERE username='$username'";
        $exec = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_array($exec);
        
        if(password_verify($password, $data['password'])){
            if($password_baru == $password_ulang){
                $password = password_hash($password_baru, PASSWORD_BCRYPT);
                $query = "UPDATE pengguna SET password='$password', nama_lengkap='$nama_lengkap', email='$email' WHERE username='$username'";
                $exec = mysqli_query($koneksi, $query);
                
                if($exec){
                    $_SESSION['pesan'] = "Data profile telah diperbaharui";
                    header('location:../../dashboard.php?modul=profile');
                }
            } else {
                $_SESSION['pesan'] = "Password baru tidak sesuai";
                header('location:../../dashboard.php?modul=profile');
            }
        } else {
            $_SESSION['pesan'] = "Password lama tidak sesuai";
            header('location:../../dashboard.php?modul=profile');
        }
    }
} else {
    header('location:../../index.php');
}
?>