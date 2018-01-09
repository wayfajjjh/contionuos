<fieldset>

	<div class = "col-xs-12">

<?php 

$id =$_GET['id_perusahaan_nya']

?>

<div >
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

            <h2 style="color:#f05f40;"><?php echo "$hasilnya[nama_perusahaan]"?></h2>
         
      
		 	











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
                            <a href=<?php echo "home.php?page=halaman_lowongan&id=$r[id_lowongan]&id_kategori=$r[id_kategori]&id_kita=$r[id_perusahaan]"; ?>>
                              <h5> <?php echo "$r[judul_lowongan]"; ?> </h5></a>
                             <div style="height:150px;">
                               <p><?php echo $isi; ?></p>
                             </div>
                            

                            
                              
                              

                               <p class="category">
                                  <p class="category">           
                                  <br/>
                                  
                                     <i class="fa fa-tags icon-info"></i><?php echo " $r[nama_kategori]"?> <br/>   
                                     
                                      <i class="fa fa-calendar icon-info"></i><?php echo " $r[tanggal_tutup]"?> <br/>   

                                     
                                    
                                  </p>
                               </p>


                            </div>
                            


                              
                            
                            
                          </div>


                          	
                       <?php }
                       ?>
                       <br><br><hr>



 
</div>

</fieldset>