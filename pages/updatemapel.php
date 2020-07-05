<?php
  require '../inc/cek_session.php';
  include "../inc/koneksi.php";
  $id = $_POST['id'];
  $mapel = $_POST['mapel'];
  $semester = $_POST['semester'];
  $sks = $_POST['sks'];
  $ket = $_POST['ket'];
  if(empty($id)){header("location:mapel.php");}

    $_rs ="UPDATE tblmapel
						  SET mapel = '$mapel',
						      semester = '$semester',
                  sks = '$sks',
                  ket = '$ket'
						WHERE idmapel = '$id';";
	  $query=mysqli_query($connect,$_rs);

  header("location:mapel.php");
?>



