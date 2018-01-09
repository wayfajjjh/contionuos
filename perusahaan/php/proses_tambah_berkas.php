<?php
require_once "../../koneksi/koneksi.php";
$id_perusahaan  = $_POST['id_perusahaan_nya'];
if(isset($_POST['btn_upload']))
{

  
    for($i = 0; $i < count($_FILES['file_img']['name']); $i++)
    {
        $filetmp = $_FILES["file_img"]["tmp_name"][$i];
        $filename = $_FILES["file_img"]["name"][$i];
        $filetype = $_FILES["file_img"]["type"][$i];
        $filepath = "../../img/perusahaan/berkas/".$filename;
    
    move_uploaded_file($filetmp,$filepath);
    
    $sql = pg_query($connection,"INSERT INTO berkas_perusahaan (nama_berkas,id_perusahaan) VALUES ('$filename','$id_perusahaan')");
    if($sql){
                echo "<script>alert('Berkas Ditambahkan');window.location='../../home_perusahaan.php?page=berkas_perusahaan&id_perusahaan_nya=$id_perusahaan';</script>";

    }
    
    }
    
}
?>