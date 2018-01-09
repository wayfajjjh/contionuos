<?php

require_once '../../koneksi/koneksi.php';

$id_lowongan = $_GET['id_lowongan'];
$id_kita = $_GET['id_kita'];

echo "$_GET[id_syarat]";
$query=pg_query($connection,"DELETE FROM syarat WHERE id_syarat = $_GET[id_syarat]");
echo "<script language=javascript>document.location.href='../../home_perusahaan.php?page=edit_syarat_lowongan&id_lowongan=$id_lowongan&id_kita=$id_kita'</script>";


?>