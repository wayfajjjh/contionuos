<?php
require_once '../../koneksi/koneksi.php';

 $id_teman = $_GET['id_teman'];
 $id_kita =  $_GET['id_kita'];

$query=pg_query($connection,"DELETE FROM follower WHERE id_pelamar=$id_teman AND id_login=$id_kita");
$query=pg_query($connection,"DELETE FROM follower Where id_pelamar=$id_kita AND id_login=$id_teman");


$query4=pg_query($connection,"DELETE FROM following WHERE id_pelamar=$id_teman AND id_login=$id_kita");
$query5=pg_query($connection,"DELETE FROM following WHERE id_pelamar=$id_kita AND id_login=$id_teman");
$query6=pg_query($connection,"DELETE FROM koneksi_teman WHERE id_pelamar=$id_teman AND id_login= $id_kita");

$query3=pg_query($connection,"DELETE FROM koneksi_teman WHERE  id_pelamar=$id_kita AND id_login=$id_teman");
$query7=pg_query($connection,"DELETE FROM pesan WHERE  id_pelamar=$id_kita AND id_login=$id_teman");
$query8=pg_query($connection,"DELETE FROM pesan WHERE  id_pelamar=$id_teman AND id_login=$id_kita");



 echo "<script>alert('Teman Di Hapus');window.location='../../home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$id_teman&page_profil=profil_kita';</script>";


?>



