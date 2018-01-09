<?php

	require "../../koneksi/koneksi.php";

	
	$id_pelamar = $_GET['id_pelamar_nya'];
	$id_berkas = $_GET['id_berkas'];


	$query=pg_query($connection,"DELETE FROM cv Where id_cv = '$id_berkas'");
	echo "<script language=javascript>document.location.href='../../home_pelamar.php?page=berkas_pelamar&id_pelamar_nya=$id_pelamar'</script>";


	
?>