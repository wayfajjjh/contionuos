<?php
	require_once "../../koneksi/koneksi.php";
	$id = $_POST['id_pt'];
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
		$query=pg_query($connection,"INSERT INTO lowongan(id_perusahaan,id_kategori,judul_lowongan,deskripsi,tanggal_buka,tanggal_tutup,gambar_lowongan,max_lamaran) VALUES 
			('$id',
			'$kategori',
			'$judul',
			'$isi',
			 '$tanggal_buka',
			 '$tanggal_tutup',
			 '$gambar',
			 '$pegawai')");

	$query_ambil = pg_query($connection,"SELECT * FROM lowongan where id_lowongan IN(Select MAX(id_lowongan)FROM lowongan)");
	$hasilnya = pg_fetch_array($query_ambil);
	$r = $hasilnya['id_lowongan'];
	$id_lowongan = $r;

	echo "<script>;window.location='../../home_perusahaan.php?page=tambah_syarat_lowongan&id=$id&id_lowongan=$id_lowongan';</script>";

	}


	
	




?>