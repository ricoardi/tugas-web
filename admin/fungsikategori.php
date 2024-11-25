<?php
include 'koneksi.php';

function tambah_datakategori($data)
{

  $id_kategori = $data['id_kategori'];
  $nama_kategori = $data['nama_kategori'];
  $ket_kategori = $data['ket_kategori'];
  $status_kategori = $data['status_kategori'];


  $query = "INSERT INTO tb_kategori VALUE(null, '$nama_kategori','$ket_kategori','$status_kategori',NULL)";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  if ($sql) {
    echo '<script>alert("Data Sukses Disimpan")</script>';
    echo '<meta http-equiv="refresh" content="2;url=kategori.php">';
  } else {
      echo $query;
  }
}

function ubah_datakategori($data)
{
    // var_dump($data); die();
  
  $id_kategori = $data['id_kategori'];
  $nama_kategori = $data['nama_kategori'];
  $ket_kategori = $data['ket_kategori'];
  $status_kategori = $data['status_kategori'];

  $queryShow = "SELECT * FROM tb_kategori WHERE id_kategori='$id_kategori';";
  $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  $result = mysqli_fetch_assoc($sqlShow);


  $query = "UPDATE tb_kategori SET nama_kategori='$nama_kategori',ket_kategori='$ket_kategori',status_kategori='$status_kategori' WHERE id_kategori='$id_kategori';";

  $sql = mysqli_query($GLOBALS['conn'], $query);
  if ($sql) {
    echo '<script>alert("Data Sukses Diubah")</script>';
    echo '<meta http-equiv="refresh" content="2;url=kategori.php">';
  } else {
      echo $query;
  }

}

function hapus_datakategori($data)
{
  $id_kategori = $data['hapuskategori'];

  $deleted_at = date("Y-m-d H:i:s");

  $query = "UPDATE tb_kategori SET deleted_at='$deleted_at' WHERE id_kategori='$id_kategori';";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  if ($sql) {
    echo '<script>alert("Data Sukses Dihapus")</script>';
    echo '<meta http-equiv="refresh" content="2;url=kategori.php">';
  } else {
      echo $query;
  }

  // return true;
}

