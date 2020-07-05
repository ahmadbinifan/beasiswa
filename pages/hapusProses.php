<?php 
	require '../inc/cek_session.php'; 
	include "../inc/koneksi.php";
	$kode = $_GET['id'];
	$sql = "DELETE FROM tblPenilaian "."WHERE idNilai = '$kode'";
	$rs=mysqli_query($connect,$sql)or
			die("gagal melakukan query. " . mysqli_error($connect));
	header("location:proses.php");
?>