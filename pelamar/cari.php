<?php
ini_set('session.cache_limiter','public');
session_cache_limiter(false);

$key=$_POST['kunci'];

$query_cari=pg_query($connection,"SELECT * FROM lowongan 
	INNER JOIN kategori ON lowongan.id_kategori=kategori.id_kategori
	INNER JOIN perusahaan ON lowongan.id_perusahaan=perusahaan.id_perusahaan 
	INNER JOIN kota ON perusahaan.id_kota=kota.id_kota
	WHERE judul_lowongan  like '$key' OR nama_perusahaan like '$key' ");


while($r=pg_fetch_array($query_cari)){
  						$news=$r['deskripsi'];
                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
                      $isi =strip_tags($artikel);

                      $today =date('Y-m-d');
                      $tanggal_tutup =strtotime($r['tanggal_tutup']);
                      $tgl_hari_ini = strtotime($today);

                      if ($tgl_hari_ini<$tanggal_tutup ){


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
                                      <a href=<?php echo "home_perusahaan.php?page=profil_perusahaan&id_perusahaan_nya=$r[id_perusahaan]"; ?>>  <i class="fa fa-home icon-info"></i><?php echo " $r[nama_perusahaan]"?> <br/>   
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
                          <?php }else if($tgl_hari_ini>=$tanggal_tutup ){



                          $query = pg_query($connection,"DELETE FROM gambar_lowongan where id_lowongan = '$r[id_lowongan]'");
                          $query2  = pg_query($connection,"DELETE FROM syarat where id_lowongan = '$r[id_lowongan]'");
                          $query4 = pg_query($connection,"DELETE FROM lamaran where id_lowongan= '$r[id_lowongan]'");
                          $query5 = pg_query($connection,"DELETE FROM lamaran_perusahaan where id_lowongan= '$r[id_lowongan]'");

                          $query3 = pg_query($connection,"DELETE FROM lowongan where id_lowongan=$r[id_lowongan]");
                          

                        }
                         ?>







               











































<?php


}
