<?php
// Buat Sesi
session_start();
// Buat Koneksi
include 'koneksi.php';
// Cek di data base
$username = $_POST['username'];
$password = $_POST['password'];
$status = "Aktif";

$data = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE username='$username' && password='$password' && status_user='$status' ");

// Uji Jika user terdaftar 
// jika berhasil user akan dikirimkan kehalaman menurut role masing2
if (mysqli_num_rows($data) > 0) {

    $row = mysqli_fetch_array($data);

    if ($row['role'] == "Atasan") {

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $row['password'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['role'] = $row['role'];
        echo ("<script>alert('Login Berhasil');document.location='../atasan/home_atasan.php'</script>");
    } elseif ($row['role'] == "Admin") {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $row['password'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['role'] = $row['role'];
        echo ("<script>alert('Login Berhasil');document.location='../admin/home_admin.php'</script>");
    } elseif ($row['role'] == "Lulusan") {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $row['password'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['role'] = $row['role'];
        echo ("<script>alert('Login Berhasil');document.location='../lulusan/home_lulusan.php'</script>");
    } else {
        echo ("<script>alert('Login Gagal Username atau Password salah atau akun belum diaktifkan');document.location='../index.php'</script>");
    }
} else {
    echo ("<script>alert('Login Gagal Username atau Password salah atau akun belum diaktifkan');document.location='../index.php'</script>");
}
