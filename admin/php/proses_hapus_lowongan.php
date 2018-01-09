<?php 

	require_once '../../koneksi/koneksi.php';
	$id = $_GET['id'];
	$id_perusahaan=$_GET['id_kita'];


	$query = pg_query($connection,"DELETE FROM gambar_lowongan where id_lowongan = '$id'");
	$query2  = pg_query($connection,"DELETE FROM syarat where id_lowongan = '$id'");
	$query4 = pg_query($connection,"DELETE FROM lamaran where id_lowongan= '$id'");
	$query5 = pg_query($connection,"DELETE FROM lamaran_perusahaan where id_lowongan= '$id'");

	$query3 = pg_query($connection,"DELETE FROM lowongan where id_lowongan = '$id'");
	

	echo "<script>alert('Dihapus!');window.location='../../home_admin.php?page=halaman_perusahaan&id=$id_perusahaan';</script>";


?>