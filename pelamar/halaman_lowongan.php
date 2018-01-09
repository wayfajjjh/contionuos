
	<fieldset>
		
		<?php
		
		$id = $_GET['id'];
		$id_kategori = $_GET['id_kategori'];
		$id_kita= $_GET['id_kita'];
		$id_perusahaan =$_GET['id_perusahaan'];

		
		?>

	<div class="col-xs-12">
		

		<?php 

		$query2=pg_query($connection,"SELECT * FROM lamaran WHERE id_lowongan=$_GET[id] AND id_pelamar=$_SESSION[id_pelamar]");
			$hasil = pg_fetch_array($query2);

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

<?php
		  $query_lowongan=pg_query($connection,"SELECT * FROM lowongan 
                    INNER JOIN kategori ON lowongan.id_kategori = kategori.id_kategori 
                    INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                    INNER JOIN kota ON perusahaan.id_kota = kota.id_kota

                    Where id_lowongan = $_GET[id]" );

		 			 $x=pg_fetch_array($query_lowongan);
                    ?>
  
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $x[nama_kota]"?>  &nbsp;&nbsp;<br>
                                     <i class="fa fa-tags icon-info"></i><?php echo " $x[nama_kategori]"?> <br/>   
                                      <a href=<?php echo "home_pelamar.php?page=profil_perusahaan&id_perusahaan_nya=$x[id_perusahaan]"; ?>>  <i class="fa fa-home icon-info"></i><?php echo " $x[nama_perusahaan]"?> <br/>   
                                        </a>
                                      <i class="fa fa-calendar icon-info"></i><?php echo " $x[tanggal_tutup]"?> <br/>   
		 	




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


		 ?><hr>


		 <?php 

		 $query=pg_query($connection,"SELECT * FROM pelamar WHERE id_pelamar= '$id_kita'");
		 $query2=pg_query($connection,"SELECT * FROM cv WHERE id_pelamar='$id_kita'");
		$pelamar = pg_fetch_array($query);
		$cv=pg_fetch_array($query2);

		if(empty($pelamar['pelamar_alamat'])  AND empty($pelamar['jenis_kelamin']) AND empty($pelamar['tempat_lahir']) 
		 AND empty($pelamar['tanggal_lahir']) AND empty($pelamar['status']) 
		 AND empty($pelamar['telepon']) AND empty($pelamar['foto_profil']) OR !isset($cv['nama_cv'])){



		 ?>
		 

		<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Lengkapi Biodata Dan Berkas Anda Untuk Melamar Di Perusahaan Ini
		</div>		 

		<?php

			

			}else if(isset($hasil['id_lowongan']) AND isset($hasil['id_pelamar'])){





?>


<?php

		if(empty($hasil['hasil_lamaran']))
		{
		?>
		<div class="alert alert-info fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Anda Sudah Melamar Di Perusahaan Ini
				</div>

				<div class="alert alert-warning fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					waiting....
				</div>

				<?php

			}else if($hasil['hasil_lamaran']=='Lolos'){



				?>

				<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Selamat Anda Lolos !
				</div>


				<?php

			}else{

				?>

				<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Mohon Maaf Anda Gagal
				</div>

				<?php } 

				?>


<?php
			}else {



		?>

		<?php


	$q =pg_query($connection,"SELECT * FROM lamaran_perusahaan where id_lowongan=$_GET[id]");
	$q2 =pg_query($connection,"SELECT * FROM lamaran_perusahaan where id_lowongan=$_GET[id] AND id_pelamar=$_SESSION[id_pelamar]");
	$keterima = pg_fetch_array($q2);
	$banyaknya = pg_num_rows($q);
	
	$query_pembatas=pg_query($connection,"SELECT * FROM lamaran_perusahaan 
			INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan = lowongan.id_lowongan
			
			WHERE id_pelamar=$_SESSION[id_pelamar] AND id_perusahaan=$_GET[id_perusahaan]
			");

			$jumlah_daftar=pg_num_rows($query_pembatas);

	if($banyaknya==$hasilnya['max_lamaran'] AND $keterima['id_pelamar']!=$_SESSION['id_pelamar'] ){




	?>
	<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Lowongan Sudah Penuh
				</div>



		<?php

		}else if($keterima['status_lamaran']=='Lolos' AND $keterima['id_pelamar']==$_SESSION['id_pelamar'] ){



		?>



		<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Selamat Anda Lolos !
				</div>



		<?php

		

	}else if($jumlah_daftar >=2){



?>


<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Maaf Anda Telah Daftar Sebanyak 2 Kali Di Perusahaan Yang Sama ! 
				</div>
























































<?php

	}else{

		?>

		<a onclick="return confirm('Ingin Melamar Di Lowongan ini Dengan Berkas Yang Tersedia?');" href=<?php 

				echo "pelamar/php/proses_lamar_lowongan.php?id_lowongan=$id&id_kategori=$id_kategori&id_kita=$id_kita&id_perusahaan=$id_perusahaan";

		?>>

		 <button class="btn btn-primary" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Lamar Dengan Berkas</button></a>
		</a>
		<?php
	}
			}

		?>
		 <br><br><hr>



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
                           <center><a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$lamaran[id_pelamar]&page_profil=profil_kita"; ?>>
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












  



