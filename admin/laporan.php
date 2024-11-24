<?php
      include 'koneksi.php';

      $query = 
      "SELECT * FROM tb_laporan 
      JOIN tb_klasifikasi ON tb_klasifikasi.id_klasifikasi = tb_laporan.id_klasifikasi
      JOIN tb_kategori ON tb_kategori.id_kategori = tb_laporan.id_kategori
      WHERE tb_laporan.deleted_at IS NULL
      ";
      $sql = mysqli_query($conn, $query);
      $no = 1;
?>
<!-- php -S localhost:8000 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>

  <!-- Favicons -->
  <link href="../logounpra.png" rel="icon">
  <link href="../logounpra.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/adminpage/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/adminpage/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/adminpage/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/adminpage/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/adminpage/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/adminpage/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/adminpage/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/adminpage/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="../assets/adminpage/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<?php 
		session_start();
		if($_SESSION['status']!="login"){
			header("location:../index.php?pesan=belum_login");
		}
	?>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../logounpra.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
      <a class="nav-link" href="logout.php">
        <i class="fas fa-sign-in-alt"> Logout</i>
      </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="../logounpra.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <h4><a href="#" class="d-block">Hi, <?php echo $_SESSION['username']; ?></a></h4>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-copy nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="laporan.php" class="nav-link active">
            <i class="fas fa-file-signature nav-icon"></i>
              <p>Laporan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="klasifikasi.php" class="nav-link">
            <i class="fas fa-list-alt nav-icon"></i>
              <p>Klasifikasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kategori.php" class="nav-link">
            <i class="fas fa-layer-group nav-icon"></i>
              <p>Kategori</p>
            </a>
          </li>
          
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Laporan</h3>
            
            <a href="kelolalaporan.php" type="button" class="btn btn-primary mb-3 float-right">
                        <i class="fa fa-plus"></i>
                        Tambah Data
            </a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th>Klasifikasi</th>
                  <th>Kategori</th>
                  <th>Judul Laporan</th>
                  <th>File Pendukung</th>
                  <th>Tanggal Laporan</th>
                  <th><center>Status</center></th>
                  <th><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($result = mysqli_fetch_assoc($sql)) {
                ?>
                <tr>
                  <td>
                    <center><?php echo $no++; ?></center>
                  </td>
                  <td><?php echo $result['nama_klasifikasi']; ?></td>
                  <td><?php echo $result['nama_kategori']; ?></td>
                  <td><?php echo $result['judul_laporan']; ?></td>
                  <td>
                    <?php if($result['file_pendukung'] && file_exists("../assets/files/".$result['file_pendukung']) ){ ?>
                      <a type="button" class="btn btn-warning btn-sm" href="../assets/files/<?php echo $result['file_pendukung']; ?>" target="_blank">Lihat File Pendukung</a>
                    <?php } ?>
                  </td>
                  <td><?php echo $result['tanggal_laporan']; ?></td>
                  <td>
                    <?php if ($result['status'] == "0" ){  ?>
                      <div class="small-box bg-info">
                        <div class="inner">
                          <p>Ubah Status Laporan</p>
                        </div> 
                      </div>
                      <a href="proseslaporan.php?valid=<?php echo $result['id_laporan']; ?>" type="button" class="btn btn-success btn-sm" onClick="return confirm('Apakah anda yakin ingin mengubah status data tersebut menjadi VALID ?')"><i class="fas fa-check-circle"> Valid</i></a>
                      <a href="proseslaporan.php?notvalid=<?php echo $result['id_laporan']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin mengubah status data tersebut menjadi TIDAK VALID ?')"><i class="fas fa-times-circle"></i> Tidak Valid</i></a>
                    <?php }else if($result['status'] == "1" ){  ?>
                      <div class="small-box bg-success">
                        <div class="inner">
                          <p>Laporan Valid</p>
                        </div> 
                      </div>
                    <?php }else{  ?>
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <p>Laporan Tidak Valid</p>
                        </div> 
                      </div>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($result['created_by'] == "admin" ){  ?>
                      <a href="kelolalaporan.php?ubahlaporan=<?php echo $result['id_laporan']; ?>" type="button" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"> Ubah</i></a> <br><br>
                      <a href="proseslaporan.php?hapuslaporan=<?php echo $result['id_laporan']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')"><i class="fas fa-trash-alt"> Hapus</i></a>
                    <?php  }else{ ?>
                      <a href="detaillaporan.php?detaillaporan=<?php echo $result['id_laporan']; ?>" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-info"> Detail</i></a>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th><center>No.</center></th>
                  <th>Klasifikasi</th>
                  <th>Kategori</th>
                  <th>Judul Laporan</th>
                  <th>File Pendukung</th>
                  <th>Tanggal Laporan</th>
                  <th><center>Status</center></th>
                  <th><center>Aksi</center></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
        <br>
          <center>
            <a target="_blank" href="exportlaporanxls.php" type="button" class="btn btn-info btn-xl" onClick="return confirm('Apakah anda yakin ingin Mengunduh Rekap Laporan VALID ?')"><i class="fas fa-file-download"> Unduh Laporan Valid</i></a>
            
          </center>
        <br>
        </div>  
      </div>
    </section>
  </div>
  
  <footer class="main-footer">
    <strong>Sistem Laporan Mahasiswa.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Beta
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../assets/adminpage/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/adminpage/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/adminpage/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/adminpage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/adminpage/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/adminpage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/adminpage/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<!-- <script src="../assets/adminpage/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
<!-- <script src="../assets/adminpage/plugins/jszip/jszip.min.js"></script>
<script src="../assets/adminpage/plugins/pdfmake/pdfmake.min.js"></script> -->
<!-- <script src="../assets/adminpage/plugins/pdfmake/vfs_fonts.js"></script> -->
<!-- <script src="../assets/adminpage/plugins/datatables-buttons/js/buttons.html5.min.js"></script> -->
<!-- <script src="../assets/adminpage/plugins/datatables-buttons/js/buttons.print.min.js"></script> -->
<!-- <script src="../assets/adminpage/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../assets/adminpage/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": true, 
    //   "lengthChange": false, 
    //   "autoWidth": false,

    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
            
