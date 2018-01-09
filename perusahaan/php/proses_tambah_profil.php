<?php
	require_once "../../koneksi/koneksi.php";

	$id = $_POST['id_perusahaan'];
	$alamat = $_POST['alamat'];
	$isi = $_POST['isi'];
	$email = $_POST['email'];
	$nomor = $_POST['nomor'];
	$kota = $_POST['kota'];

	if(isset($_POST['btn_upload']))
		{
		   
		       $file 		= $_FILES['gambar']['tmp_name'];
				$gambar 	= $_FILES['gambar']['name'];
				$direktori	= "../../img/perusahaan/perusahaan_thumbnails/$gambar";
				move_uploaded_file($file, $direktori);
		    
		    
		    
		    $sql2 = pg_query($connection,"UPDATE perusahaan SET alamat_perusahaan = '$alamat' ,email_perusahaan = '$email',deskripsi_perusahaan = '$isi' ,telp_perusahaan='$nomor' ,id_kota='$kota' , foto_profil_perusahaan='$gambar' where id_perusahaan = '$id' ");
		    if($sql2){
		                echo "<script>alert('Lowongan Berhasil Dibuat');window.location='../../home_perusahaan.php?page=profil_perusahaan&id_perusahaan_nya=$id';</script>";

		    }
		    
		    
		}

?>