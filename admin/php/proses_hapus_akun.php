<?php

require_once '../../koneksi/koneksi.php';
$id_perusahaan =$_GET['id_perusahaan'];

$query=pg_query($connection,"SELECT * FROM lowongan WHERE id_perusahaan=$id_perusahaan");

$lowongan=pg_fetch_array($query);
	if(isset($lowongan['id_perusahaan'])){
	echo "<script>alert('Tidak Dapat Dihapus Karena Masih Mempunyai Waktu Kontrak');window.location='../../home_admin.php?page=perusahaan&id=$id_perusahaan';</script>";

	}else{


		$q1=pg_query($connection,"DELETE FROM 	berkas_perusahaan			WHERE 	 id_perusahaan=$id_perusahaan	");
		$q4=pg_query($connection,"DELETE FROM 		gambar_perusahaan		WHERE id_perusahaan=$id_perusahaan		");
		$q7=pg_query($connection,"DELETE FROM 			perusahaan	WHERE 	id_perusahaan=$id_perusahaan	");
		$q6=pg_query($connection,"DELETE FROM 			login	WHERE 	id_login=$id_perusahaan	");
			
		echo "<script>alert('Dihapus!');window.location='../../home_admin.php?page=perusahaan&id=$id_perusahaan';</script>";

	}









?>

