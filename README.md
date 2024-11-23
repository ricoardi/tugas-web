Silahkan buat dan tambahkan coding anda dalam folder admin

untuk masuk ke akun admin, silahkan gunakan
username : admin
password : admin


Relasi dalam PHP MYADMIN
ALTER TABLE `tb_laporan` ADD CONSTRAINT `kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori`(`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT;