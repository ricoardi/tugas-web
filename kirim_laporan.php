<?php
include 'koneksi_login.php';

    $id_klasifikasi = $_POST['id_klasifikasi'];
    $judul_laporan = $_POST['judul_laporan'];
    $isi_laporan = $_POST['isi_laporan'];
    $id_kategori = $_POST['id_kategori'];
    $email = $_POST['email'];
    $no_whatsapp = $_POST['no_whatsapp'];
    $tanggal_laporan = date("Y-m-d H:i:s");
    $tanggal_kejadian = $_POST['tanggal_kejadian'];

    $temp = explode(".", $_FILES["file_pendukung"]["name"]);
    $file_pendukung = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["file_pendukung"]["tmp_name"], "../assets/files/" . $file_pendukung);
    
    $query = "INSERT INTO tb_laporan VALUE(null, '$id_klasifikasi','$judul_laporan', '$isi_laporan','$id_kategori','$email','$no_whatsapp', '$tanggal_laporan','$tanggal_kejadian','$file_pendukung')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo '<script>alert("Data Sukses Dikirim")</script>';
        echo '<meta http-equiv="refresh" content="2;url=index.php">';
    } else {
        echo $query;
    }
  
