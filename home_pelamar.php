<!DOCTYPE html>
<?php
require_once 'koneksi/koneksi.php';

date_default_timezone_set('asia/jakarta');
session_start();
if (!isset($_SESSION['pelamar_nama_lengkap'])){
  echo " Anda Blum Masuk ! ";
}
if(!isset($_SESSION['pelamar_nama_lengkap'])){
  header('location:login.php');
}
$login_role = $_SESSION['role_login'];
 $nama_perusahaan = $_SESSION['pelamar_nama_lengkap'] ;
$id = $_SESSION['id_pelamar'];
include 'tinymcpuk/editor.php';
?>
<html lang="en">
  <head>
    

    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AyoKerja.com</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css_kita/style.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   

  </head>
  <body  id="page-top">
  
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#f05f40; ">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"style="color:white;">AyoKerja.Com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li ><a href=<?php echo "home_pelamar.php?id=$id"; ?>>Home</a></li>
            <li ><a href="<?php echo "home_pelamar.php?page=lowongan_dilamar&id=$id"; ?>">Lowongan Dilamar</a></li>

        

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori <b class="caret"></b></a>
              <ul class="dropdown-menu">
              
              <?php
              $query=pg_query($connection,"SELECT * FROM kategori");
              $kosong=0;
              while($kategori=pg_fetch_array($query)){

              ?>
                <li><a href="<?php echo"home_pelamar.php?page=halaman_gabungan&id_kategori=$kategori[id_kategori]&id_kota=$kosong"?>" style="color:#f05f40;"><?php echo"$kategori[nama_kategori]" ?></a></li>

                <?php

              }

                ?>
               
              </ul>
            </li>
          </ul>
          <div class="col-sm-3 col-md-3">
                  

              <form method="POST" action="home_pelamar.php?page=cari" enctype="multipart/form-data" class="navbar-form" role="search">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="kunci">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
              </form>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <?php
            $query=pg_query($connection,"SELECT * FROM pelamar INNER JOIN login ON pelamar.id_login = login.id_login where id_pelamar = '$_SESSION[id_pelamar]' ");
            $nama = pg_fetch_array($query);
            ?>
            <li class="dropdown"> <a href="#" class="dropdown-toggle"  data-toggle="dropdown">hi, <?php echo $nama['username'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href=<?php  echo "home_pelamar.php?page=profil_pelamar&page_profil=profil_kita&id_pelamar_nya=$_SESSION[id_pelamar]"; ?> style="color:black;">My Profile</a></li>
                <li><a href=<?php  echo "home_pelamar.php?page=berkas_pelamar&id_pelamar_nya=$_SESSION[id_pelamar]"; ?> style="color:black;">Berkas</a></li>
                <li><a href="session_destroy.php" style="color:black;">Logout</a></li>
                
              </ul>
            </li>
            
          </ul>
        </div><!-- /.navbar-collapse -->
        </div>
      </nav>  



     <div class="container">
       <div class="row">

         
            
           <div class="col-md-9" style="margin-top:80px;" >
                <div class="row">
                  <?php
                  error_reporting(0);

                    $page = $_GET['page'];

                    if($page){

                      include "pelamar/$page".".php";
                    }else{
                      include "halaman_awal_pelamar.php";
                     
                         
                    }

                  ?>

                </div>
                
                <?php 
                  if($page!="home.php"){



                ?>
               
              

                  
                <?php 
                  }

                ?>
                 
          
              </div>



              <div class="col-md-3" style="margin-top:80px;  background-color:white; ">

                <div class="content-kiri">
                  <nav >
                      <ul>
                        <li><a href="<?php echo "home_pelamar.php?page=teman&id_pelamar_nya=$_SESSION[id_pelamar]"; ?>"><i class="glyphicon glyphicon-user"></i>  Teman</a></li>
                        <li><a href="<?php echo "home_pelamar.php?page=following&id_pelamar_nya=$_SESSION[id_pelamar]"; ?>"><i class="glyphicon glyphicon-eye-close"> </i> Following</a></li>
                        <li><a href="<?php echo "home_pelamar.php?page=follower&id_pelamar_nya=$_SESSION[id_pelamar]"; ?>"><i class="glyphicon glyphicon-globe"> </i> Follower</a></li>
                        <li><a href="<?php echo "home_pelamar.php?page=teman_chat&id_pelamar_nya=$_SESSION[id_pelamar] "; ?>"><i class="glyphicon glyphicon-envelope"> </i> Pesan</a></li>
                        
                      </ul>
                  </nav>
                </div>
                 

                  <div  style="margin-top:20px;  ">
                    <h3>Cari Sesuai</h3> 
                  <form  method="POST" action="home_pelamar.php?page=halaman_cari_sesuai" enctype="multipart/form-data"  >

                     <select class="form-control" name="id_kota" style="width:100%; margin-bottom:5px;">
                      <option value =<?php echo $kosong=0; ?> >Kota</option>
                        <?php 


                          $query = pg_query($connection,"SELECT * FROM kota");
                        
                          

                          while($r=pg_fetch_array($query)){


                          

                        ?>
                        
                        <option value =<?php echo "$r[id_kota]"; ?>><?php echo "$r[nama_kota]" ;?></option>
                       
                        <?php

                        }

                      ?>
                     
                      </select>   
                     <select class="form-control" name="id_kategori" style="width:100%; ">
                          <option value =<?php echo $kosong=0; ?>>Kategori</option>

                        <?php 

                          $query_kat = pg_query($connection,"SELECT * FROM kategori");
                         

                          while($kategori=pg_fetch_array($query_kat)){


                          

                        ?>
                        
                        <option value =<?php echo "$kategori[id_kategori]"; ?>><?php echo "$kategori[nama_kategori]" ;?></option>
                       

                        <?php

                        }

                      ?>
                     
                      </select>

<button class="btn btn-warning" type="submit" name="btn_upload" style=" margin:5px 0px 0px 0px;">Search <i class="glyphicon glyphicon-search"></i></button>   
                        </form>    
                  </div>
                























<hr>


<div style="margin-bottom:20px; margin-top:20px;" >

      <div id="chartContainer" style="height: 300px; width: 100%;"></div>
      <?php

      $qtek=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=1");
      $qpolitik=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=2");
      $qpertahanan=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=3");
      $qpembangunan=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=4");
      $qtrans=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=5");
      $qindustri=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=6");
      $qperkantoran=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=7");
      $qscience=pg_query($connection,"SELECT * FROM lamaran_perusahaan
        INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan WHERE id_kategori=8");

        $qtek_jumlah=pg_num_rows($qtek);
        $qpolitik_jumlah=pg_num_rows($qpolitik);
        $qpertahanan_jumlah=pg_num_rows($qpertahanan);
        $qpembangunan_jumlah=pg_num_rows($qpembangunan);
        $qtrans_jumlah=pg_num_rows($qtrans);
        $qindustri_jumlah=pg_num_rows($qindustri);
        $qperkantoran_jumlah=pg_num_rows($qperkantoran);
        $qscience_jumlah=pg_num_rows($qscience);


      ?>
                 <script>
                      window.onload = function () {

                      var options = {
                        title: {
                          text: "Kategori Lowongan Favorit"
                        },
                       
                        animationEnabled: true,
                        data: [{
                          type: "pie",
                          startAngle: 40,
                          toolTipContent: "<b>{label}</b>:({y})",
                          showInLegend: "true",
                          legendText: "{label}",
                          indexLabelFontSize: 8,
                         
                          dataPoints: [
                            { y: <?php echo "$qtek_jumlah"  ?>, label:"Teknologi"},
                             { y:<?php echo "$qpolitik_jumlah"  ?>, label:"Politik"},
                              { y: <?php echo "$qpertahanan_jumlah"  ?>, label:"Pertahanan"},
                               { y: <?php echo "$qpembangunan_jumlah"  ?>, label:"Pembangunan"},
                                { y: <?php echo "$qtrans_jumlah"  ?>, label:"Transportasi"},
                                 { y: <?php echo "$qindustri_jumlah"  ?>, label:"Industri"},
                                  { y: <?php echo "$qperkantoran_jumlah"  ?>, label:"Perkantoran"},
                                   { y: <?php echo "$qscience_jumlah"  ?>, label:"Science"}
                          
                          ]
                        }]
                      };
                      $("#chartContainer").CanvasJSChart(options);

                    }
                                      
                </script>


                  </div>

                 



















































































                  <div style="margin-top:20px;" > <!--cover-->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    
                      <?php
                $query12= pg_query($connection,"SELECT * FROM  gambar_lowongan");
                $counter=1;
                while ($gambarnya_lowongan = pg_fetch_array($query12)){

                
                   ?>

                    <div class="item <?php if($counter<=1){echo  "active";} ?>">
                    
                     <img src=<?php echo "img/perusahaan/foto_lowongan/$gambarnya_lowongan[foto_gambar]"; ?> alt="..." style=" width:100%; height:150px;">
                      <div class="carousel-caption">
                        copyright© 2017 Powered by AyoKerja.com
                      </div>
                      
                    </div>

                     <?php 

                     $counter++;
                    }

                    ?>

                   
                   
                    
                  </div>

                  <!-- Controls -->
                 
                </div>
              

            </div>






























































































                  <div  style=" margin-bottom:170px; ">
                    <h3>Lowongan Terbaru</h3> 
                     <?php 
                     $angka=0;
                     $query_lowongan=pg_query($connection,"SELECT * FROM lowongan ORDER BY id_lowongan DESC LIMIT 8");
                     while($lowongan=pg_fetch_array($query_lowongan)){

                       $today =date('Y-m-d');
                      $tanggal_tutup =strtotime($lowongan['tanggal_tutup']);
                      $tgl_hari_ini = strtotime($today);

                      if ($tgl_hari_ini<$tanggal_tutup ){

                    
                     ?>


                      <nav class="">
                          <ul>
                            
                              <li > <a href=<?php echo "home_pelamar.php?page=halaman_lowongan&id=$lowongan[id_lowongan]&id_kategori=$lowongan[id_kategori]&id_perusahaan=$lowongan[id_perusahaan]&id_kita=$_SESSION[id_pelamar]"; ?>>
                               <img src=<?php echo "img/perusahaan/thumbnails/$lowongan[gambar_lowongan]" ?> alt="" style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a> </li>
                           
                           
                              
                          </ul>
                      </nav>
                    
                    
                    <?php 
                      $angka=$angka+1;  
                    }

                    }
                    ?>   
    
                  </div>
                    <?php

                                     if($angka>=8){

                                    ?>
                                               <a href="<?php echo "home_pelamar.php?id=$_SESSION[id_pelamar]"; ?>"> <small>ReadMore....</small></a>
                                                             <?php

                                                           }

                                                             ?>













































                   <div style="margin-bottom:170px;"  >
                    <h3>Lowongan Kosong</h3> 
                     <?php 
                     $angka=0;
                     $query=pg_query($connection,"SELECT * FROM lowongan ORDER BY id_lowongan desc " );
                    while($r_lowongan = pg_fetch_array($query)){
                      $query3 = pg_query($connection,"SELECT * FROM lamaran_perusahaan 
                               where id_lowongan = $r_lowongan[id_lowongan] LIMIT 8");

                               $hasilnya = pg_num_rows($query3);

                               if($r_lowongan['max_lamaran'] <= $hasilnya){
                                   $today =date('Y-m-d');
                                    $tanggal_tutup =strtotime($r_lowongan['tanggal_tutup']);
                                    $tgl_hari_ini = strtotime($today);

                                    if ($tgl_hari_ini<$tanggal_tutup ){



                     ?>
                     <?php

                      }

                      }else{

                     ?>

                     
                     <ul>
                          <li > <a href=<?php echo "home_pelamar.php?page=halaman_lowongan&id=$r_lowongan[id_lowongan]&id_kategori=$r_lowongan[id_kategori]&id_perusahaan=$r_lowongan[id_perusahaan]&id_kita=$_SESSION[id_pelamar]"; ?>>
                               <img src=<?php echo "img/perusahaan/thumbnails/$r_lowongan[gambar_lowongan]" ?> alt="" style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a> </li>
                           
                     </ul>
                     




                     <?php
                        $angka=$angka+1;

                       }
                      }

                     
      
                     ?>

                    
                  
                  </div>
                  <?php

                   if($angka>=8){

                  ?>
                                           <a href="<?php echo "home_pelamar.php?page=lowongan_kosong&id=$_SESSION[id_pelamar]"; ?>"><small>ReadMore....</small></a>
                                           <?php

                                         }

                                           ?>
                   

























































































 <div style="margin-bottom:170px;"  >
                    <h3>Lowongan Sekitarmu</h3> 

                    <?php

                    $query_sekitar_kita=pg_query($connection,"SELECT * FROM pelamar WHERE id_pelamar='$_SESSION[id_pelamar]'");
                    $kota_sekitar =pg_fetch_array($query_sekitar_kita);

                    $query_sekitar=pg_query($connection,"SELECT * FROM lowongan 
                      INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan 
                      WHERE id_kota =$kota_sekitar[id_kota] ORDER BY id_lowongan DESC LIMIT 8  ");
                    $angka=0;
                    while($lowongan_sekitar=pg_fetch_array($query_sekitar)){

                       $today =date('Y-m-d');
                                    $tanggal_tutup =strtotime($lowongan_sekitar['tanggal_tutup']);
                                    $tgl_hari_ini = strtotime($today);

                                    if ($tgl_hari_ini<$tanggal_tutup ){



                    ?>


                     <ul>
                          <li > <a href=<?php echo "home_pelamar.php?page=halaman_lowongan&id=$lowongan_sekitar[id_lowongan]&id_kategori=$lowongan_sekitar[id_kategori]&id_perusahaan=$lowongan_sekitar[id_perusahaan]&id_kita=$_SESSION[id_pelamar]"; ?>>
                               <img src=<?php echo "img/perusahaan/thumbnails/$lowongan_sekitar[gambar_lowongan]" ?> alt="" style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a> </li>
                           
                     </ul>
                     





                    <?php
                    $angka=$angka+1;
                     
                      }
                    }

                    ?>

                    </div>
                    <?php

                   if($angka>=8){

                  ?>
                                           <a href="<?php echo "home_pelamar.php?page=halaman_kota&id_kota=$kota_sekitar[id_kota]"; ?>"><small>ReadMore....</small></a>
                                           <?php

                                         }

                                           ?>
                   



















                  <div style="margin-top:20px;" > <!--cover-->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    
                      <?php
                $query3= pg_query($connection,"SELECT * FROM  gambar_perusahaan");
                $counter=1;
                while ($gambarnya = pg_fetch_array($query3)){

                
                   ?>

                    <div class="item <?php if($counter<=1){echo  "active";} ?>">
                    
                     <img src=<?php echo "img/perusahaan/foto_perusahaan/$gambarnya[gambar_perusahaan]"; ?> alt="..." style=" width:100%; height:150px;">
                      <div class="carousel-caption">
                        copyright© 2017 Powered by AyoKerja.com
                      </div>
                      
                    </div>

                     <?php 

                     $counter++;
                    }

                    ?>

                   
                   
                    
                  </div>

                  <!-- Controls -->
                 
                </div>
              

            </div>































                  <div style="margin-bottom:170px;" >
                    <h3>Perusahaan Terfavorit</h3>
                     <?php 
                        $qrating=pg_query($connection,"SELECT id_perusahaan , COUNT( jumlah_likes ) AS total_muncul FROM likes 
                                                        GROUP BY id_perusahaan ORder by total_muncul DESC LIMIT 8");
                        while($qhasil_rating=pg_fetch_array($qrating)){
                        
                        $qdislike=pg_query($connection,"SELECT id_perusahaan , COUNT( jumlah_dislikes ) AS muncul FROM dislikes  
                          where id_perusahaan =$qhasil_rating[id_perusahaan]
                                                        GROUP BY id_perusahaan ORder by muncul");

                        $dislike=pg_fetch_array($qdislike);
                      $query_perusahaan=pg_query($connection,"SELECT * FROM perusahaan WHERE id_perusahaan=$qhasil_rating[id_perusahaan]");
                         $pt=pg_fetch_array($query_perusahaan);

                         if($dislike['muncul']<$qhasil_rating['total_muncul']){
                     ?>

                     <ul>
                          <li > <a href=<?php echo "home_pelamar.php?page=profil_perusahaan&id_perusahaan_nya=$pt[id_perusahaan]"; ?>>
                               <img src=<?php echo "img/perusahaan/perusahaan_thumbnails/$pt[foto_profil_perusahaan]" ?> alt="" style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a> </li>
                           
                     </ul>




                      <?php
                          }
                        }
                      ?>
                      
                  </div>
              




























































                     <div style="margin-bottom:170px;"  >
                    <h3>Permintaan Teman</h3> 
                 
                               <?php

                             
                                $id_pelamar=$_SESSION['id_pelamar'];
                               $query=pg_query($connection,"SELECT * FROM pelamar ORDER by id_pelamar DESC ");
                               while($lamaran=pg_fetch_array($query)){


                                if($id_pelamar==$_SESSION['id_pelamar']){

                               ?>


                                        <?php 
                                        $query_follower = pg_query($connection,"SELECT id_pelamar,id_login  FROM  follower
                                         where id_pelamar=$id_pelamar AND id_login = $lamaran[id_pelamar]");
                                        $teman2=pg_fetch_array($query_follower);
                                        $query_teman = pg_query($connection,"SELECT id_koneksi,id_pelamar,id_login FROM koneksi_teman
                                         where id_pelamar=$id_pelamar AND id_login = $lamaran[id_pelamar] ORDER BY id_koneksi Desc LIMIT 8");

                                        while ($teman=pg_fetch_array($query_teman)) {
                                          if(isset($teman['id_pelamar']) AND isset($teman['id_login']) 
                                            AND !isset($teman2['id_login']) AND !isset($teman2['id_pelamar'])){

                                        

                                      

                                        ?>

                                                          <a href="<?php echo "home_pelamar.php?page=profil_pelamar&page_profil=profil_kita&id_pelamar_nya=$teman[id_login]" ?>"><img src=<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?> alt="" 
                                                            style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a>
                                                          
                                                      
                                                       
                                                     



                                     <?php
                                        }
                                      }
                                     }else{
                                     

                                     ?>
                                      <?php 


                                        $query_teman = pg_query($connection,"SELECT id_follower,id_pelamar,id_login FROM follower
                                         where id_pelamar=$lamaran[id_pelamar] AND id_login =$id_pelamar  ORDER BY id_follower DESC LIMIT 8");
                                        
                                        while ($teman=pg_fetch_array($query_teman)) {
                                          if(isset($teman['id_pelamar']) AND isset($teman['id_login'])){

                                        

                                      

                                        ?>
                                                          <a href="<?php echo "home_pelamar.php?page=profil_pelamar&page_profil=profil_kita&id_pelamar_nya=$teman[id_pelamar]" ?>"><img src=<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?> alt=""
                                                            style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a>
                                                         
                                                     




                                     <?php 
                                        
                                      }

                                       }

                                      }


                                     ?>


                      <?php
                      }
                        
                    
                      ?>

                                    
                
                  </div>



                  <!--batas container-->
                      
            </div>

             

     </div>


</div>

<footer>   

   
     <div style="width:100%; background-color:#f05f40; margin-top:40px;" >
      <div class="container">
       
            
            <div class="col-md-4 col-xs-12" style="color:white;">
                <h3>AyoKerja.com</h3>
              
            </div>


            <div class="col-md-4 col-xs-6 " style="color:white;">
              
               <h3 >About Us</h3>
              <p>
                Jl.Manisi Gang Bakti 2, RT 02 RW 09, Desa Cipadung, Kecamatan Cibiru, Kota Bandung, Kode Pos 40614 Kecamatan Cibiru, Kota Bandung Jawa Barat, 40614 08x6xx5xx81

              </p>
              
            </div>


            <div class="col-md-4 col-xs-6" style="color:white;">
              
              <h3>Contact Us</h3>
              <div>
               <a href="#"><img style=" height:50px;" src="img/icon/fb.png" alt="" ></a>
               <a href="#"><img style=" height:50px;" src="img/icon/gmail.png" alt="" ></a>
               <a href="#"><img style=" height:50px;" src="img/icon/git.png" alt="" ></a>
               <a href="#"><img style=" height:50px;" src="img/icon/ig.png" alt="" ></a>
               <a href="#"><img style=" height:50px;" src="img/icon/yt.png" alt="" ></a>
               <a href="#"><img style=" height:50px;" src="img/icon/feed.png" alt="" ></a>



              </div>
              
              
            </div>
            

        </div>
      </div>

      <div style="width:100%; background-color:black;  margin-bottom:-20px; border-bottom:1px solid black; ">
         <div class="container">
            <div class="co-md-12" style="margin:0 auto;">
                <center style="color:white;"><b>copyright© 2017 Powered by AyoKerja.com</b></center>
            </div>
        </div>

          
      </div>


</footer>


       
     
      
            
    


 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="/js/dashboard.js" type="text/javascript"></script>
     <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery.canvasjs.min.js"></script>


    <script type="text/javascript">
      $(function() {

        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function() {
          var input = $(this),
              numFiles = input.get(0).files ? input.get(0).files.length : 1,
              label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
          input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready( function() {
            $(':file').on('fileselect', function(event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
        });
        
      });

    </script>
   

   
  </body>
</html>


 <script type="text/javascript">
            $(document).ready(function(){
                var counter = 2;
                $("#addButton").click(function () {
                    var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", 'TextBoxDiv' + counter);

                    newTextBoxDiv.after().html('<h4 style="margin-top: 12px;">Syarat Lowongan '+ counter + '<h4> ' +
                        '<input type="text" class="form-control border-input" placeholder="Syarat Lowongan" name="syarat' + counter +
                        '" id="syarat' + counter + '" reuired/>');

                    newTextBoxDiv.appendTo("#TextBoxesGroup");

                    counter++;
                });

                $("#removeButton").click(function () {
                    if(counter == 1){
                        return false;
                    }

                    counter--;

                    $("#TextBoxDiv" + counter).remove();
                });

                $("#getButtonValue").click(function () {
                    var msg = '';
                    var syarat = '';
                    for(i = 1; i < counter; i++){
                        syarat += ($('#syarat' + i).val()) + '---';
                    }
                    document.getElementById("array_syarat").value = syarat;
                });
            });
        </script> 
