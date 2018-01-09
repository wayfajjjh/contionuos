
<fieldset>
  <div class="col-md-12">
    
<div>
  <?php

    $id = $_GET['id'];


  ?>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    
                      <?php
                $query3= pg_query($connection,"SELECT * FROM  gambar_perusahaan  where id_perusahaan = '$id'");
                $counter=1;

                while ($gambarnya = pg_fetch_array($query3)){

                
                   ?>

                    <div class="item <?php if($counter<=1){echo  "active";} ?>">
                    
                     <img src=<?php echo "img/perusahaan/foto_perusahaan/$gambarnya[gambar_perusahaan]"; ?> alt="..." style="width:100%; height:500px;">
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
            <?php
              $query = pg_query("SELECT * FROM perusahaan 
                INNER JOIN kota ON perusahaan.id_kota = kota.id_kota
         Where id_perusahaan = $id");
      

      $hasilnya = pg_fetch_array($query);

            ?>

           <h1><?php echo $hasilnya['nama_perusahaan']; ?></h1>
           <h3 style="color:#f05f40;"><b>About Us</b></h3><hr>
        <p><?php echo $hasilnya['deskripsi_perusahaan'];  ?></p>

        <h3 style="color:#f05f40;"><b>Kota</b></h3>
     <p><?php echo $hasilnya['nama_kota'];  ?></p>

           <h3 style="color:#f05f40;"><b>Alamat</b></h3>
     <p><?php echo $hasilnya['alamat_perusahaan'];  ?></p>

           <h3 style="color:#f05f40;"><b>Email</b></h3>
     <p><?php echo $hasilnya['email_perusahaan'];  ?></p>

           <h3 style="color:#f05f40;"><b>Telp/Fax</b></h3>
            <p><?php echo $hasilnya['telp_perusahaan'];  ?></p>


                  <?php

                    $query=pg_query($connection,"SELECT * FROM perusahaan WHERE id_perusahaan=$_GET[id] AND status_perusahaan='sudah_dikonfirmasi'" );

                   $v=pg_fetch_array($query);
                   if(empty($v['status_perusahaan'])){
                     

                   ?>

            <a onclick="return confirm('Ingin meng-konfirmasi perusahaan ini?');" href="<?php echo "admin/php/proses_konfirmasi_akun.php?id_perusahaan=$_GET[id]" ?>"><button class="btn btn-success" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Konfirmasi <i class="glyphicon glyphicon-ok-sign"></i></button></a>  
            <a onclick="return confirm('Ingin meng-hapus perusahaan ini?');" href="<?php echo "admin/php/proses_hapus_akun.php?id_perusahaan=$_GET[id]" ?>"><button class="btn btn-danger" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Hapus Akun <i class="glyphicon glyphicon-trash"></i></button></a>  

              <?php
                } else if($v['status_perusahaan']=='sudah_dikonfirmasi'){

              ?>
        <a onclick="return confirm('Ingin mencabut akses akun ini?');" href="<?php echo "admin/php/proses_cabut_akses_akun.php?id_perusahaan=$_GET[id]" ?>" ><button class="btn btn-danger" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Cabut Akses <i class="glyphicon glyphicon-ban-circle"></i></button></a>


              <?php

                }

              ?>






<div class="row">
  <br>
  
<div class="col-xs-12">
      <h3 style="color:#f05f40;"><b>Berkas-Berkas</b></h3>
      <hr>
      <?php

    $query=pg_query($connection,"SELECT * FROM berkas_perusahaan where id_perusahaan=$_GET[id]");

    while($berkas=pg_fetch_array($query)){



    ?>


    
  <div class="col-md-4 col-xs-12">
    <a href="<?php echo "img/perusahaan/berkas/$berkas[nama_berkas]" ?>"><embed  style="width:100%; height:150px; margin-bottom:15px;" src="<?php echo "img/perusahaan/berkas/$berkas[nama_berkas]" ?>" type="application/pdf"></embed></a>
       <a href="<?php echo "admin/php/proses_hapus_berkas.php?id_berkas=$berkas[id_berkas_perusahaan]&id_perusahaan_nya=$_GET[id]" ?>"><input type='button' class="btn-link" value='Delete'  style="margin-bottom:10px; float:right;"></a>

    </div>
    <?php

      }

    ?>
  


  </div>
  


</div>
















<div class="row">
  <br>
  
<div class="col-xs-12">
      <h3 style="color:#f05f40;"><b>Foto-Foto Perusahaan</b></h3>
      <hr>
      <?php

    $query=pg_query($connection,"SELECT * FROM gambar_perusahaan where id_perusahaan=$_GET[id]");

    while($berkas=pg_fetch_array($query)){



    ?>


    
  <div class="col-md-4 col-xs-12">
    <a href="<?php echo "img/perusahaan/foto_perusahaan/$berkas[gambar_perusahaan]" ?>"><embed  style="width:100%; height:150px; margin-bottom:15px;" src="<?php echo "img/perusahaan/foto_perusahaan/$berkas[gambar_perusahaan]" ?>" type="application/pdf"></embed></a>
       <a href="<?php echo "admin/php/proses_hapus_foto_perusahaan.php?id_berkas=$berkas[id_gambar_perusahaan]&id_perusahaan_nya=$_GET[id]" ?>"><input type='button' class="btn-link" value='Delete'  style="margin-bottom:10px; float:right;"></a>

    </div>
    <?php

      }

    ?>
  


  </div>
  


</div>






































           <h3 style="color:#f05f40;"><b>Lowongan</b></h3><hr>

            <?php

                  $query=pg_query($connection,"SELECT * FROM lowongan 
                    INNER JOIN kategori ON lowongan.id_kategori = kategori.id_kategori 


                    where id_perusahaan = '$id' ORDER BY id_lowongan desc" );

                    while($r = pg_fetch_array($query)){
                      $news=$r['deskripsi'];
                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
                      $isi =strip_tags($artikel);

                      ?>
                      
                            <div class="col-md-4 col-xs-12 " >
                            <div style="height:480px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <img src=<?php echo "img/perusahaan/thumbnails/$r[gambar_lowongan]" ?> alt="" style="width:100%; height:150px; ">
                            <a href=<?php echo "home_admin.php?page=halaman_lowongan_admin&id=$r[id_lowongan]&id_kategori=$r[id_kategori]&id_kita=$r[id_perusahaan]"; ?>>
                              <h5> <?php echo "$r[judul_lowongan]"; ?> </h5></a>
                             <div style="height:150px;">
                               <p><?php echo $isi; ?></p>
                             </div>
                            

                            
                              
                              

                               <p class="category">
                                  <p class="category">           
                                  <br/>
                                  <?php
                                     $query_kota=pg_query($connection,"SELECT * FROM perusahaan 
                                      INNER JOIN kota ON perusahaan.id_kota = kota.id_kota 
                                      WHERE id_perusahaan=$_GET[id]");
                                     $kota = pg_fetch_array($query_kota)
                                     ?>
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $kota[nama_kota]"?>  &nbsp;&nbsp;<br>
                                    
                                   <i class="fa fa-home icon-info"></i><?php echo " $kota[nama_perusahaan]"?> <br/>   

                                     
                                  
                                     <i class="fa fa-tags icon-info"></i><?php echo " $r[nama_kategori]"?> <br/>   
                                     
                                      <i class="fa fa-calendar icon-info"></i><?php echo " $r[tanggal_tutup]"?> <br/>   

                                          <?php
                               $query3 = pg_query($connection,"SELECT * FROM lamaran_perusahaan 
                               where id_lowongan = $r[id_lowongan]");
                               $hasilnya = pg_num_rows($query3);

                               ?>
                               <small><?php echo "$hasilnya/$r[max_lamaran] Pelamar"  ?></small>
                                    
                                     
                                    
                                  </p>
                               </p>


                            </div>
                            


                              
                            
                            
                          </div>


                       <?php }
                       ?>
                   
                      

                     
  </div>

</fieldset>