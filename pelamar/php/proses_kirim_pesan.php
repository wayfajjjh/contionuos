<?php

require_once '../../koneksi/koneksi.php';


$id_kita=$_POST['id_kita'];
$id_teman=$_POST['id_teman'];

$isi=$_POST['isi'];
	$tanggal = date('Y-m-d');


$query_pesan=pg_query($connection,"INSERT INTO pesan(isi_pesan,id_pelamar,id_login,tanggal_masuk) 
	VALUES ('$isi',$id_kita,$id_teman,'$tanggal')");


	echo "<script language=javascript>document.location.href='../../home_pelamar.php?page=pesan&id_pelamar_nya=$id_teman'</script>";

?>