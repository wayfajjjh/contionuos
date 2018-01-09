<fieldset>

	<div class="col-xs-12">
		<center><h2>Verified</h2></center><hr>

		<?php 

			$query = pg_query("SELECT * FROM lowongan 
				INNER JOIN kategori ON lowongan.id_kategori = kategori.id_kategori
				INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan where id_lowongan = $_GET[id_lowongan] ");
			

			$hasilnya = pg_fetch_array($query);
			$deskripsi = $hasilnya['deskripsi'];

		 ?>

		 <div >
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                  	
                  		<?php
					   		$query3= pg_query($connection,"SELECT * FROM  gambar_lowongan  where id_lowongan = $_GET[id_lowongan]");
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
		 $query2 = pg_query("SELECT * FROM syarat where id_lowongan = $_GET[id_lowongan]  ");

		 $i=1;
		 	while($r = pg_fetch_array($query2) AND $i){


		 ?>
		 	<ul>
		 		    <li><h4 ><?php echo $i.". ".$r['nama_syarat']; ?></h4></li>
		 		</ul>	
		 	 
		 <?php
		 	$i++;
		 	}
		 ?><br><br><hr>

		


		
	</div>


</fieldset>












  
