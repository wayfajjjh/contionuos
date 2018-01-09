<?php
 require_once '../../koneksi/koneksi.php';
$id_pelamar = $_GET['id_kita'];
$id_lowongan = $_GET['id_lowongan'];

$query=pg_query($connection,"DELETE FROM lamaran where id_pelamar=$id_pelamar AND id_lowongan=$id_lowongan");


$query2=pg_query($connection,"SELECT * FROM lamaran_perusahaan where id_pelamar=$id_pelamar AND id_lowongan=$id_lowongan");
$r = pg_fetch_array($query2);

if(empty($r['status_lamaran'])){
	$query3=pg_query($connection,"DELETE FROM lamaran_perusahaan where id_pelamar=$id_pelamar AND id_lowongan=$id_lowongan");
}



	echo "<script language=javascript>document.location.href='../../home_pelamar.php?page=lowongan_dilamar&id=$id_pelamar'</script>";


?>