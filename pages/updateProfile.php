<?php
  require '../inc/cek_session.php';
  include "../inc/koneksi.php";
  $user = $_POST['user'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $konfirm = $_POST['konfirm'];
  $psw1 = MD5($password1);
  if(empty($user) or ($password1 != $konfirm)){header("location:profile.php");}

    $_rs ="UPDATE tblLogin
              SET password ='$psw1',
                  nama = '$nama',
                  email = '$email'
            WHERE username = '$user';";
    $query=mysqli_query($connect,$_rs);

  header("location:profile.php");
?>