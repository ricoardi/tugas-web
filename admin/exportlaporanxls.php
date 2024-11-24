<?php
      include 'koneksi.php';

      $query = 
      "SELECT * FROM tb_laporan 
      JOIN tb_klasifikasi ON tb_klasifikasi.id_klasifikasi = tb_laporan.id_klasifikasi
      JOIN tb_kategori ON tb_kategori.id_kategori = tb_laporan.id_kategori
      WHERE tb_laporan.deleted_at IS NULL AND tb_laporan.status = 1
      ";
      $sql = mysqli_query($conn, $query);
      $no = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rekap Data Laporan Valid</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Laporan Valid.xls");
	?>
 
	<center>
		<h1>Rekap Data Laporan Valid<br/> pada website AYO LAPOR!</h1>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>Klasifikasi</th>
			<th>Kategori</th>
			<th>Judul Laporan</th>
            <th>Isi Laporan</th>
            <th>Email</th>
            <th>No Whatsapp</th>
            <th>Tanggal Kejadian</th>
            <th>Tanggal Laporan</th>
		</tr>
		<?php
            while ($result = mysqli_fetch_assoc($sql)) {
        ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $result['nama_klasifikasi']; ?></td>
            <td><?php echo $result['nama_kategori']; ?></td>
            <td><?php echo $result['judul_laporan']; ?></td>
            <td><?php echo $result['isi_laporan']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo "'" . $result['no_whatsapp']; ?></td>
            <td><?php echo $result['tanggal_kejadian']; ?></td>
            <td><?php echo $result['tanggal_laporan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>