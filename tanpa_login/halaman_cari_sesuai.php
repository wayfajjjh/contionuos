<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
$id_kategori = $_POST['id_kategori'];
$id_kota = $_POST['id_kota'];

?>


  <fieldset>

  	<?php

  	if($id_kategori==$_POST['id_kategori'] AND $id_kategori!=0 AND $id_kota==0 ){


  	?>

                  <?php

                  $query=pg_query($connection,"SELECT * FROM lowongan 
                     
                    INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                    INNER JOIN kota ON perusahaan.id_kota = kota.id_kota
                    WHERE id_kategori=$id_kategori ORDER BY id_lowongan desc" );

                    while($r = pg_fetch_array($query)){
                      $news=$r['deskripsi'];
                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
                      $isi =strip_tags($artikel);

                      ?>
                      
                          <div class="col-md-4 col-xs-12 " >
                            <div style="height:480px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <img src=<?php echo "img/perusahaan/thumbnails/$r[gambar_lowongan]" ?> alt="" style="width:100%; height:150px; ">
                            <a href=<?php echo "home.php?page=halaman_lowongan&id=$r[id_lowongan]&id_kategori=$r[id_kategori]&id_perusahaan=$r[id_perusahaan]&id_kita=0"; ?>>
                              <h5> <?php echo "$r[judul_lowongan]"; ?> </h5></a>
                             <div style="height:150px;">
                               <p><?php echo $isi; ?></p>
                             </div>
                            

                            
                              
                              

                               <p class="category">
                                  <p class="category">           
                                  <br/>
                                  
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $r[nama_kota]"?>  &nbsp;&nbsp;<br>
                                     <?php
                                     $query_kategori=pg_query($connection,"SELECT * FROM kategori WHERE id_kategori=$id_kategori");
                                     $kat = pg_fetch_array($query_kategori)
                                     ?>


                                     <i class="fa fa-tags icon-info"></i><?php echo " $kat[nama_kategori]"?> <br/>   
                                      <a href=<?php echo "home.php?page=profil_perusahaan&id_perusahaan_nya=$r[id_perusahaan]"; ?>>  <i class="fa fa-home icon-info"></i><?php echo " $r[nama_perusahaan]"?> <br/>   
                                        </a>
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

























<?php

}else if($id_kota==$_POST['id_kota']  AND $id_kota!=0 AND $id_kategori==0){



?>


 <?php

                  $query=pg_query($connection,"SELECT * FROM lowongan 
                    INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                    INNER JOIN kategori ON lowongan.id_kategori = kategori.id_kategori
                    WHERE id_kota=$id_kota
                     ORDER BY id_lowongan desc" );

                    while($r = pg_fetch_array($query)){
                      $news=$r['deskripsi'];
                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
                      $isi =strip_tags($artikel);

                      ?>
                      
                          <div class="col-md-4 col-xs-12 " >
                            <div style="height:480px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <img src=<?php echo "img/perusahaan/thumbnails/$r[gambar_lowongan]" ?> alt="" style="width:100%; height:150px; ">
                            <a href=<?php echo "home.php?page=halaman_lowongan&id=$r[id_lowongan]&id_kategori=$r[id_kategori]&id_perusahaan=$r[id_perusahaan]&id_kita=0"; ?>>
                              <h5> <?php echo "$r[judul_lowongan]"; ?> </h5></a>
                             <div style="height:150px;">
                               <p><?php echo $isi; ?></p>
                             </div>
                            

                            
                              
                              

                               <p class="category">
                                  <p class="category">           
                                  <br/>
                                   <?php
                                     $query_kota=pg_query($connection,"SELECT * FROM kota WHERE id_kota=$id_kota");
                                     $kota = pg_fetch_array($query_kota)
                                     ?>
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $kota[nama_kota]"?>  &nbsp;&nbsp;<br>
                                    


                                     <i class="fa fa-tags icon-info"></i><?php echo " $r[nama_kategori]"?> <br/>   
                                      <a href=<?php echo "home.php?page=profil_perusahaan&id_perusahaan_nya=$r[id_perusahaan]"; ?>>  <i class="fa fa-home icon-info"></i><?php echo " $r[nama_perusahaan]"?> <br/>   
                                        </a>
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



















































<?php

}else if($id_kategori==$_POST['id_kategori'] AND $id_kota==$_POST['id_kota']){



?>



 <?php

                  $query=pg_query($connection,"SELECT * FROM lowongan 
                    INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                    WHERE id_kategori=$id_kategori AND id_kota=$id_kota ORDER BY id_lowongan desc" );

                    while($r = pg_fetch_array($query)){
                      $news=$r['deskripsi'];
                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
                      $isi =strip_tags($artikel);

                      ?>
                      
                          <div class="col-md-4 col-xs-12 " >
                            <div style="height:480px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <img src=<?php echo "img/perusahaan/thumbnails/$r[gambar_lowongan]" ?> alt="" style="width:100%; height:150px; ">
                            <a href=<?php echo "home.php?page=halaman_lowongan&id=$r[id_lowongan]&id_kategori=$r[id_kategori]&id_perusahaan=$r[id_perusahaan]&id_kita=0"; ?>>
                              <h5> <?php echo "$r[judul_lowongan]"; ?> </h5></a>
                             <div style="height:150px;">
                               <p><?php echo $isi; ?></p>
                             </div>
                            

                            
                              
                              

                               <p class="category">
                                  <p class="category">           
                                  <br/>
                                   <?php
                                     $query_kota=pg_query($connection,"SELECT * FROM kota WHERE id_kota=$id_kota");
                                     $kota = pg_fetch_array($query_kota)
                                     ?>
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $kota[nama_kota]"?>  &nbsp;&nbsp;<br>
                                    

										<?php
										   $query_kategori=pg_query($connection,"SELECT * FROM kategori WHERE id_kategori=$id_kategori");
										    $kat = pg_fetch_array($query_kategori)
										                                     ?>

									
                                     <i class="fa fa-tags icon-info"></i><?php echo " $kat[nama_kategori]"?> <br/>   
                                      <a href=<?php echo "home.php?page=profil_perusahaan&id_perusahaan_nya=$r[id_perusahaan]"; ?>>  <i class="fa fa-home icon-info"></i><?php echo " $r[nama_perusahaan]"?> <br/>   
                                        </a>
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














































<?php
}


?>
                

  </fieldset>
