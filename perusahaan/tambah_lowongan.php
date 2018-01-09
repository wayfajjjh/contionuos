

<fieldset>
	
	<div class="col-xs-12">
		<center><h2>Tambah Lowongan</h2></center><hr>
           
			<form  method="POST" action="perusahaan/php/proses_tambah_lowongan.php" enctype="multipart/form-data" style="border: none; padding: 30px 30px;" >
							<input type="hidden" name="id_pt" value=<?php echo "$id"; ?>>

					<h4>Judul Lowongan</h4>
					 <input class="form-control" type="text" name="judul_lowongan" placeholder="Judul Lowongan" style="width:100%; margin-bottom:10px;" required="required" >
            		
            		<h4>Kategori</h4>

					      <select class="form-control" name="kategori" style="width:100%; margin-bottom:10px;">
					      	<?php 

					      		$query = pg_query($connection,"SELECT * FROM kategori");
					      		$jumlah = pg_num_rows($query) ;
					      		

					      		while($r=$jumlah=pg_fetch_array($query)){


					      		

					      	?>
					        <option value =<?php echo "$r[id_kategori]"; ?>><?php echo "$r[nama_kategori]" ;?></option>
					        

					        <?php

					      	}

					      ?>
					     
					      </select>




					    <h4>Tanggal Tutup</h4>
					     <input class="form-control" type="date" name="tanggal_tutup"  style="width:100%; margin-bottom:10px;" required/>
					     

					     <h4>Deskripsi Lowongan</h4>
			            <textarea name="isi" style="width:100%; height:500px;" ></textarea>
			            
			            <h4>Banyak Pegawai Yang Dibutuhkan</h4>
			           <input class="form-control" type="text" name="pegawai"  style="width:100%; margin-bottom:10px;" required/>


			            <h4>Upload Foto Thumbnail</h4>
			            	<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="gambar" style="display: none;"  >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly required="required">
					         </div>

					         

<hr>
					          <div class="form-group" >
		                        <input class="btn btn-danger" type="reset" value="Reset" style="float:right; margin:0px 3px 0px 3px;">
		                        <button class="btn btn-success" type="submit" style="float:right; margin:0px 3px 0px 3px;">Tambah Lowongan</button>
		                        <br><br><br><hr>
		                      </div>




			</form>



		</div>
  		

  

		


</fieldset>