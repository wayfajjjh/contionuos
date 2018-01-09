

<fieldset>
	<div class="col-xs-12">
	 <?php 

		 $query=pg_query($connection,"SELECT * FROM pelamar WHERE id_pelamar= '$_SESSION[id_pelamar]'");
		$pelamar = pg_fetch_array($query);
		if(empty($pelamar['pelamar_alamat'])  AND empty($pelamar['jenis_kelamin']) AND empty($pelamar['tempat_lahir']) 
		 AND empty($pelamar['tanggal_lahir']) AND empty($pelamar['status']) 
		 AND empty($pelamar['telepon']) AND empty($pelamar['foto_profil'])){



		 ?>		

			
			<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Lengkapi Biodata Anda!
		</div>	

	<?php

		}else{


		
	?>

	<form action="pelamar/php/proses_tambah_berkas.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_pelamar_nya" value =<?php echo $_GET['id_pelamar_nya'] ?>>

   			<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="file_img[]" style="display: none;" multiple/ required="required" >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly placeholder="Masukan Berkas Foto Atau Pdf" required="required">

					         </div>

					         					<button class="btn btn-success" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Tambah Berkas <i class="glyphicon glyphicon-cloud-upload"></i></button>
					         					<br><br><br><hr>

	</form>
	<?php

		}

	?>


		

	</div>

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
	

</fieldset>




