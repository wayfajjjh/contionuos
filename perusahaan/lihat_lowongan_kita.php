  <fieldset>
                  <?php
                  $id = $_GET['id'];
                  $query=pg_query($connection,"SELECT * FROM lowongan 
                    INNER JOIN kategori ON lowongan.id_kategori = kategori.id_kategori 
                   	where id_perusahaan = '$id'
                    ORDER BY id_lowongan desc" );

                    while($r = pg_fetch_array($query)){
                      $news=$r['deskripsi'];
                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
                      $isi =strip_tags($artikel);

                      ?>
                      
                         <div class="col-md-4 col-xs-12 " >
                            <div style="height:480px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <img src=<?php echo "img/perusahaan/thumbnails/$r[gambar_lowongan]" ?> alt="" style="width:100%; height:150px; ">
                            <a href=<?php echo "home_perusahaan.php?page=halaman_lowongan&id=$r[id_lowongan]&id_kategori=$r[id_kategori]&id_kita=$r[id_perusahaan]"; ?>>
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
                                      WHERE id_perusahaan=$_SESSION[id_perusahaan]");
                                     $kota = pg_fetch_array($query_kota)
                                     ?>
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $kota[nama_kota]"?>  &nbsp;&nbsp;<br>
                                    
                                     <i class="fa fa-tags icon-info"></i><?php echo " $r[nama_kategori]"?> <br/>   
                                   <i class="fa fa-home icon-info"></i><?php echo " $kota[nama_perusahaan]"?> <br/>   

                                     
                                      <i class="fa fa-calendar icon-info"></i><?php echo " $r[tanggal_tutup]"?> <br/>   

                                     <?php
                                      $query3 = pg_query($connection,"SELECT * FROM lamaran_perusahaan 
                               where id_lowongan = $r[id_lowongan]");
                               $hasilnya = pg_num_rows($query3);

                               ?>
                               <small><?php echo "$hasilnya/$r[max_lamaran] Pelamar"  ?></small>
                                  
                                     
                                    
                                  </p>
                               </p>


                                     
                                    
                                  </p>
                               </p>


                            </div>
                            


                              
                            
                            
                          </div>


                       <?php }
                       ?>


                

  </fieldset>
