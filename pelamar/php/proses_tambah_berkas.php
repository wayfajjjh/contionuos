<?php
require_once "../../koneksi/koneksi.php";
$id_pelamar  = $_POST['id_pelamar_nya'];
if(isset($_POST['btn_upload']))
{

  
    for($i = 0; $i < count($_FILES['file_img']['name']); $i++)
    {
        $filetmp = $_FILES["file_img"]["tmp_name"][$i];
        $filename = $_FILES["file_img"]["name"][$i];
        $filetype = $_FILES["file_img"]["type"][$i];
        $filepath = "../../img/pelamar/berkas/".$filename;
    
    move_uploaded_file($filetmp,$filepath);
    
    $sql = pg_query($connection,"INSERT INTO cv (nama_cv,id_pelamar) VALUES ('$filename','$id_pelamar')");
    if($sql){
                echo "<script>alert('Berkas Ditambahkan');window.location='../../home_pelamar.php?page=berkas_pelamar&id_pelamar_nya=$id_pelamar';</script>";

    }
    
    }
    
}
?>