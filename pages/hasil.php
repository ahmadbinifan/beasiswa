<?php
    require '../inc/cek_session.php';
    include "../inc/koneksi.php";

    $username = $_SESSION['username'];
    $query1 = "SELECT * FROM tblLogin "."WHERE username = '$username'";
    $mq = mysqli_query($connect,$query1)or
        die("gagal melakukan query. " . mysqli_error($connect));
    $myarray = mysqli_fetch_array($mq);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Yapim Taruna Sei Rotan</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Yapim Taruna Sei Rotan</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
      <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <!--<div class="image">-->
                    <img src="../images/polgan.png" width="55" height="55" alt="User" />
                <!--</div>-->
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $myarray['nama'] ?></div>
                    <div class="email"><?php echo $myarray['email'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">◎</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../inc/log.php?op=out"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index.php">
                            
                            <span>Home</span>                        </a>                    </li>
                    <li>
                        <a href="siswa.php">
                           
                            <span>Siswa</span>                        </a>                    </li>
                    <li>
                        <a href="mapel.php">
                           
                            <span>Mata Pelajaran</span>                        </a>                    </li>
                    <li>
                        <a href="proses.php">
                            
                            <span>Nilai siswa</span>                        </a>                    </li>
                    <li class="active">
                        <a href="hasil.php">
                            
                            <span>Proses Penilaian</span>                        </a>                    </li>
                    <li>
                        <a href="laporan.php">
                           
                            <span>Laporan</span>                        </a>                    </li>
                </ul>
            </div>
          <!-- #Menu -->
          <!-- Footer -->
          <!-- #Footer -->
      </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HASIL PENILAIAN</h2>
            </div>
<?php
    $sql1 = "SELECT *, max(nilai1) as n1, max(nilai2) as n2, max(nilai3) as n3, max(nilai4) as n4, max(nilai5) as n5, max(nilai6) as n6 FROM tblPenilaian";
    $rs1 = mysqli_query($connect,$sql1);
    $myrow1 = mysqli_fetch_array($rs1);
    $max1 = $myrow1['n1'];
    $max2 = $myrow1['n2'];
    $max3 = $myrow1['n3'];
    $max4 = $myrow1['n4'];
    $max5 = $myrow1['n5'];
    $max6 = $myrow1['n6'];

    $w1 = 0.10;
    $w2 = 0.20;
    $w3 = 0.25;
    $w4 = 0.30;
    $w5 = 0.05;
    $w6 = 0.10;
?>
            <!-- Exportable Table -->
Nilai alternatif masing-masing kriteria:
                                <table border="0">
<?php
    $nomor = 1;
    $sql = "SELECT * FROM tblPenilaian INNER JOIN tblsiswa ON tblPenilaian.nis=tblsiswa.nis INNER JOIN tblmapel ON tblPenilaian.idmapel=tblmapel.idmapel";
    $rs = mysqli_query($connect,$sql)or
        die("gagal melakukan query. " . mysql_error($connect));
    while ($myrow = mysqli_fetch_array($rs))
    {
?>
                                        <tr>
                                            <td width="20"><?php echo $nomor."." ?></td>
                                            <td width="220"><?php echo $myrow['mapel']." --> " ?></td>
                                            <td width="260"><?php echo $myrow['nis']."-".$myrow['nama']." --> " ?></td>
                                            <td width="45"><?php echo $myrow['nilai1'] ?></td>
                                            <td width="45"><?php echo $myrow['nilai2'] ?></td>
                                            <td width="45"><?php echo $myrow['nilai3'] ?></td>
                                            <td width="45"><?php echo $myrow['nilai4'] ?></td>
                                            <td width="45"><?php echo $myrow['nilai5'] ?></td>
                                            <td width="45"><?php echo $myrow['nilai6'] ?></td>
                                        </tr>
<?php
        $nomor=$nomor+1;
    }
?>
<tr>
    <td colspan="2">&nbsp;</td>
    <td><b>Nilai maksimum:</b></td>
    <td><b><?php echo $max1 ?></b></td>
    <td><b><?php echo $max2 ?></b></td>
    <td><b><?php echo $max3 ?></b></td>
    <td><b><?php echo $max4 ?></b></td>
    <td><b><?php echo $max5 ?></b></td>
    <td><b><?php echo $max6 ?></b></td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
                                </table>
            <!-- #END# Exportable Table -->

            <!-- Exportable Table -->
Normalisasi nilai kriteria:
                                <table border="0">
<?php
    $nomor = 1;
    $sql = "SELECT * FROM tblPenilaian INNER JOIN tblsiswa ON tblPenilaian.nis=tblsiswa.nis INNER JOIN tblmapel ON tblPenilaian.idmapel=tblmapel.idmapel";
    $rs = mysqli_query($connect,$sql)or
        die("gagal melakukan query. " . mysql_error($connect));
    while ($myrow = mysqli_fetch_array($rs))
    {
        $n1 = $myrow['nilai1'] / $max1;
        $n2 = $myrow['nilai2'] / $max2;
        $n3 = $myrow['nilai3'] / $max3;
        $n4 = $myrow['nilai4'] / $max4;
        $n5 = $myrow['nilai5'] / $max5;
        $n6 = $myrow['nilai6'] / $max6;
?>
                                        <tr>
                                            <td width="20"><?php echo $nomor."." ?></td>
                                            <td width="220"><?php echo $myrow['mapel']." --> " ?></td>
                                            <td width="260"><?php echo $myrow['nis']."-".$myrow['nama']." --> " ?></td>
                                            <td width="90"><?php echo $myrow['nilai1']."/".$max1."=".$n1 ?></td>
                                            <td width="90"><?php echo $myrow['nilai2']."/".$max2."=".$n2 ?></td>
                                            <td width="90"><?php echo $myrow['nilai3']."/".$max3."=".$n3 ?></td>
                                            <td width="90"><?php echo $myrow['nilai4']."/".$max4."=".$n4 ?></td>
                                            <td width="90"><?php echo $myrow['nilai5']."/".$max5."=".$n5 ?></td>
                                            <td width="90"><?php echo $myrow['nilai6']."/".$max6."=".$n6 ?></td>
                                        </tr>
<?php
        $nomor=$nomor+1;
    }
?>
<tr>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>Nilai bobot:</td>
    <td>&nbsp;</td>
    <td><b><?php echo $w1 ?></b></td>
    <td><b><?php echo $w2 ?></b></td>
    <td><b><?php echo $w3 ?></b></td>
    <td><b><?php echo $w4 ?></b></td>
    <td><b><?php echo $w5 ?></b></td>
    <td><b><?php echo $w6 ?></b></td>
</tr>
<tr>
    <td>&nbsp;</td>
</tr>
                                </table>
            <!-- #END# Exportable Table -->

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">+</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="tambahProses.php">Tambah Data</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="js-sweetalert">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mata Pelajaran</th>
                                            <th>NIS/Nama</th>
                                            <th>Absensi</th>
                                            <th>Tugas</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Kepribadian</th>
                                            <th>Keaktifan</th>
                                            <th>Nilai Akhir</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Mata Pelajaran</th>
                                            <th>NIS/Nama</th>
                                            <th>Absensi</th>
                                            <th>Tugas</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Kepribadian</th>
                                            <th>Keaktifan</th>
                                            <th>Nilai Akhir</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </tfoot>
                                <tbody>  

<?php
    $nomor = 1;
    $sql = "SELECT * FROM tblPenilaian INNER JOIN tblsiswa ON tblPenilaian.nis=tblsiswa.nis INNER JOIN tblmapel ON tblPenilaian.idmapel=tblmapel.idmapel";
    $rs = mysqli_query($connect,$sql)or
        die("gagal melakukan query. " . mysql_error($connect));
    while ($myrow = mysqli_fetch_array($rs))
    {
        $n1 = $myrow['nilai1'] / $max1;
        $n2 = $myrow['nilai2'] / $max2;
        $n3 = $myrow['nilai3'] / $max3;
        $n4 = $myrow['nilai4'] / $max4;
        $n5 = $myrow['nilai5'] / $max5;
        $n6 = $myrow['nilai6'] / $max6;

        $nilaiAkhir = number_format(($n1*$w1)+($n2*$w2)+($n3*$w3)+($n4*$w4)+($n5*$w5)+($n6*$w6),2);

        if ($nilaiAkhir < 0.75) {
            $hasil = "Tidak Lulus";
        }
        else {
            $hasil = "Lulus";
        }
?>
                                        <tr>
                                            <td><?php echo $nomor."." ?></td>
                                            <td><?php echo $myrow['mapel'] ?></td>
                                            <td><?php echo $myrow['nis']."-".$myrow['nama'] ?></td>
                                            <td><?php echo "(".$n1."*".$w1.") +" ?></td>
                                            <td><?php echo "(".$n2."*".$w2.") +" ?></td>
                                            <td><?php echo "(".$n3."*".$w3.") +" ?></td>
                                            <td><?php echo "(".$n4."*".$w4.") +" ?></td>
                                            <td><?php echo "(".$n5."*".$w5.") +" ?></td>
                                            <td><?php echo "(".$n6."*".$w6.") =" ?></td>
                                            <td><?php echo $nilaiAkhir ?></td>
                                            <td><?php echo $hasil ?></td>
                                        </tr>


<?php
        $nomor=$nomor+1;
    }
?>
                                    </tbody>
                                </table>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
