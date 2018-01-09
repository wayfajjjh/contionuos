<fieldset>

<div class = "col-xs-12">

<?php
	
	$id = $_GET['id_perusahaan_nya'];

	
	$query = pg_query($connection,"SELECT * from gambar_perusahaan  where id_perusahaan = '$_SESSION[id_perusahaan]' ");
	$query_perusahaan = pg_query($connection,"SELECT * FROM perusahaan where id_perusahaan = '$_SESSION[id_perusahaan]'");
	$r = pg_fetch_array($query);
	$r_perusahaan = pg_fetch_array($query_perusahaan);
		if(!isset($r_perusahaan['id_perusahaan']) AND !isset($r_perusahaan['alamat']) AND $id == $_SESSION['id_perusahaan']){
			
			

?>
	
	<form action="perusahaan/php/proses_tambah_profil.php" method="post" enctype="multipart/form-data" style="border: none; padding: 30px 30px;">
					<input type="hidden" name="id_perusahaan" value =<?php echo $id; ?>>
					

			 <h4>Nama Perusahaan</h4>
					 <input class="form-control" type="text" name="judul_lowongan" value='<?php echo $r_perusahaan['nama_perusahaan'] ?>' readonly style="width:100%; margin-bottom:10px;" required="required" >
           
           <h4>Kota</h4>

                <select class="form-control" name="kota" style="width:100%; margin-bottom:10px;">
                  <?php 

                    $query = pg_query($connection,"SELECT * FROM kota");
                    $jumlah = pg_num_rows($query) ;
                    

                    while($r=$jumlah=pg_fetch_array($query)){


                    

                  ?>
                  <option value =<?php echo "$r[id_kota]"; ?>><?php echo "$r[nama_kota]" ;?></option>
                  

                  <?php

                  }

                ?>
               
                </select> 		
           



            <h4>Alamat Perusahaan</h4>
            					 <input class="form-control" type="text" name="alamat" placeholder="Alamat"  style="width:100%; margin-bottom:10px;" required="required" >

            <h4>Deskripsi Perusahaan</h4>
			            <textarea name="isi" style="width:100%; height:500px;" ></textarea>

			    <h4>Email Perusahaan</h4>
			    <input class="form-control" type="text" name="email" placeholder="Email"  style="width:100%; margin-bottom:10px;" required="required" >

            		<h4>Telepon/Fax Perusahaan</h4>
            	 <input class="form-control" type="text" name="nomor" placeholder="Telepon / Fax"  style="width:100%; margin-bottom:10px;" required="required" >


            	 	<h4>Nomor IMB</h4>
             <input class="form-control" type="text" name="imb" placeholder=<?php echo $r_perusahaan['nomor_imb']; ?> readonly style="width:100%; margin-bottom:10px;" required="required" >
             <h4>Foto Perusahaan</h4>
   			<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="gambar" style="display: none;"  >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly placeholder="Masukan Foto Lebih Dari Satu" required="required">

					         </div>

			<br><br><br>
			 <div class="form-group" >
		                        <input class="btn btn-danger" type="reset" value="Reset" style="float:right; margin:0px 3px 0px 3px;">
		                        <button class="btn btn-success"  name="btn_upload" type="submit" style="float:right; margin:0px 3px 0px 3px;">Tambah Profil</button>
		                        <br><br><br><hr>
		                      </div>

	</form>
<?php

			}else if($id == $_SESSION['id_perusahaan']){




			

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
				 Where id_perusahaan = $id ");
			

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

<a onclick="return confirm('Are you sure you want to edit this item?');" href="<?php echo "home_perusahaan.php?page=edit_profil_perusahaan&id_perusahaannya=$_SESSION[id_perusahaan]" ?>">
  <button class="btn btn-warning" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Edit Profil</button></a>  
                    




		 		 		<br><br><hr>

          







 <?php 

} else if($id == $_GET['id_perusahaan_nya']){

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
                                      WHERE id_perusahaan='$id'");
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
                   
                      

                     
                       <br><br><hr>



<?php
	
	}

?>

 
</div>
	


</fieldset>
