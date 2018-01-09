

<fieldset>
	
	<div class="col-xs-12">
		<center><h2>Edit Lowongan</h2></center><hr>
           
			<form  method="POST" action="perusahaan/php/proses_edit_lowongan.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;" >
							<input type="hidden" name="id_lowongan" value=<?php echo "$_GET[id]"; ?>>
							<input type="hidden" name="id_kategori" value=<?php echo "$_GET[id_kategori]"; ?>>
							<input type="hidden" name="id_kita" value=<?php echo "$_GET[id_kita]"; ?>>

					<?php

						$query=pg_query($connection,"SELECT * FROM lowongan INNER JOIN kategori ON lowongan.id_kategori = kategori.id_kategori WHERE id_lowongan = $_GET[id]" );
						while($r=pg_fetch_array($query)){
							$news=$r['judul_lowongan'];
		                      $artikel= substr($news, 0,250); //untuk memotong jumlah karakter
		                      $isi =strip_tags($artikel);

					?>		

					<h4>Judul Lowongan</h4>
					 <input class="form-control" type="text" name="judul_lowongan" value='<?php echo $isi ?>' style="width:100%; margin-bottom:10px;" required="required" >
            		
            		<h4>Kategori</h4>

					      <select class="form-control" name="kategori" style="width:100%; margin-bottom:10px;">
					      	<?php 

					      		$query1 = pg_query($connection,"SELECT * FROM kategori");
					      		$jumlah = pg_num_rows($query) ;
					      		

					      		while($x=$jumlah=pg_fetch_array($query1)){


					      		

					      	?>
					        <option value =<?php echo "$x[id_kategori]"; ?>><?php echo "$x[nama_kategori]" ;?></option>
					        

					        <?php

					      	}

					      ?>
					     
					      </select>




					    <h4>Tanggal Tutup</h4>
					     <input class="form-control" type="date" readonly name="tanggal_tutup" value='<?php echo "$r[tanggal_tutup]" ?>' style="width:100%; margin-bottom:10px;" required/>
					     

					     <h4>Deskripsi Lowongan</h4>
			            <textarea name="isi" style="width:100%; height:500px;"><?php echo "$r[deskripsi]"; ?></textarea>
			            
			               <h4>Banyak Pegawai Yang Dibutuhkan</h4>
			           <input class="form-control" type="text" name="pegawai" value=<?php echo "$r[max_lamaran]" ?> style="width:100%; margin-bottom:10px;" required/>



			            <h4>Upload Foto Thumbnail</h4>
			            	<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="gambar" style="display: none;"  >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly value='<?php echo "$r[gambar_lowongan]"  ?>' required="required">
					         </div>

					         


					          <div class="form-group" >
		                        <input class="btn btn-danger" type="reset" value="Reset" style="float:right; margin:0px 3px 0px 3px;">
		                        <button class="btn btn-warning" type="submit" style="float:right; margin:0px 3px 0px 3px;">Edit Lowongan</button>
		                        <br><br><br><hr>
		                      </div>


		                  
                            	 
		                    

								  	<?php

								  }

								  	?>


			</form>
			


		</div>
  		

  

		


</fieldset>