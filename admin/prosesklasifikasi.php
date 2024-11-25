<?php
include 'fungsiklasifikasi.php';

if (isset($_POST['aksiklasifikasi'])) {

    if ($_POST['aksiklasifikasi'] == "addklasifikasi") {

        $berhasil = tambah_dataklasifikasi($_POST);
    
        if ($berhasil) {
          header("location: klasifikasi.php");
        } else {
          echo $berhasil;
        }
      } else if ($_POST['aksiklasifikasi'] == "editklasifikasi") {
        // var_dump('X'); die();
        $berhasil = ubah_dataklasifikasi($_POST);
    
        if ($berhasil) {
          header("location: klasifikasi.php");
        } else {
          echo $berhasil;
        }
      }
}

if (isset($_GET['hapusklasifikasi'])) {

  $berhasil = hapus_dataklasifikasi($_GET);

  if ($berhasil) {
    header("location: klasifikasi.php");
  } else {
    echo $berhasil;
  }
}

