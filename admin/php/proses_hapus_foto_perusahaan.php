<?php

	require "../../koneksi/koneksi.php";

	
	$id_perusahaan = $_GET['id_perusahaan_nya'];
	$id_berkas = $_GET['id_berkas'];


	$query=pg_query($connection,"DELETE FROM gambar_perusahaan Where id_gambar_perusahaan = '$id_berkas'");
	echo "<script language=javascript>document.location.href='../../home_admin.php?page=halaman_perusahaan&id=$id_perusahaan'</script>";


	
?>