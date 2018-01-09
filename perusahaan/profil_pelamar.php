<fieldset>
<div class="col-xs-12">
<form action="perusahaan/php/proses_notifikasi_lamaran.php" method="post" enctype="multipart/form-data">

<div class="row">

<div class="col-md-4">
		<?php
		$query=pg_query($connection,"SELECT * FROM pelamar INNER JOIN kota ON pelamar.id_kota=kota.id_kota where 

			id_pelamar='$_GET[id_pelamar]'");

		$r = pg_fetch_array($query);

		?>
			
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<a href="<?php echo "img/pelamar/foto_profil/$r[foto_profil]"  ?>"><img style="height:180px" src="<?php echo "img/pelamar/foto_profil/$r[foto_profil]"  ?>" class="img-responsive" alt=""></a>
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $r['pelamar_nama_lengkap'] ?>
					</div>
					
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						
						
						
						
					</ul>
				</div>
				
				<!-- END MENU -->
			</div>
		


		
	</div>


	<div class="col-md-8">
		   
<h4>Alamat</h4>	
	<input class="form-control" type="text"  readonly value='<?php echo $r['pelamar_alamat'] ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	
	<h4>Jenis Kelamin</h4>
	<input class="form-control" type="text"  readonly value='<?php if($r['jenis_kelamin']=='L'){ echo "Laki-Laki";}else{ echo "Wanita";} ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	<h4>Tempat Lahir</h4>
	<input class="form-control" type="text"  readonly value='<?php echo "$r[tempat_lahir]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	<h4>Tanggal Lahir</h4>
	<input class="form-control" type="date"  readonly value='<?php echo $r['tanggal_lahir'] ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	<h4>Status</h4>
		<input class="form-control" type="text"  readonly value='<?php echo "$r[status]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >
		<h4>Email</h4>
			<input class="form-control" type="text"  readonly value='<?php echo "$r[email]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >

	<h4>Telepon</h4>
	<input class="form-control" type="text" readonly value='<?php echo "$r[telepon]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >

<h4>Kota</h4>
	<input class="form-control" type="text" readonly value='<?php echo "$r[nama_kota]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >

<h4>Pendidikan Terakhir</h4>
	<input class="form-control" type="text" readonly value='<?php echo "$r[pendidikan_terakhir]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >

<h4>Tempat Pendidikan Terakhir</h4>
	<input class="form-control" type="text" readonly value='<?php echo "$r[tempat_pendidikan_terakhir]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >

<?php

if(!empty($r['pekerjaan_terakhir']) && !empty($r['tempat_pekerjaan_terakhir'])){



?>
<h4>Pekerjaan Terakhir</h4>
	<input class="form-control" type="text" readonly value='<?php echo "$r[pekerjaan_terakhir]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >

<h4>Tempat Bekerja Terakhir</h4>
	<input class="form-control" type="text" readonly value='<?php echo "$r[tempat_pekerjaan_terakhir]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >

<?php
}else{

}
?>

	


	</div>
	

</div>

<div class="row">
	<br>
	
<div class="col-xs-12">
			<h3 style="color:#f05f40;">Berkas-Berkas</h3>
			<hr>
			<?php

		$query=pg_query($connection,"SELECT * FROM cv where id_pelamar = $_GET[id_pelamar]");

		while($r=pg_fetch_array($query)){



		?>


		
 	<div class="col-md-4 col-xs-12">
		<a href="<?php echo "img/pelamar/berkas/$r[nama_cv]" ?>"><embed  style="width:100%; height:150px; margin-bottom:15px;" src="<?php echo "img/pelamar/berkas/$r[nama_cv]" ?>" type="application/pdf"></embed></a>

		</div>
		<?php

			}

		?>
	


	</div>
	


</div>

<hr>










<div class="row">
	<h3 style="color:#f05f40;">Lowongan Yang Dilamar</h3>
			<hr>
	<br>
	   <?php

                    $query=pg_query($connection,"SELECT * FROM   lamaran_perusahaan
                    	INNER JOIN lowongan ON lamaran_perusahaan.id_lowongan=lowongan.id_lowongan
                   
                    Where id_pelamar=$_GET[id_pelamar] AND id_perusahaan=$_GET[id_kita]
                    " );

                    while($r = pg_fetch_array($query)){
                    
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
                                  		INNER JOIN kota ON perusahaan.id_kota=kota.id_kota
                                  		WHERE id_perusahaan=$_GET[id_kita]");
                                  	$kota=pg_fetch_array($query_kota);
                                  	?>
                                     <i class="fa fa-map-marker icon-info"></i><?php echo " $kota[nama_kota]"?>  &nbsp;&nbsp;<br>
                                     <?php
                                  	$query_kat=pg_query($connection,"SELECT * FROM lowongan 
                                  		INNER JOIN kategori ON lowongan.id_kategori=kategori.id_kategori
                                  		WHERE id_perusahaan=$_GET[id_kita]");
                                  	$kat=pg_fetch_array($query_kat);
                                  	?>
                                     <i class="fa fa-tags icon-info"></i><?php echo " $kat[nama_kategori]"?> <br/> 
                                       <?php
                                       $query_pt=pg_query($connection,"SELECT * FROM perusahaan 
                                  		
                                  		WHERE id_perusahaan=$_GET[id_kita]");
                                  	$pt=pg_fetch_array($query_pt);

                                       ?>
                                      <a href=<?php echo "home_perusahaan.php?page=profil_perusahaan&id_perusahaan_nya=$_GET[id_kita]"; ?>>  <i class="fa fa-home icon-info"></i><?php echo " $pt[nama_perusahaan]"?> <br/>   
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
                          <?php }else if($tgl_hari_ini>$tanggal_tutup ){



                          $query = pg_query($connection,"DELETE FROM gambar_lowongan where id_lowongan = '$r[id_lowongan]'");
                          $query2  = pg_query($connection,"DELETE FROM syarat where id_lowongan = '$r[id_lowongan]'");
                          $query4 = pg_query($connection,"DELETE FROM lamaran where id_lowongan= '$r[id_lowongan]'");
                          $query5 = pg_query($connection,"DELETE FROM lamaran_perusahaan where id_lowongan= '$r[id_lowongan]'");

                          $query3 = pg_query($connection,"DELETE FROM lowongan where id_lowongan = '$r[id_lowongan]'");
                          

                        }
                         ?>





                       <?php }
                       ?>



	


</div>

<hr>



















<input type="hidden" readony name="id_pelamar" value="<?php echo "$_GET[id_pelamar]" ?>">
<input type="hidden" readony name="id_lowongan" value="<?php echo "$_GET[id_lowongan]" ?>">
<input type="hidden" readony name="id_kita" value="<?php echo "$_GET[id_kita]" ?>">

			
<?php

$query=pg_query($connection,"SELECT * FROM lamaran where id_pelamar=$_GET[id_pelamar] AND id_lowongan=$_GET[id_lowongan]");
$r = pg_fetch_array($query);
$query2=pg_query($connection,"SELECT * FROM lamaran_perusahaan where id_pelamar=$_GET[id_pelamar] AND id_lowongan=$_GET[id_lowongan]");
$r2 = pg_fetch_array($query2);
if(empty($r['hasil_lamaran'])){

	if(empty($r['hasil_lamaran']) AND isset($r2['status_lamaran'])){



?>

<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Perusahaan Meloloskan Pelamar Ini
		</div>	

<?php
}else{
?>

			<h3 style="color:#f05f40;">Hasil Akhir</h3>

  <select class="form-control" name="status" style="width:100%; margin-bottom:10px;">
					      	
					    	<option value =""></option>

					        <option value ="Lolos"> Lolos </option>
					        <option value ="Gagal"> Gagal </option>


					     
					     
					      </select>

					      <div class="form-group" >
		                        <button class="btn btn-info" type="submit" style="float:right; margin:20px 3px 0px 3px;">Kirim</button>
		                        <br><br><br><hr>
		                      </div>
		                      <?php
		                  }
		                      ?>


<?php

}else if( $r2['status_lamaran']=="Lolos"){



?>

	<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Perusahaan Meloloskan Pelamar Ini
		</div>	




<?php

}else{



?>




<?php
}

?>


</form>


</div>

</fieldset>