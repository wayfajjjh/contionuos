<?php
require_once '../../koneksi/koneksi.php';

 $id_teman = $_GET['id_teman'];
 $id_kita =  $_GET['id_kita'];

$query=pg_query($connection,"INSERT INTO following(id_pelamar,id_login) VALUES ($id_teman,$id_kita)");
$query2=pg_query($connection,"INSERT INTO following(id_pelamar,id_login) VALUES ($id_kita,$id_teman)");
$query3=pg_query($connection,"INSERT INTO koneksi_teman(id_pelamar,id_login) VALUES ($id_teman,$id_kita)");



 echo "<script>alert('Teman Ditambahkan');window.location='../../home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$id_teman&page_profil=profil_kita';</script>";


?>