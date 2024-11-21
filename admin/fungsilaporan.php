<?php
include 'koneksi.php';

function tambah_datalaporan($data, $files)
{

  $id_klasifikasi = $data['id_klasifikasi'];
  $judul_laporan = $data['judul_laporan'];
  $isi_laporan = $data['isi_laporan'];
  $id_kategori = $data['id_kategori'];
  $email = $data['email'];
  $no_whatsapp = $data['no_whatsapp'];
  $tanggal_kejadian = $data['tanggal_kejadian'];
  $status = '1';
  $created_by = 'admin';
  $tanggal_laporan = date("Y-m-d H:i:s");

  $file_pendukung = $files['file_pendukung']['name'];

  $dir = "../assets/files/";
  $tmpFile = $files['file_pendukung']['tmp_name'];

  move_uploaded_file($tmpFile, $dir . $file_pendukung);

  $query = "INSERT INTO tb_laporan VALUE(null, '$id_klasifikasi', '$judul_laporan', 
  '$isi_laporan','$id_kategori','$email','$no_whatsapp','$tanggal_laporan','$tanggal_kejadian','$file_pendukung',
  '$status','$created_by',NULL)";

  $sql = mysqli_query($GLOBALS['conn'], $query);
  // var_dump($sql); exit;

  if ($sql) {
    echo '<script>alert("Data Sukses Dikirim")</script>';
    // echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><strong> Sukses..!</strong> Data Berhasil Tersimpan.</div>';
    // header("location: index.php");
    echo '<meta http-equiv="refresh" content="2;url=laporan.php">';
  } else {
      echo $query;
  }
  // return true;
}

function ubah_datalaporan($data, $files)
{
  $id_laporan = $data['id_laporan'];
  $id_klasifikasi = $data['id_klasifikasi'];
  $judul_laporan = $data['judul_laporan'];
  $isi_laporan = $data['isi_laporan'];
  $id_kategori = $data['id_kategori'];
  $email = $data['email'];
  $no_whatsapp = $data['no_whatsapp'];
  $tanggal_kejadian = $data['tanggal_kejadian'];

  $queryShow = "SELECT * FROM tb_laporan WHERE id_laporan='$id_laporan';";
  $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  $result = mysqli_fetch_assoc($sqlShow);

  if ($files['file_pendukung']['name'] == "") {
    $file_pendukung = $result['file_pendukung'];
  } else {
    $file_pendukung = $files['file_pendukung']['name'];
    unlink("../assets/files/" . $result['file_pendukung']);
    move_uploaded_file($files['file_pendukung']['tmp_name'], '../assets/files/' . $files['file_pendukung']['name']);
  }

  $query = "UPDATE tb_laporan SET id_klasifikasi='$id_klasifikasi', judul_laporan='$judul_laporan', isi_laporan='$isi_laporan', 
  id_kategori='$id_kategori', email='$email', no_whatsapp='$no_whatsapp', tanggal_kejadian='$tanggal_kejadian', 
  file_pendukung='$file_pendukung' WHERE id_laporan='$id_laporan';";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  return true;
}

function hapus_datalaporan($data)
{
  $id_siswa = $data['hapuslaporan'];

  $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
  $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  $result = mysqli_fetch_assoc($sqlShow);

  unlink("../img/" . $result['foto_siswa']);

  $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa';";
  $sql = mysqli_query($GLOBALS['conn'], $query);

  return true;
}

function valid($data)
{
  $id_laporan = $data['valid'];

  $queryShow = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
  $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  $result = mysqli_fetch_assoc($sqlShow);

  $query = "UPDATE tb_laporan SET status='1' WHERE id_laporan='$id_laporan';";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  return true;
}

function notvalid($data)
{
  $id_laporan = $data['notvalid'];

  $queryShow = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
  $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  $result = mysqli_fetch_assoc($sqlShow);

  $query = "UPDATE tb_laporan SET status='2' WHERE id_laporan='$id_laporan';";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  return true;
}