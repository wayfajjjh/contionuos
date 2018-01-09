<?php
require_once "../../koneksi/koneksi.php";
$id_lowongan = $_POST['id_lowongan'];
$id  = $_POST['id'];
if(isset($_POST['btn_upload']))
{

  
    for($i = 0; $i < count($_FILES['file_img']['name']); $i++)
    {
        $filetmp = $_FILES["file_img"]["tmp_name"][$i];
        $filename = $_FILES["file_img"]["name"][$i];
        $filetype = $_FILES["file_img"]["type"][$i];
        $filepath = "../../img/perusahaan/foto_lowongan/".$filename;
    
    move_uploaded_file($filetmp,$filepath);
    
    $sql = pg_query($connection,"INSERT INTO gambar_lowongan (foto_gambar,id_lowongan) VALUES ('$filename','$id_lowongan')");
    if($sql){
                echo "<script>alert('Lowongan Berhasil Dibuat');window.location='../../home_perusahaan.php?page=verified&id=$id&id_lowongan=$id_lowongan';</script>";

    }
    
    }
    
}
?>