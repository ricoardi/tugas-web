<?php
include 'koneksi.php';

function tambah_data($data, $files)
{
  $nisn = $data['nisn'];
  $nama_siswa = $data['nama_siswa'];
  $jenis_kelamin = $data['jenis_kelamin'];
  $foto = $files['foto']['name'];
  $alamat = $data['alamat'];

  $dir = "../img/";
  $tmpFile = $files['foto']['tmp_name'];

  move_uploaded_file($tmpFile, $dir . $foto);

  $query = "INSERT INTO tb_siswa VALUE(null, '$nisn', '$nama_siswa', '$jenis_kelamin', '$foto', '$alamat')";
  $sql = mysqli_query($GLOBALS['conn'], $query);

  return true;
}

function ubah_data($data, $files)
{
  $id_siswa = $data['id_siswa'];
  $nisn = $data['nisn'];
  $nama_siswa = $data['nama_siswa'];
  $jenis_kelamin = $data['jenis_kelamin'];
  $alamat = $data['alamat'];

  $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa';";
  $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  $result = mysqli_fetch_assoc($sqlShow);

  if ($files['foto']['name'] == "") {
    $foto = $result['foto_siswa'];
  } else {
    $foto = $files['foto']['name'];
    unlink("../img/" . $result['foto_siswa']);
    move_uploaded_file($files['foto']['tmp_name'], '../img/' . $files['foto']['name']);
  }

  $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto_siswa='$foto' WHERE id_siswa='$id_siswa';";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  return true;
}

function hapus_data($data)
{
  $id_siswa = $data['hapus'];

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