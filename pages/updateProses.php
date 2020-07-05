<?php
  require '../inc/cek_session.php';
  include "../inc/koneksi.php";
  $id = $_POST['id'];
  $nilai1 = $_POST['nilai1'];
  $nilai2 = $_POST['nilai2'];
  $nilai3 = $_POST['nilai3'];
  $nilai4 = $_POST['nilai4'];
  $nilai5 = $_POST['nilai5'];
  $nilai6 = $_POST['nilai6'];
  $ket = $_POST['ket'];
  if(empty($id)){header("location:proses.php");}

    $_rs ="UPDATE tblPenilaian
						  SET nilai1 = '$nilai1',
						      nilai2 = '$nilai2',
                  nilai3 = '$nilai3',
                  nilai4 = '$nilai4',
                  nilai5 = '$nilai5',
                  nilai6 = '$nilai6',
                  tblPenilaian.ket = '$ket'
						WHERE idNilai = '$id';";
	  $query=mysqli_query($connect,$_rs);

  header("location:proses.php");
?>



