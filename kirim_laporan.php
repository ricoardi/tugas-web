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
    
    $file_pendukung = $_FILES['file_pendukung']['name'];

    // $dir = "../assets/files/";
    // $tmpFile = $_FILES['file_pendukung']['tmp_name'];
    
    // move_uploaded_file($tmpFile, $dir . $file_pendukung);
    move_uploaded_file($_FILES['file_pendukung']['tmp_name'], 'assets/files/' . $_FILES['file_pendukung']['name']);

    $query = "INSERT INTO tb_laporan VALUE(null, '$id_klasifikasi','$judul_laporan', '$isi_laporan','$id_kategori','$email','$no_whatsapp', '$tanggal_laporan','$tanggal_kejadian','$file_pendukung')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo '<script>alert("Data Sukses Dikirim")</script>';
        // echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><strong> Sukses..!</strong> Data Berhasil Tersimpan.</div>';
        // header("location: index.php");
        echo '<meta http-equiv="refresh" content="3;url=index.php">';
    } else {
        echo $query;
    }
  
