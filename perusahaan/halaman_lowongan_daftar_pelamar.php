<fieldset>
<div class="col-xs-12">
		
		
					<?php 
								$id = $_GET['id'];

		$id_kita= $_GET['id_kita'];


					$query = pg_query("SELECT * FROM lowongan 
						INNER JOIN kategori ON lowongan.id_kategori = kategori.id_kategori
						INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan where id_lowongan = $id ");
					

					$hasilnya = pg_fetch_array($query);
					$deskripsi = $hasilnya['deskripsi'];

				 ?>

				 <div >
		                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                 

		                  <!-- Wrapper for slides -->
		                  <div class="carousel-inner" role="listbox">
		                  	
		                  		<?php
							   		$query3= pg_query($connection,"SELECT * FROM  gambar_lowongan  where id_lowongan = $id");
							   		$counter=1;
							   		while ($gambarnya = pg_fetch_array($query3)){

							   		
							  			 ?>

		                    <div class="item <?php if($counter<=1){echo  "active";} ?>">
		                    
		                     <img src=<?php echo "img/perusahaan/foto_lowongan/$gambarnya[foto_gambar]"; ?> alt="..." style="width:100%; height:500px;">
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

				 
				 <h1><?php echo $hasilnya['judul_lowongan']; ?></h1>

				 	




				 <h3 style="color:#f05f40;"><b>Deskripsi Lowongan</b></h3><hr>
				 <p><?php echo "$deskripsi";  ?></p>

				 <h3 style="color:#f05f40;"><b>Persyaratan Kerja</b></h3><hr>
				 <?php
				 $query2 = pg_query("SELECT * FROM syarat where id_lowongan = $id  ");

				 $i=1;
				 	while($r = pg_fetch_array($query2) AND $i){


				 ?>
				 	<ul>
				 		    <li><h4 ><?php echo $i.". ".$r['nama_syarat']; ?></h4></li>
				 		</ul>	
				 	 
				 <?php
				 	$i++;
				 	}
				 ?>

				
				 <br><br>
				 <h3 style="color:#f05f40;"><b>Para Pelamar</b></h3><hr>

				 <?php

				 $query=pg_query($connection,"SELECT * FROM lamaran_perusahaan
				 	INNER JOIN pelamar ON lamaran_perusahaan.id_pelamar = pelamar.id_pelamar
				  where id_lowongan=$id ");
				 while($lamaran=pg_fetch_array($query)){


				 ?>

				  <div class="col-md-4 col-xs-12 " >
                            <div style="height:280px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
                              <a href="<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?>"><img src=<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?> alt="" style="width:100%; height:150px; "></a>
                           <center><a href=<?php echo "home_perusahaan.php?page=profil_pelamar&id_pelamar=$lamaran[id_pelamar]&id_lowongan=$id&id_kita=$_SESSION[id_perusahaan]"; ?>>
                              <h5> <?php echo "$lamaran[pelamar_nama_lengkap]"; ?> </h5></a></center> 
                             
                             <?php

                           
                             if(empty($lamaran['status_lamaran'])){

                             ?>

                                                         <div class="alert alert-warning">Menunggu</div>

                            <?php }else{ ?>

                                                        <div class="alert alert-success">Lolos</div>

                         		<?php } ?>

                            </div>
                        </div>



				 <?php

				 	}

				 ?>
		



		
	</div>



</fieldset>