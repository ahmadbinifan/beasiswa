<?php 
	require '../inc/cek_session.php'; 
	include "../inc/koneksi.php";
	$kode = $_GET['id'];
	$sql = "DELETE FROM tblmapel "."WHERE idmapel = '$kode'";
	$rs=mysqli_query($connect,$sql)or
			die("gagal melakukan query. " . mysqli_error($connect));
	header("location:mapel.php");
?>