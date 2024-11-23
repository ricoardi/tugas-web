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

  $temp = explode(".", $_FILES["file_pendukung"]["name"]);
  $file_pendukung = round(microtime(true)) . '.' . end($temp);
  move_uploaded_file($_FILES["file_pendukung"]["tmp_name"], "../assets/files/" . $file_pendukung);

  $query = "INSERT INTO tb_laporan VALUE(null, '$id_klasifikasi', '$judul_laporan', 
  '$isi_laporan','$id_kategori','$email','$no_whatsapp','$tanggal_laporan','$tanggal_kejadian','$file_pendukung',
  '$status','$created_by',NULL)";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  if ($sql) {
    echo '<script>alert("Data Sukses Disimpan")</script>';
    echo '<meta http-equiv="refresh" content="2;url=laporan.php">';
  } else {
      echo $query;
  }
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
    $temp = explode(".", $_FILES["file_pendukung"]["name"]);
    $file_pendukung = round(microtime(true)) . '.' . end($temp);
    unlink("../assets/files/" . $result['file_pendukung']);
    move_uploaded_file($_FILES["file_pendukung"]["tmp_name"], "../assets/files/" . $file_pendukung);

  }

  $query = "UPDATE tb_laporan SET id_klasifikasi='$id_klasifikasi', judul_laporan='$judul_laporan', isi_laporan='$isi_laporan', 
  id_kategori='$id_kategori', email='$email', no_whatsapp='$no_whatsapp', tanggal_kejadian='$tanggal_kejadian', 
  file_pendukung='$file_pendukung' WHERE id_laporan='$id_laporan';";

  $sql = mysqli_query($GLOBALS['conn'], $query);
  if ($sql) {
    echo '<script>alert("Data Sukses Diubah")</script>';
    echo '<meta http-equiv="refresh" content="2;url=laporan.php">';
  } else {
      echo $query;
  }
}

function hapus_datalaporan($data)
{
  $id_laporan = $data['hapuslaporan'];

  // $queryShow = "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan';";
  // $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  // $result = mysqli_fetch_assoc($sqlShow);

  // unlink("../assets/files/" . $result['foto_laporan']);

  // $query = "DELETE FROM tb_laporan WHERE id_laporan = '$id_laporan';";

  $deleted_at = date("Y-m-d H:i:s");

  $query = "UPDATE tb_laporan SET deleted_at='$deleted_at' WHERE id_laporan='$id_laporan';";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  if ($sql) {
    echo '<script>alert("Data Sukses Dihapus")</script>';
    echo '<meta http-equiv="refresh" content="2;url=laporan.php">';
  } else {
      echo $query;
  }

  // return true;
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