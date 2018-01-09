

<fieldset>
	<div class="col-xs-12">
		<center><h2>Foto Lowongan</h2></center><hr>
			<form action="perusahaan/php/proses_tambah_gambar.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_lowongan" value =<?php echo $_GET['id_lowongan'] ?>>
					<input type="hidden" name="id" value =<?php echo $_GET['id'] ?>>

   			<div class="input-group" style="margin: 10px 0px 10px 0px;">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse&hellip; <input type="file" name="file_img[]" style="display: none;" multiple/ required="required" >
					                    </span>
					                </label>
					                <input type="text" class="form-control" readonly placeholder="Masukan Foto Lebih Dari Satu" required="required">

					         </div>

					         					<button class="btn btn-success" type="submit" name="btn_upload" style="float:right; margin:0px 3px 0px 3px;">Tambah Gambar</button>
					         					<br><br><br><hr>

	</form>


	</div>
	

</fieldset>




