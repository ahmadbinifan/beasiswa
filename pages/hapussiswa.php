<?php 
	require '../inc/cek_session.php'; 
	include "../inc/koneksi.php";
	$kode = $_GET['nis'];
	$sql = "DELETE FROM tblsiswa "."WHERE nis = '$kode'";
	$rs=mysqli_query($connect,$sql)or
			die("gagal melakukan query. " . mysqli_error($connect));
	header("location:siswa.php");
?>