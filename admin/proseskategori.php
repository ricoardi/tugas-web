<?php
include 'fungsikategori.php';

if (isset($_POST['aksikategori'])) {

    if ($_POST['aksikategori'] == "addkategori") {

        $berhasil = tambah_datakategori($_POST);
    
        if ($berhasil) {
          header("location: kategori.php");
        } else {
          echo $berhasil;
        }
      } else if ($_POST['aksikategori'] == "editkategori") {
        // var_dump('X'); die();
        $berhasil = ubah_datakategori($_POST);
    
        if ($berhasil) {
          header("location: kategori.php");
        } else {
          echo $berhasil;
        }
      }
}

if (isset($_GET['hapuskategori'])) {

  $berhasil = hapus_datakategori($_GET);

  if ($berhasil) {
    header("location: kategori.php");
  } else {
    echo $berhasil;
  }
}

