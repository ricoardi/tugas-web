<?php
include 'koneksi.php';

function tambah_dataklasifikasi($data)
{

  $id_klasifikasi = $data['id_klasifikasi'];
  $nama_klasifikasi = $data['nama_klasifikasi'];
  $ket_klasifikasi = $data['ket_klasifikasi'];
  $status_klasifikasi = $data['status_klasifikasi'];


  $query = "INSERT INTO tb_klasifikasi VALUE(null, '$nama_klasifikasi','$ket_klasifikasi','$status_klasifikasi',NULL)";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  if ($sql) {
    echo '<script>alert("Data Sukses Disimpan")</script>';
    echo '<meta http-equiv="refresh" content="2;url=klasifikasi.php">';
  } else {
      echo $query;
  }
}

function ubah_dataklasifikasi($data)
{
    // var_dump($data); die();
  
  $id_klasifikasi = $data['id_klasifikasi'];
  $nama_klasifikasi = $data['nama_klasifikasi'];
  $ket_klasifikasi = $data['ket_klasifikasi'];
  $status_klasifikasi = $data['status_klasifikasi'];

  $queryShow = "SELECT * FROM tb_klasifikasi WHERE id_klasifikasi='$id_klasifikasi';";
  $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
  $result = mysqli_fetch_assoc($sqlShow);


  $query = "UPDATE tb_klasifikasi SET nama_klasifikasi='$nama_klasifikasi',ket_klasifikasi='$ket_klasifikasi',status_klasifikasi='$status_klasifikasi' WHERE id_klasifikasi='$id_klasifikasi';";

  $sql = mysqli_query($GLOBALS['conn'], $query);
  if ($sql) {
    echo '<script>alert("Data Sukses Diubah")</script>';
    echo '<meta http-equiv="refresh" content="2;url=klasifikasi.php">';
  } else {
      echo $query;
  }

}

function hapus_dataklasifikasi($data)
{
  $id_klasifikasi = $data['hapusklasifikasi'];

  $deleted_at = date("Y-m-d H:i:s");

  $query = "UPDATE tb_klasifikasi SET deleted_at='$deleted_at' WHERE id_klasifikasi='$id_klasifikasi';";

  $sql = mysqli_query($GLOBALS['conn'], $query);

  if ($sql) {
    echo '<script>alert("Data Sukses Dihapus")</script>';
    echo '<meta http-equiv="refresh" content="2;url=klasifikasi.php">';
  } else {
      echo $query;
  }

  // return true;
}

