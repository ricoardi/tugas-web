<?php
include 'fungsilaporan.php';

if (isset($_POST['aksilaporan'])) {

  if ($_POST['aksilaporan'] == "addlaporan") {

    $berhasil = tambah_datalaporan($_POST, $_FILES);

    if ($berhasil) {
      header("location: laporan.php");
    } else {
      echo $berhasil;
    }
  } else if ($_POST['aksilaporan'] == "editlaporan") {

    $berhasil = ubah_datalaporan($_POST, $_FILES);

    if ($berhasil) {
      header("location: laporan.php");
    } else {
      echo $berhasil;
    }
  }
}

if (isset($_GET['hapuslaporan'])) {

  $berhasil = hapus_datalaporan($_GET);

  if ($berhasil) {
    header("location: laporan.php");
  } else {
    echo $berhasil;
  }
}

if (isset($_GET['valid'])) {

    $berhasil = valid($_GET);
  
    if ($berhasil) {
      header("location: laporan.php");
    } else {
      echo $berhasil;
    }
}

if (isset($_GET['notvalid'])) {

    $berhasil = notvalid($_GET);
  
    if ($berhasil) {
      header("location: laporan.php");
    } else {
      echo $berhasil;
    }
}
