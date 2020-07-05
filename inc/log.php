<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];
$psw1 = MD5($psw);
$level = $_POST['level'];


if($op=="in"){
        $cek = mysqli_query($connect,"SELECT * FROM tblLogin WHERE username='$username' AND password='$psw1'");
            if(mysqli_num_rows($cek)==1){
                $c = mysqli_fetch_array($cek);
                $_SESSION['username'] = $c['username'];
                $_SESSION['level'] = "admin";
                header("location:../pages/index.php");
            }
            else{
                die("Username dan Password Tidak Sesuai. Klik <a href=\"javascript:history.back()\">Kembali</a> untuk Mengulangi Log In");
            }
}

else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header("location:../index.php");
}
?>