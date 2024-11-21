
<?php
  include 'koneksi.php';

    $results = mysqli_query($conn, "SELECT * FROM `tb_klasifikasi` WHERE `status_klasifikasi` = 1");

    $kategori = mysqli_query($conn, "SELECT * FROM `tb_kategori`");

    $id_laporan = '';
    $id_klasifikasi = '';
    $id_kategori = '';
    $judul_laporan = '';
    $isi_laporan = '';
    $email = '';
    $no_whatsapp = '';
    $tanggal_kejadian = '';
    $file_pendukung = '';

    if (isset($_GET['ubahlaporan'])) {
        $id_laporan = $_GET['ubahlaporan'];
        // echo $id_laporan;
        $query = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $id_laporan = $result['id_laporan'];
        $id_klasifikasi = $result['id_klasifikasi'];
        $id_kategori = $result['id_kategori'];
        $judul_laporan = $result['judul_laporan'];
        $isi_laporan = $result['isi_laporan'];
        $email = $result['email'];
        $no_whatsapp = $result['no_whatsapp'];
        $tanggal_kejadian = $result['tanggal_kejadian'];
        $file_pendukung = $result['file_pendukung'];
        
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

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
    <!-- Brand Logo -->
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
            <a href="index.php" class="nav-link">
              <i class="fas fa-copy nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="laporan.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Laporan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="klasifikasi.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Klasifikasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kategori.php" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
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
              <li class="breadcrumb-item active">Laporan</li>
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
            <h3 class="card-title">Kelola Data Laporan</h3>
          </div>
          <div class="card-body">
            <div class="container">
              <form method="POST" action="proseslaporan.php" enctype="multipart/form-data">
                <input type="hidden" value="<?= $id_laporan; ?>" name="id_laporan">
                <div class="mb-3 row">
                  <label for="id_klasifikasi" class="col-sm-3 col-form-label">Pilih Klasifikasi</label>
                  <div class="col-sm-9">
                    <select name="id_klasifikasi" class="form-control" required>
                      <option value="">Pilih Klasifikasi Laporan</option> 
                      <?php while ($data = mysqli_fetch_array($results,MYSQLI_ASSOC)):; ?>
                      <option <?php if ($id_klasifikasi != '' && $data["id_klasifikasi"] == $id_klasifikasi ) { echo "selected";} ?> 
                        value="<?php echo $data["id_klasifikasi"];?>"> <?php echo $data["nama_klasifikasi"];?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
              
                <div class="mb-3 row">
                  <label for="judul_laporan" class="col-sm-3 col-form-label">Judul Laporan</label>
                  <div class="col-sm-9">
                    <input value="<?= $judul_laporan; ?>" required type="text" name="judul_laporan" class="form-control" id="judul_laporan" placeholder="Judul Laporan" />
                  </div>
                </div>
                    
                <div class="mb-3 row">
                  <label for="isi_laporan" class="col-sm-3 col-form-label">Isi Laporan</label>
                  <div class="col-sm-9">
                    <textarea required name="isi_laporan" class="form-control" id="isi_laporan" rows="3" placeholder="Ex: Ini adalah runtut kejadian ..."><?= $isi_laporan; ?></textarea>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="id_kategori" class="col-sm-3 col-form-label">Pilih Kategori</label>
                  <div class="col-sm-9">
                    <select name="id_kategori" class="form-control" required>
                      <option value="">Pilih Kategori Laporan</option> 
                      <?php  while ($datas = mysqli_fetch_array($kategori,MYSQLI_ASSOC)):; ?>
                      <option <?php if ($id_kategori != '' && $datas["id_kategori"] == $id_kategori ) { echo "selected";} ?>
                        value="<?php echo $datas["id_kategori"];?>">
                      <?php echo $datas["nama_kategori"]; ?>
                      </option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="email" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input value="<?= $email; ?>" required type="email" name="email" class="form-control" id="email" placeholder="zzzzz@gmail.com" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="no_whatsapp" class="col-sm-3 col-form-label">Nomor Whatsapp</label>
                  <div class="col-sm-9">
                    <input value="<?= $no_whatsapp; ?>" required type="text" name="no_whatsapp" class="form-control" id="no_whatsapp" placeholder="08...." />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="tanggal_kejadian" class="col-sm-3 col-form-label">Tanggal Kejadian</label>
                  <div class="col-sm-9">
                    <input value="<?= $tanggal_kejadian; ?>" required type="date" name="tanggal_kejadian" class="form-control" id="tanggal_kejadian" placeholder="" />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="file_pendukung" class="col-sm-3 col-form-label">File Pendukung</label>
                  <div class="col-sm-9">
                    <input <?php if (!isset($_GET['ubahlaporan'])) {
                      echo "required";
                    } ?> type="file" name="file_pendukung" class="form-control" id="file_pendukung" accept="image/*,.pdf,.doc,docx"/>
                  </div>
                </div>
                
                <div class="mb-3 row mt-4">
                  <div class="col">
                  <?php if (isset($_GET['ubahlaporan'])) { ?>
                    <button type="submit" name="aksilaporan" value="editlaporan" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Simpan Perubahan</button>
                  <?php } else { ?>
                    <button type="submit" name="aksilaporan" value="addlaporan" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Tambahkan</button>
                  <?php } ?>
                    <a href="laporan.php" type="button" class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i> Batal</a>
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
    <strong>Sistem Laporan Mahasiswa.</strong>
   
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
            
