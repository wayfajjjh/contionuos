<?php
require_once '../../koneksi/koneksi.php';

$id = $_POST['id_pelamar'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal = $_POST['tgl'];
$email  = $_POST['email'];
$status = $_POST['status'];
$nomor = $_POST['nomor'];
$pendidikan_terakhir = $_POST['derajat'];
$t_pendidikan = $_POST['tempat_pendidikan'];
$kerja = $_POST['pekerjaan'];
$t_kerja = $_POST['tempat_kerja'];
$kota = $_POST['kota'];

	$file 		= $_FILES['gambar']['tmp_name'];
	$gambar 	= $_FILES['gambar']['name'];
	$direktori	= "../../img/pelamar/foto_profil/$gambar";
	move_uploaded_file($file, $direktori);



$query=pg_query($connection,"UPDATE pelamar SET 
	pelamar_nama_lengkap = '$nama' , 
	pelamar_alamat = '$alamat', 
	jenis_kelamin = '$jk',
	tempat_lahir = '$tempat_lahir',
	tanggal_lahir = '$tanggal',
	status = '$status',
	email = '$email',
	telepon  = '$nomor',
	pendidikan_terakhir = '$pendidikan_terakhir',
	tempat_pendidikan_terakhir = '$t_pendidikan',
	pekerjaan_terakhir = '$kerja',
	tempat_pekerjaan_terakhir  = '$t_kerja',
	foto_profil = '$gambar',
	id_kota = '$kota'
	WHERE id_pelamar = '$id'



	");


	echo "<script language=javascript>document.location.href='../../home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$id'</script>";




?>