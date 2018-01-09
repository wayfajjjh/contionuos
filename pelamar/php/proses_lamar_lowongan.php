<?php
require_once '../../koneksi/koneksi.php';

$id_lowongan=$_GET['id_lowongan'];
$id_kategori = $_GET['id_kategori'];
$id_kita = $_GET['id_kita'];
$id_perusahaan = $_GET['id_perusahaan'];

$query=pg_query($connection,"INSERT INTO lamaran(id_pelamar,id_lowongan) VALUES ($id_kita,$id_lowongan)");
$query2=pg_query($connection,"INSERT INTO lamaran_perusahaan(id_pelamar,id_lowongan) VALUES ($id_kita,$id_lowongan)");
echo "<script language=javascript>document.location.href='../../home_pelamar.php?page=halaman_lowongan&id=$id_lowongan&id_kategori=$id_kategori&id_perusahaan=$id_perusahaan&id_kita=$id_kita'</script>";


?>