<fieldset>
<div class="col-xs-12">



	<?php
		$id_pelamar = $_GET['id_pelamar_nya'];


		$query=pg_query($connection,"SELECT * FROM pelamar where id_pelamar ='$id_pelamar'");
		$r = pg_fetch_array($query);

		if( empty($r['pelamar_alamat'])  AND empty($r['jenis_kelamin']) AND empty($r['tempat_lahir']) 
		 AND empty($r['tanggal_lahir']) AND empty($r['status']) 
		 AND empty($r['telepon']) AND empty($r['foto_profil'])
		){
	?>


		<form action="pelamar/php/proses_tambah_profil.php" method="post" enctype="multipart/form-data" style="border: none; padding: 30px 30px;">
			<input type="hidden" name="id_pelamar" value =<?php echo "$id_pelamar"; ?>>

		<h4>Nama Pelamar</h4>
		<input class="form-control" type="text" name="nama" value ='<?php echo " $r[pelamar_nama_lengkap]"?>'  style="width:100%; margin-bottom:10px;" required="required" >
          
		<h4>Alamat</h4>
		<input class="form-control" type="text" name="alamat" placeholder="Alamat"  style="width:100%; margin-bottom:10px;" required="required" >

		<h4>Tempat Lahir</h4>
		<input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir"  style="width:100%; margin-bottom:10px;" required="required" >
		
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


		<h4>Status</h4>
		<select class="form-control" name="status" style="width:100%; margin-bottom:10px;">

			<option value ='Menikah'>Menikah</option>
			<option value ='Lajang'>Lajang</option>
			


		</select>
		
		<h4>Email</h4>
		<input class="form-control" type="text" name="email" value='<?php echo "$r[email]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >
		


		<h4>Tanggal Lahir</h4>
		<input class="form-control" type="date" name="tgl"  style="width:100%; margin-bottom:10px;" required="required" >

		<h4>Jenis Kelamin</h4>
		<select class="form-control" name="jk" style="width:100%; margin-bottom:10px;">

			<option value ='L'>Laki-Laki</option>
			<option value ='P'>Perempuan</option>
		</select>


		<h4>Telepon</h4>
		<input class="form-control" type="text" name="nomor"   placeholder="Nomor Telepon"  style="width:100%; margin-bottom:10px;" required="required" >

		<h4>Pendidikan Terakhir</h4>
		<select class="form-control" name="derajat" style="width:100%; margin-bottom:10px;">

			<option value ='SD'>SD</option>
			<option value ='SMP'>SMP</option>
			<option value ='SMA'>SMA</option>
			<option value ='Diploma 1 / D1'>Diploma 1 / D1</option>
			<option value ='Diploma 2 / D2'>Diploma 2 / D2</option>
			<option value ='Diploma 3 / D3'>Diploma 3 / D3</option>
			<option value ='Instansi Kedinasan'>Instansi Kedinasan</option>
			<option value ='Sarjana Terapan / D4'>Sarjana Terapan / D4</option>
			<option value ='Strata 1 / S1'>Strata 1 / S1</option>
			<option value ='Strata 2 / S2'>Strata 2 / S2</option>
			<option value ='Strata 3 / S3'>Strata 3 / S3</option>


		</select>

		<h4>Tempat Pendidikan Terakhir</h4>
				<input class="form-control" type="text" name="tempat_pendidikan" placeholder="Tempat Pendidikan Terakhir"  style="width:100%; margin-bottom:10px;" required="required" >

		<h4>Pekerjaan Terakhir</h4>
				<input class="form-control" type="text" name="pekerjaan" placeholder="Pekerjaan Bekerja"   style="width:100%; margin-bottom:10px;"  >

		<h4>Tempat Terakhir Bekerja</h4>
		<input class="form-control" type="text" name="tempat_kerja" placeholder="Tempat Terakhir Bekerja"   style="width:100%; margin-bottom:10px;"  >


		<h4>Foto Profil</h4>
			<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="gambar" style="display: none;" required="required" >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly placeholder="Masukan Foto Profil" required="required">

					         </div>


			<br><br><br>
			 <div class="form-group" >
		                        <input class="btn btn-danger" type="reset" value="Reset" style="float:right; margin:0px 3px 0px 3px;">
		                        <button class="btn btn-success"  name="btn_upload" type="submit" style="float:right; margin:0px 3px 0px 3px;">Tambah Profil</button>
		                        <br><br><br><hr>
		                      </div>

	</form>


	<?php

		}else if($id_pelamar == $_SESSION['id_pelamar']){




	?>
<div class="row">
	<div class="col-md-4">
		<?php
		$query=pg_query($connection,"SELECT * FROM pelamar INNER JOIN kota ON pelamar.id_kota=kota.id_kota where 

			id_pelamar='$_SESSION[id_pelamar]'");

		$r = pg_fetch_array($query);

		?>
			
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->

				<div class="profile-userpic">
					<a href="#" data-toggle="modal" data-target="#myModal"><img  style="height:180px" src="<?php echo "img/pelamar/foto_profil/$r[foto_profil]"  ?>" class="img-responsive" alt=""></a>

				</div>

				 
				

				<!-- MOdal -->
		








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
						<li class="active">
							<a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$_SESSION[id_pelamar]&page_profil=profil_kita" ?>>
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						
						
						<li onclick="active">
							<a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$_SESSION[id_pelamar]&page_profil=profil_kita_edit" ?>>
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						
					</ul>
				</div>
				
				<!-- END MENU -->
			</div>
		


		
	</div>
	<div class="col-md-8">
		   <?php
                  //error_reporting(0);

                    $page_profil = $_GET['page_profil'];

                    if($page_profil){

                      include "$page_profil".".php";
                    }else{
                      include "profil_kita.php";
                    }

                  ?>

	


	</div>
	



	

</div>


<div class="row">
	<br>
	<?php

	if($page_profil=='profil_kita'){

		?>
<div class="col-xs-12">
			<h3 style="color:#f05f40;">Berkas-Berkas</h3>
			<hr>
			<?php

		$query=pg_query($connection,"SELECT * FROM cv where id_pelamar = $_SESSION[id_pelamar]");

		while($r=pg_fetch_array($query)){



		?>


		
 	<div class="col-md-4 col-xs-12">
		<a href="<?php echo "img/pelamar/berkas/$r[nama_cv]" ?>"><embed style="width:100%; height:150px; " src="<?php echo "img/pelamar/berkas/$r[nama_cv]" ?>" type="application/pdf"></embed></a>
	     <a href="<?php echo "pelamar/php/proses_hapus_berkas.php?id_berkas=$r[id_cv]&id_pelamar_nya=$_SESSION[id_pelamar]" ?>"><input type='button' class="btn-link" value='Delete'  style="margin-bottom:10px; float:right;"></a>

		</div>
		<?php

			}

		?>
	


	</div>


<?php

	}
	?>
	


</div>

<?php
	}else if($id_pelamar != $_SESSION['id_pelamar']){




	?>



	<div class="row">
	<div class="col-md-4">
	
		<?php

		$query=pg_query($connection,"SELECT * FROM pelamar INNER JOIN kota ON pelamar.id_kota=kota.id_kota where 

			id_pelamar='$_GET[id_pelamar_nya]'");

		$r = pg_fetch_array($query);

		?>
			
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<a href="<?php echo "img/pelamar/foto_profil/$r[foto_profil]"  ?>" ><img style="height:180px" src="<?php echo "img/pelamar/foto_profil/$r[foto_profil]"  ?>" class="img-responsive" alt=""></a>
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

				<div class="profile-userbuttons">

					<?php

					$q = pg_query($connection,"SELECT * FROM following WHERE id_pelamar = $_SESSION[id_pelamar] AND id_login=$_GET[id_pelamar_nya]");
					$q3 = pg_query($connection,"SELECT id_pelamar,id_login FROM follower WHERE id_pelamar = $_SESSION[id_pelamar] AND id_login=$_GET[id_pelamar_nya]");

					$teman = pg_fetch_array($q);
					$teman2 = pg_fetch_array($q3);



					if(!isset($teman['id_pelamar']) AND !isset($teman['id_login'])){




					?>

					<a href="<?php echo "pelamar/php/proses_tambah_teman.php?id_teman=$_GET[id_pelamar_nya]&id_kita=$_SESSION[id_pelamar]"; ?>"><button type="button" class="btn btn-success btn-sm">Follow</button></a>



					<?php
				}

					$q1 = pg_query($connection,"SELECT id_pelamar,id_login FROM koneksi_teman WHERE id_pelamar=$_SESSION[id_pelamar] AND id_login=$_GET[id_pelamar_nya] ");

						$teman1=pg_fetch_array($q1);

					if(isset($teman1['id_pelamar']) AND isset($teman1['id_login']) AND isset($teman['id_pelamar']) AND isset($teman['id_login']) AND !isset($teman2['id_pelamar']) AND !isset($teman2['id_login'])){


						
					

				?>
							
					<a href="<?php echo "pelamar/php/proses_konfirmasi_teman.php?id_teman=$_GET[id_pelamar_nya]&id_kita=$_SESSION[id_pelamar]"; ?>"><button type="button" class="btn btn-info btn-sm">Konfirmasi</button></a>

				<?php


			}else if(!isset($teman1['id_pelamar']) AND !isset($teman1['id_login'])  AND isset($teman['id_pelamar']) AND isset($teman['id_login']) AND !isset($teman2['id_pelamar']) AND !isset($teman2['id_login'])){


				?>
			<div class="alert alert-warning fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Menunggu Konfirmasi
				</div>
				<?php

			}else if(isset($teman2['id_pelamar']) AND isset($teman2['id_login'])){


				?>


					<a href="<?php echo "home_pelamar.php?page=pesan&id_pelamar_nya=$_GET[id_pelamar_nya]"; ?>"><button type="button" class="btn btn-success btn-sm">Massage</button></a>

					<a href="<?php echo "pelamar/php/blokir.php?id_teman=$_GET[id_pelamar_nya]&id_kita=$_SESSION[id_pelamar]"; ?>"><button type="button" class="btn btn-danger btn-sm">Blokir</button></a>

				<?php
					}

				?>
				</div>
				
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li >
							<a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$_GET[id_pelamar_nya]&page_profil=profil_kita" ?>>
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>

						<li >
							<a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$_GET[id_pelamar_nya]&page_teman=teman" ?>>
							<i class="glyphicon glyphicon-user"></i>
							Teman </a>
						</li>

						<li >
							<a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$_GET[id_pelamar_nya]&page_teman=lowongan_teman" ?>>
							<i class="glyphicon glyphicon-briefcase"></i>
							Lowongan</a>
						</li>

						<li >
							<a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$_GET[id_pelamar_nya]&page_teman=following" ?>>
							<i class="glyphicon glyphicon-globe"></i>
							Follower</a>
						</li>						
						
						<li >
							<a href=<?php echo "home_pelamar.php?page=profil_pelamar&id_pelamar_nya=$_GET[id_pelamar_nya]&page_teman=follower" ?>>
							<i class="glyphicon glyphicon-eye-close"></i>
							Following</a>
						</li>

					
						
						
					</ul>
				</div>
				
				<!-- END MENU -->
			</div>


		


		
	</div>
	<div class="col-md-8">
		   <?php
                  //error_reporting(0);

                    $page_profil = $_GET['page_profil'];
          $q10 = pg_query($connection,"SELECT id_pelamar,id_login FROM follower WHERE id_pelamar = $_SESSION[id_pelamar] AND id_login=$_GET[id_pelamar_nya]");

          $teman10=pg_fetch_array($q10);
                    if (!isset($teman10['id_pelamar']) AND !isset($teman10['id_login'])) {
                    	
                    	include "privacy.php";
                    }
                    else{


                   
	                    if($page_profil){

	                      include "$page_profil".".php";
	                    }else{
	                      include "profil_kita.php";
	                    }
	                   }

                  ?>

	


	</div>
	



	

</div>


<div class="row" style="margin-top:10px;">
<?php

 $page_teman= $_GET['page_teman'];

 if($page_teman){



	                      include "$page_teman".".php";
	                    }

?>



</div>



	<?php

		}


	?>


</fieldset>


		    <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Ganti Foto Profil</h4>
                            </div>
                            <div class="modal-body">
                              <form  method="POST" action="pelamar/php/proses_edit_foto_profil.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;" >

                              	<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="gambar" style="display: none;"  >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly required="required">
					         </div>
					         <input type="hidden" name="id_pelamar" value="<?php echo "$_SESSION[id_pelamar]" ?>">
					         <?php
					         $query_foto=pg_query($connection,"SELECT * FROM pelamar where id_pelamar=$_SESSION[id_pelamar]");
					         $r=pg_fetch_array($query_foto);
					         ?>

					         <img src="<?php echo "img/pelamar/foto_profil/$r[foto_profil]"  ?>" style="width:200px; height:200px;" alt="">

                        <div class="form-group">
                          <div class="col-xs-12">
		                        <button class="btn btn-success"  name="btn_upload" type="submit" style="float:right; margin:0px 3px 0px 3px;">Ganti Foto <i class="glyphicon glyphicon-camera"></i></button>
                          </div>
                        </div>
                      </form>
                            </div>
                           
                          </div>
                        </div>
                      </div>