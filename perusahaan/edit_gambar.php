<fieldset>

<div class="col-xs-12">



	<?php
		 $query_berkas_perusahaan=pg_query($connection,"SELECT * FROM perusahaan WHERE id_perusahaan=$_SESSION[id_perusahaan]");
		$pt=pg_fetch_array($query_berkas_perusahaan);

	if(empty($pt['alamat_perusahaan'])  AND empty($pt['deskripsi_perusahaan']) ){



		 ?>		

			
			<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Lengkapi Biodata Perusahaan!
		</div>

	<?php

}else{


	?>
<form action="perusahaan/php/proses_tambah_gambar_perusahaan.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_perusahaan_nya" value =<?php echo $_GET['id_perusahaan_nya'] ?>>

   			<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="file_img[]" style="display: none;" multiple/ required="required" >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly placeholder="Masukan Foto Lebih Dari 1" >

					         </div>

					         					<button class="btn btn-success" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Tambah Berkas</button>
					         					<br><br><br><hr>

	</form>
	
	<?php

}

	?>

		

	</div>

	<?php

		$query=pg_query($connection,"SELECT * FROM gambar_perusahaan where id_perusahaan = $_SESSION[id_perusahaan]");

		while($r=pg_fetch_array($query)){



		?>


		
 	<div class="col-md-4 col-xs-12">
		<a href="<?php echo "img/perusahaan/foto_perusahaan/$r[gambar_perusahaan]" ?>"><embed style="width:100%; height:150px; " src="<?php echo "img/perusahaan/foto_perusahaan/$r[gambar_perusahaan]" ?>" type="application/pdf"></embed></a>
	     <a href="<?php echo "perusahaan/php/proses_hapus_gambar.php?id_gambar=$r[id_gambar_perusahaan]&id_perusahaan_nya=$_SESSION[id_perusahaan]" ?>"><input type='button' class="btn-link" value='Delete'  style="margin-bottom:10px; float:right;"></a>

		</div>
		<?php

			}

		?>



		</fieldset>