<?php 
require_once "../../koneksi/koneksi.php";

$id_perusahaan = $_POST['id_perusahaan'];


//$coba=$_POST['coba'];
 			$file 		= $_FILES['gambar']['tmp_name'];
			$gambar 	= $_FILES['gambar']['name'];
			$direktori	= "../../img/perusahaan/perusahaan_thumbnails/$gambar";
			move_uploaded_file($file, $direktori);

	$query=pg_query($connection,"UPDATE perusahaan SET foto_profil_perusahaan ='$gambar' WHERE id_perusahaan='$id_perusahaan'");

echo "<script language=javascript>document.location.href='../../home_perusahaan.php'</script>";


?>