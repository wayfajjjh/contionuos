<?php

//require_once '../../koneksi/koneksi.php';

	$file = $_FILES['gambar']['tmp_name'];
	$gambar = $_FILES['gambar']['name'];
	$direktori ="../../img/pelamar/foto_profil/$gambar";
	move_uploaded_file($file, $direktori);


?>