<?php
	require_once "../../koneksi/koneksi.php";
	$id = $_POST['id_lowongan'];
	$id_kategori = $_POST['id_kategori'];
	$id_kita = $_POST['id_kita'];
	$judul = $_POST['judul_lowongan'];
	$kategori = $_POST['kategori'];
	$isi = $_POST['isi'];
	$tanggal_buka = date('Y-m-d');
	$tanggal_tutup = $_POST['tanggal_tutup'];
	$pegawai = $_POST['pegawai'];

	$file 		= $_FILES['gambar']['tmp_name'];
	$gambar 	= $_FILES['gambar']['name'];
	$direktori	= "../../img/perusahaan/thumbnails/$gambar";
	move_uploaded_file($file, $direktori);

	if(empty($isi)){
	echo "<script>alert(' Deskripsi Tidak Boleh Kosong !');window.location='../../home_perusahaan.php?page=tambah_lowongan&id=$id';</script>";

	}else if(empty($gambar)){
		echo "<script>alert(' Gambar Tidak Boleh Kosong !');window.location='../../home_perusahaan.php?page=tambah_lowongan&id=$id';</script>";
	
	}else{
		$query=pg_query($connection,"UPDATE lowongan SET 
			id_kategori='$kategori',
			judul_lowongan='$judul',
			deskripsi='$isi',
			max_lamaran = '$pegawai',
			gambar_lowongan ='$gambar' where id_lowongan ='$id'");

	

	echo "<script>;window.location='../../home_perusahaan.php?page=edit_syarat_lowongan&id_lowongan=$id&id_kita=$id_kita';</script>";

	}


	
	




?>