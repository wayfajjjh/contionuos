<!DOCTYPE html>
<?php
require_once 'koneksi/koneksi.php';

date_default_timezone_set('asia/jakarta');
session_start();
if (!isset($_SESSION['nama_perusahaan'])){
  echo " Anda Blum Masuk ! ";
}
if(!isset($_SESSION['nama_perusahaan'])){
  header('location:login.php');
}
$login_role = $_SESSION['role_login'];
 $nama_perusahaan = $_SESSION['nama_perusahaan'] ;
$id = $_SESSION['id_perusahaan'];
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
           <?php

           $query_confirm=pg_query($connection,"SELECT * FROM perusahaan WHERE id_perusahaan=$_SESSION[id_perusahaan]");
           $status_perusahaan=pg_fetch_array($query_confirm);

           if(empty($status_perusahaan['status_perusahaan'])){


           ?>

                       <li ><a href=<?php echo "home_perusahaan.php?id=$id"; ?>>Home</a></li>
                       <li ><a href=<?php echo "home_perusahaan.php?id=$id"; ?>>Kebijakan</a></li>
                        <li ><a href="<?php echo "home_perusahaan.php?page=daftar_pelamar&id=$id" ?>">Daftar Pelamar</a></li>
                      <li ><a href="#"; >Akun Ini Belum Dikonfirmasi !</a></li>



           <?php

           }else if($status_perusahaan['status_perusahaan']=='sudah_dikonfirmasi'){

           ?>
            <li ><a href=<?php echo "home_perusahaan.php?id=$id"; ?>>Home</a></li>
            <li ><a href=<?php 

            $query=pg_query($connection,"SELECT*FROM perusahaan where id_perusahaan='$_SESSION[id_perusahaan]'");
            $r = pg_fetch_array($query);
            if (empty($r['alamat_perusahaan']) && empty($r['deskripsi_perusahaan']) && empty($r['id_kota'])) {
              # code...
               echo "home_perusahaan.php?page=kebijakan&id=$id";
            }

            else{
              echo "home_perusahaan.php?page=tambah_lowongan&id=$id";  
            }
            ?>>Tambah Lowongan</a></li>
            <li ><a href="<?php echo "home_perusahaan.php?page=daftar_pelamar&id=$id" ?>">Daftar Pelamar</a></li>
            <li ><a href=<?php echo "home_perusahaan.php?page=lihat_lowongan_kita&id=$id" ?>>Lihat Lowongan</a></li>



           <?php

          }

           ?>
          
          </ul>
          <div class="col-sm-3 col-md-3">
             <form method="POST" action="home_perusahaan.php?page=cari" enctype="multipart/form-data" class="navbar-form" role="search">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="kunci">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
              </form>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"> <a href="#" class="dropdown-toggle"  data-toggle="dropdown">hi, <?php echo "$nama_perusahaan" ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href=<?php  echo "home_perusahaan.php?page=profil_perusahaan&id_perusahaan_nya=$_SESSION[id_perusahaan]"; ?> style="color:black;">My Profile</a></li>
    <li><a href=<?php  echo "home_perusahaan.php?page=edit_gambar&id_perusahaan_nya=$_SESSION[id_perusahaan]"; ?> style="color:black;">Gambar Perusahaan</a></li>
                <li><a href=<?php  echo "home_perusahaan.php?page=berkas_perusahaan&id_perusahaan_nya=$_SESSION[id_perusahaan]"; ?> style="color:black;">Berkas Perusahaan</a></li>

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

                      include "perusahaan/$page".".php";
                    }else{
                      include "halaman_awal.php";
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

                <div> <!--Foto Profil-->
                 


                  <?php
                    $query_foto_profil=pg_query($connection,"SELECT * FROM perusahaan WHERE id_perusahaan=$_SESSION[id_perusahaan]");
                    $foto_profil =pg_fetch_array($query_foto_profil);

                  ?>

                  <center><a href="#" data-toggle="modal" data-target="#myModal">
                    <img src="<?php echo "img/perusahaan/perusahaan_thumbnails/$foto_profil[foto_profil_perusahaan]" ?>" style="width:100%; margin:20px 0px 20px 0px; height:250px;" alt="">
                  </a></center>

                </div>




























     <div style="margin-bottom:20px;" >

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

                 













































































































                  <div > <!--cover-->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    
                      <?php
                $query3= pg_query($connection,"SELECT * FROM  gambar_perusahaan  ");
                $counter=1;
                while ($gambarnya = pg_fetch_array($query3)){

                
                   ?>

                    <div class="item <?php if($counter<=1){echo  "active";} ?>">
                    
                     <img src=<?php echo "img/perusahaan/foto_perusahaan/$gambarnya[gambar_perusahaan]"; ?> alt="..." style="width:100%; height:150px;">
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
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              

            </div>










































                   <div style="margin-bottom:170px;" >
                     <h3>Pelamar Lolos</h3>

                  <?php

                  

                  $query_pelamar_lolos=pg_query($connection,"SELECT * FROM lamaran_perusahaan 
                    INNER JOIN pelamar ON lamaran_perusahaan.id_pelamar = pelamar.id_pelamar
                    INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan = lowongan.id_lowongan 
                    
                    WHERE status_lamaran='Lolos'  AND id_perusahaan=$_SESSION[id_perusahaan]  ORDER BY id_lamaran_perusahaan
                    LIMIT 16

                    ");

                  while($pelamar_status=pg_fetch_array($query_pelamar_lolos)){


                  ?>


                     <ul>
                          <li > <a href=<?php echo "home_perusahaan.php?page=profil_pelamar&id_pelamar=$pelamar_status[id_pelamar]&id_lowongan=$pelamar_status[id_lowongan]&id_kita=$_SESSION[id_perusahaan]"; ?>>
                               <img src=<?php echo "img/pelamar/foto_profil/$pelamar_status[foto_profil]" ?> alt="" style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a> </li>
                           
                     </ul>
                     


                  <?php
                    }

                  ?>

                  

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
                          <li > <a href=<?php echo "home_perusahaan.php?page=profil_perusahaan&id_perusahaan_nya=$pt[id_perusahaan]"; ?>>
                               <img src=<?php echo "img/perusahaan/perusahaan_thumbnails/$pt[foto_profil_perusahaan]" ?> alt="" style="width:50px; height:50px; float:left; margin-bottom:15px; margin-right:15px;"></a> </li>
                           
                     </ul>




                      <?php
                          }
                        }
                      ?>
                      
                  </div>














































                 

                 
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
              <p> Jl.Manisi Gang Bakti 2, RT 02 RW 09, Desa Cipadung, Kecamatan Cibiru, Kota Bandung, Kode Pos 40614 Kecamatan Cibiru, Kota Bandung Jawa Barat, 40614 08x6xx5xx81 </p>
              
              
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






        <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Ganti Foto</h4>
                            </div>
                            <div class="modal-body">
                              <form  method="POST" action="perusahaan/php/proses_edit_foto_profil.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;" >

                                <div class="input-group" style="margin: 10px 0px 10px 0px;">
                          <label class="input-group-btn">
                              <span class="btn btn-primary">
                                  Browse&hellip; <input type="file" name="gambar" style="display: none;"  >
                              </span>
                          </label>
                          <input type="text" class="form-control" readonly required="required">
                   </div>
                   <input type="hidden" name="id_perusahaan" value="<?php echo "$_SESSION[id_perusahaan]" ?>">


                   <img src="<?php echo "img/perusahaan/perusahaan_thumbnails/$foto_profil[foto_profil_perusahaan]"  ?>" style="width:200px; height:200px;" alt="">

                        <div class="form-group">
                          <div class="col-xs-12">
                            <button class="btn btn-success"  name="btn_upload" type="submit" style="float:right; margin:0px 3px 0px 3px;">Ganti Foto <i class="glyphicon glyphicon-camera"></i></button>
                          </div>
                        </div>
                      </form>
                            </div>
                           
                          </div>
                        </div>
                      </div>



       