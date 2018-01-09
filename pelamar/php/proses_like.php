<?php
require_once "../../koneksi/koneksi.php";

$id_perusahaan = $_GET['id_perusahaan_nya'];
$id_pelamar = $_GET['id_pelamar'];

$q1=pg_query($connection,"INSERT INTO likes(id_perusahaan,id_pelamar,jumlah_likes) VALUES ($id_perusahaan,$id_pelamar,1)");

$q3=pg_query($connection,"SELECT *FROM dislikes WHERE id_perusahaan=$id_perusahaan AND id_pelamar=$id_pelamar");
$r=pg_fetch_array($q3);
if(isset($r['id_perusahaan']) AND isset($r['id_pelamar'])){
	$q2=pg_query($connection,"DELETE FROM dislikes WHERE id_perusahaan=$id_perusahaan AND id_pelamar=$id_pelamar");

}


echo "<script>alert('TerimaKasih Telah Memberikan Rating');window.location='../../home_pelamar.php?page=profil_perusahaan&id_perusahaan_nya=$id_perusahaan';</script>";



?>