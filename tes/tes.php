<?php

class tes extends PHPUnit_Framework_TestCase
{
        function testFile()
        {
                include '../koneksi/koneksi.php';
                $connection = pg_connect($conn_string);
                $connection = pg_connect($conn_string);
                $login = pg_query($connection,"SELECT * FROM lowongan");
                $user = pg_num_rows($login);
                $content1 = $user;
            
                $this->assertEquals(7, $content1);
        }

        function testnama()
        {
                include '../koneksi/koneksi.php';
        	$login1 = pg_query($connection,"SELECT * FROM login where id_login =29 ");
                $user1 = pg_fetch_array($login1);
                $usernya = $user1['username'];

        	$content2 = $usernya;
        	$this->assertEquals('rahmahdian',$content2);
        }

        

          function testimb()
        {

               include '../koneksi/koneksi.php';
                $login3 = pg_query($connection,"SELECT * FROM perusahaan where nama_perusahaan = 'rahmahdian'");
                $user3 = pg_fetch_array($login3);
                $usernya2 = $user3['nomor_imb'];
                $content4 = $usernya2;
                $this->assertEquals(12345678765,$content4);
        }

        function testlowongan(){
                include '../koneksi/koneksi.php';
                $login = pg_query($connection,"SELECT * FROM lowongan WHERE id_perusahaan=29");
                $user = pg_num_rows($login);
                $content = $user;
                $this->assertEquals(2,$content);
        }

        function testlowongan_nama(){
                include '../koneksi/koneksi.php';
                $login = pg_query($connection,"SELECT nama_perusahaan FROM lowongan 
                Inner JOIN perusahaan on lowongan.id_perusahaan = perusahaan.id_perusahaan WHERE judul_lowongan = 'Politik' ");
                $user = pg_fetch_array($login);
                $usernya = $user['nama_perusahaan'];
                $content = $usernya;
                $this->assertEquals('rahmahdian',$content);
        }

        function testpertemanan(){
             include '../koneksi/koneksi.php';
                $pertemanan=pg_query($connection,"SELECT * FROM follower
                 INNER JOIN pelamar ON follower.id_pelamar=pelamar.id_pelamar 
                 WHERE pelamar_nama_lengkap='Wahyu Fajar Wicaksono' ");
                $kita=pg_fetch_array($pertemanan);
                $kita['id_pelamar']=34;
                $temannya=$kita['id_pelamar'];

                $this->assertEquals(34,$temannya);




        }

        function testgambar_perusahaan(){

            include '../koneksi/koneksi.php';
                $pertemanan=pg_query($connection,"SELECT * FROM gambar_perusahaan
                 INNER JOIN perusahaan ON gambar_perusahaan.id_perusahaan=perusahaan.id_perusahaan 
                 WHERE gambar_perusahaan='25.jpg' ");
                $kita=pg_fetch_array($pertemanan);
                
                $perusahaan=$kita['nama_perusahaan'];


                $this->assertEquals('azhar',$perusahaan);

        }
}

?>