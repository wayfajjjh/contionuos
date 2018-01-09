<?php

	require "../../koneksi/koneksi.php";

	
	$id_perusahaan = $_GET['id_perusahaan_nya'];
	$id_berkas = $_GET['id_berkas'];


	$query=pg_query($connection,"DELETE FROM berkas_perusahaan Where id_berkas_perusahaan = '$id_berkas'");
	echo "<script language=javascript>document.location.href='../../home_perusahaan.php?page=berkas_perusahaan&id_perusahaan_nya=$id_perusahaan'</script>";


	
?>