<?php

	require "../../koneksi/koneksi.php";

	
	$id_perusahaan = $_GET['id_perusahaan_nya'];
	$id_gambar = $_GET['id_gambar'];


	$query=pg_query($connection,"DELETE FROM gambar_perusahaan Where id_gambar_perusahaan = '$id_gambar'");
	echo "<script language=javascript>document.location.href='../../home_perusahaan.php?page=edit_gambar&id_perusahaan_nya=$id_perusahaan'</script>";


	
?>