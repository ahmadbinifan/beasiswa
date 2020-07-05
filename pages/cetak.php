<?php
    require '../inc/cek_session.php';
    include "../inc/koneksi.php";
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

    <script>
        function printpage() {
        window.print(); }
    </script>
</head>

<body onLoad="printpage()">
        <div class="container-fluid">
            <div class="block-header">

            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <center>LAPORAN HASIL PENILAIAN</center>
                            </h2>
                        </div>
                                <table border="1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Matakuliah</th>
                                            <th>NIM/Nama</th>
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
                                <tbody>

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

    $w1 = 0.1;
    $w2 = 0.2;
    $w3 = 0.25;
    $w4 = 0.3;
    $w5 = 0.05;
    $w6 = 0.1;
?>

<?php
    $nomor = 1;
    $sql = "SELECT * FROM tblPenilaian INNER JOIN tblsiswa ON tblPenilaian.nim=tblsiswa.nim INNER JOIN tblmapel ON tblPenilaian.idmapel=tblmapel.idmapel";
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
                                            <td><?php echo $myrow['nim']."-".$myrow['nama'] ?></td>
                                            <td><?php echo $n1 ?></td>
                                            <td><?php echo $n2 ?></td>
                                            <td><?php echo $n3 ?></td>
                                            <td><?php echo $n4 ?></td>
                                            <td><?php echo $n5 ?></td>
                                            <td><?php echo $n6 ?></td>
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
            <!-- #END# Exportable Table -->

        </div>
</body>

</html>
