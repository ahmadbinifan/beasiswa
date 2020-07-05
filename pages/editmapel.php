<?php
    require '../inc/cek_session.php';
    include "../inc/koneksi.php";
    $kode = $_GET['id'];
    $sql = "SELECT * FROM tblmapel "."WHERE idmapel='$kode'";
    $rs=mysqli_query($connect,$sql)or
        die("gagal melakukan query. " . mysqli_error($connect));
    $myrow = mysqli_fetch_array($rs);

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

    <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                            <li><a href="profile.php"><i class="material-icons"></i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../inc/log.php?op=out"><i class="material-icons"></i>Sign Out</a></li>
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
                           
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="siswa.php">
                            
                            <span>Siswa</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="mapel.php">
                           
                            <span>Mata Pelajaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="proses.php">
                            
                            <span>Nilai siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="hasil.php">
                           
                            <span>Proses Penilaian</span>
                        </a>
                    </li>
                    <li>
                        <a href="laporan.php">
                           
                            <span>Laporan</span>
                        </a>
                    </li>
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
                <h2>MATAKULIAH</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DATA
                            </h2>
                        </div>
                        <div class="body">
                            <form action="updatemapel.php" method="post">
                                <label for="mapel">Matakuliah</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="<?php echo $myrow['idmapel'] ?>">
                                        <input type="text" class="form-control" name="mapel" id="mapel" placeholder="Masukkan matakuliah" value="<?php echo $myrow['mapel'] ?>" required>
                                    </div>
                                </div>
                                <label for="">Semester</label>
                                <div class="form-group">
                                    <select class="form-control show-tick" name="semester">
                                        <option><?php echo $myrow['semester'] ?></option>
                                        <option>I</option>
                                        <option>II</option>
                                        <option>III</option>
                                        <option>IV</option>
                                        <option>V</option>
                                        <option>VI</option>
                                    </select>
                                </div>
                                <label for="sks">Jumlah SKS</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sks" id="sks" placeholder="Masukkan jumlah sks" value="<?php echo $myrow['sks'] ?>" required>
                                    </div>
                                </div>
                                <label for="ket">Keterangan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="ket" id="ket" cols="30" rows="5" class="form-control no-resize" placeholder="Masukkan keterangan" required><?php echo $myrow['ket'] ?></textarea>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                                <a class="btn btn-danger waves-effect" href="mapel.php">BATAL</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
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
