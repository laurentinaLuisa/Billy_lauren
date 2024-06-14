<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
</head>
<body>
    <h2>Transaksi</h2>
</body>
</html>
<?php
include_once "koneksi.php";
$password = password_hash ('123', PASSWORD_BCRYPT);
$query = "INSERT INTO tbl_pengguna (
username,
password,
nama_lengkap,
email,
jabatan,
hak_akses
)
VALUES (
'admin',
'$password',
'Administrator Web',
'admin@gmail.com',
'Administrator',
'admin'
)
";
if($koneksi->query($query)){
echo "Data user berhasil di tambah";
}else{
echo "Data user gagal di tambah";
}
mysqli_close($koneksi);
?>