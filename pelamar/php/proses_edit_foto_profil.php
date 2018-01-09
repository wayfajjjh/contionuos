<?php 
require_once "../../koneksi/koneksi.php";

$id_pelamar = $_POST['id_pelamar'];


//$coba=$_POST['coba'];
 			$file 		= $_FILES['gambar']['tmp_name'];
			$gambar 	= $_FILES['gambar']['name'];
			$direktori	= "../../img/pelamar/foto_profil/$gambar";
			move_uploaded_file($file, $direktori);

	$query=pg_query($connection,"UPDATE pelamar SET foto_profil = '$gambar' WHERE id_pelamar= '$id_pelamar'");

echo "<script language=javascript>document.location.href='../../home_pelamar.php?page=profil_pelamar&page_profil=profil_kita&id_pelamar_nya=$id_pelamar'</script>";


?>