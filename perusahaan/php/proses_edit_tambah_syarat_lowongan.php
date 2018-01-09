<?php
	require "../../koneksi/koneksi.php";
	$id_lowongan = $_POST['id'];
		$id = $_POST['id_pt'];

	$syarat = $_POST['array_syarat'];
	$syarat = explode("---",$syarat);
	$keys = array_keys($syarat);
	$last = end($keys);
	unset($syarat[$last]);

	foreach ($syarat as $s) {
		$strQuery = "INSERT INTO syarat(id_lowongan,nama_syarat) VALUES('$id_lowongan','$s')";
		$query = pg_query($connection, $strQuery);
	}

	if(!isset($_POST['from'])){
		echo "<script language=javascript>document.location.href='../../home_perusahaan.php?page=tambah_edit_gambar&id=$id&id_lowongan=$id_lowongan'</script>";
	}else {
		echo "<script language=javascript>document.location.href='../lowongan_detail.php?id=$id'</script>";
	}
	
	pg_close($connection);
?>