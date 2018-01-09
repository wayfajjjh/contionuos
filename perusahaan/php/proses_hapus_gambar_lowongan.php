<?php

	require "../../koneksi/koneksi.php";

	$id = $_GET['id'];
	$id_gambar = $_GET['id_gambar'];
	$id_lowongan = $_GET['id_lowongan'];


	$query=pg_query($connection,"DELETE FROM gambar_lowongan Where id_gambar = '$id_gambar'");
	echo "<script language=javascript>document.location.href='../../home_perusahaan.php?page=tambah_edit_gambar&id=$id&id_lowongan=$id_lowongan'</script>";


	
?>