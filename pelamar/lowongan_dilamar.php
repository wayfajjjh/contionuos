  <fieldset>
                  <?php

                  $query=pg_query($connection,"SELECT * FROM lamaran 

                  	INNER JOIN lowongan ON lamaran.id_lowongan = lowongan.id_lowongan
                  	INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                  	INNER JOIN kategori ON kategori.id_kategori = lowongan.id_kategori
                  	INNER JOIN kota ON perusahaan.id_kota = kota.id_kota

                  	Where id_pelamar = $_SESSION[id_pelamar]
                    ORDER BY id_lamaran desc" );

                    while($r = pg_fetch_array($query)){
                      $news=$r['deskripsi'];
                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
                      $isi =strip_tags($artikel);

                      ?>
                      
                          <div class="col-md-4 col-xs-12 " >
                            <div style="height:480px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <img src=<?php echo "img/perusahaan/thumbnails/$r[gambar_lowongan]" ?> alt="" style="width:100%; height:150px; ">
                            <a href=<?php echo "home_pelamar.php?page=halaman_lowongan&id=$r[id_lowongan]&id_kategori=$r[id_kategori]&id_perusahaan=$r[id_perusahaan]&id_kita=$_SESSION[id_pelamar]"; ?>>
                              <h5> <?php echo "$r[judul_lowongan]"; ?> </h5></a>
                             <div style="height:150px;">
                               <p><?php echo $isi; ?></p>
                             </div>
                            

                            
                              
                              

                               <p class="category">
                                  <p class="category">           
                                  <br/>
                                  
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $r[nama_kota]"?>  &nbsp;&nbsp;<br>
                                     <i class="fa fa-tags icon-info"></i><?php echo " $r[nama_kategori]"?> <br/>   
                                      <a href=<?php echo "home_pelamar.php?page=profil_perusahaan&id_perusahaan_nya=$r[id_perusahaan]"; ?>>  <i class="fa fa-home icon-info"></i><?php echo " $r[nama_perusahaan]"?> <br/>   
                                        </a>
                                      <i class="fa fa-calendar icon-info"></i><?php echo " $r[tanggal_tutup]"?> <br/>   
          <?php
                               $query3 = pg_query($connection,"SELECT * FROM lamaran_perusahaan 
                               where id_lowongan = $r[id_lowongan]");
                               $hasilnya = pg_num_rows($query3);

                               ?>
                               <small><?php echo "$hasilnya/$r[max_lamaran] Pelamar"  ?></small>
                               <?php

                               if(!empty($r['hasil_lamaran']))

                                  {


                               ?>
                                  <i class="fa fa-envelope" aria-hidden="true"></i>


                               <?php
                                }

                               ?>


                               <a style="float:right;" href="<?php echo "pelamar/php/proses_batal.php?id_lowongan=$r[id_lowongan]&id_kita=$_SESSION[id_pelamar]" ?>"><small>delete/batal</small></a>
                                  
                                     
                                    
                                  </p>
                               </p>
                                     
                                    
                                  </p>
                               </p>


                            </div>
                            


                              
                            
                            
                          </div>

                       <?php }
                       ?>

                

  </fieldset>
