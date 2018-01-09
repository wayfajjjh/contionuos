<?php
require_once '../../koneksi/koneksi.php';

$id_pelamar = $_POST['id_pelamar'];
$id_lowongan = $_POST['id_lowongan'];
$id_kita = $_POST['id_kita'];
$status =  $_POST['status'];

$query=pg_query($connection,"UPDATE lamaran SET hasil_lamaran='$status' 
	WHERE id_lowongan = $id_lowongan AND id_pelamar = $id_pelamar ");
$query2=pg_query($connection,"UPDATE lamaran_perusahaan SET status_lamaran='$status' 
	WHERE id_pelamar = $id_pelamar AND id_lowongan = $id_lowongan ");

$query3=pg_query($connection,"SELECT status_lamaran FROM lamaran_perusahaan 	
	WHERE id_pelamar=$id_pelamar AND id_lowongan=$id_lowongan ");
$r=pg_fetch_array($query3);
if($r['status_lamaran']=="Gagal"){
	$query5=pg_query("INSERT INTO  gagal(id_pelamar,id_perusahaan) VALUES ($id_pelamar,$id_kita)");
	$query4=pg_query("DELETE FROM lamaran_perusahaan 
		WHERE id_pelamar=$id_pelamar AND id_lowongan=$id_lowongan");

}else{

}

echo "<script language=javascript>document.location.href='../../home_perusahaan.php?page=profil_pelamar&id_pelamar=$id_pelamar&id_lowongan=$id_lowongan&id_kita=$id_kita'</script>";

?>