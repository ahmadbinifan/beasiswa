<?php
  require '../inc/cek_session.php';
  include "../inc/koneksi.php";
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $tempatLahir = $_POST['tempatLahir'];
  $tglLahir = $_POST['tglLahir'];
  $nomorTelp = $_POST['nomorTelp'];
  $alamat = $_POST['alamat'];
  if(empty($nis)){header("location:siswa.php");}

    $_rs ="UPDATE tblsiswa
						  SET nama = '$nama',
                  jk = '$jk',
                  tempatLahir = '$tempatLahir',
						      tglLahir = '$tglLahir',
                  nomorTelp = '$nomorTelp',
                  alamat = '$alamat'
						WHERE nis = '$nis';";
	  $query=mysqli_query($connect,$_rs);

  header("location:siswa.php");
?>



