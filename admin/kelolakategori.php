\
<?php
  include 'koneksi.php';

    $id_kategori = '';
    $nama_kategori = '';
    $ket_kategori = '';
    $status_kategori = '';
    

    if (isset($_GET['ubahkategori'])) {
        $id_kategori = $_GET['ubahkategori'];
        $query = "SELECT * FROM tb_kategori WHERE id_kategori = '$id_kategori';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $id_kategori = $result['id_kategori'];
        $nama_kategori = $result['nama_kategori'];
        $ket_kategori = $result['ket_kategori'];
        $status_kategori = $result['status_kategori'];
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>

  <link href="../logounpra.png" rel="icon">
  <link href="../logounpra.png" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../assets/adminpage/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../assets/adminpage/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/adminpage/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<?php 
		session_start();
		if($_SESSION['status']!="login"){
			header("location:../index.php?pesan=belum_login");
		}
	?>

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../logounpra.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

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
            <a href="laporan.php" class="nav-link ">
            <i class="fas fa-file-signature nav-icon"></i>
              <p>Laporan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="klasifikasi.php" class="nav-link active">
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Admin</a></li>
              <li class="breadcrumb-item active">kategori</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Kelola Data kategori</h3>
          </div>
          <div class="card-body">
            <div class="container">
              <form method="POST" action="proseskategori.php" enctype="multipart/form-data">

                <input type="hidden" value="<?= $id_kategori; ?>" name="id_kategori">
                
              
                <div class="mb-3 row">
                  <label for="nama_kategori" class="col-sm-3 col-form-label">Nama kategori</label>
                  <div class="col-sm-9">
                    <input value="<?= $nama_kategori; ?>" required type="text" name="nama_kategori" class="form-control" id="nama_kategori" placeholder="Nama kategori" />
                  </div>
                </div>
                    
                <div class="mb-3 row">
                  <label for="ket_kategori" class="col-sm-3 col-form-label">Keterangan kategori</label>
                  <div class="col-sm-9">
                    <textarea required name="ket_kategori" class="form-control" id="ket_kategori" rows="3" ><?= $ket_kategori; ?></textarea>
                  </div>
                </div>
                <div class="mb-3 row">
        <label for="status_kategori" class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
        <select required name="status_kategori" id="status_kategori" class="form-control">
        <option value="">Pilih Status kategori</option> 
            
            <option <?php if ($status_kategori == '1') {
                      echo "selected";
                    } ?> value="1">Aktif</option>
            <option <?php if ($status_kategori == '0') {
                      echo "selected";
                    } ?> value="0">Tidak Aktif</option>
          </select>

        </div>
      </div>
                
                <div class="mb-3 row mt-4">
                  <div class="col">
                  <?php if (isset($_GET['ubahkategori'])) { ?>
                    <button type="submit" name="aksikategori" value="editkategori" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Simpan Perubahan</button>
                  <?php } else { ?>
                    <button type="submit" name="aksikategori" value="addkategori" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Tambahkan</button>
                  <?php } ?>
                    <a href="kategori.php" type="button" class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i> Batal</a>
                  </div>
                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <footer class="main-footer">
    <strong>Sistem kategori Mahasiswa.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Beta
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="../assets/adminpage/plugins/jquery/jquery.min.js"></script>
<script src="../assets/adminpage/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/adminpage/dist/js/adminlte.min.js"></script>
</body>
</html>
            