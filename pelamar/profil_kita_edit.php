<fieldset>

<form method="POST" action="pelamar/php/proses_edit_profil.php">

<input class="form-control" type="hidden" name="id_pelamar" value='<?php echo "$_SESSION[id_pelamar]" ?>'  required="required" >


<h4>Nama Lengkap</h4>	
	<input class="form-control" type="text" name="nama" value='<?php echo "$r[pelamar_nama_lengkap]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	


<h4>Alamat</h4>	
	<input class="form-control" type="text" name="alamat"  value='<?php echo $r['pelamar_alamat'] ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	
	<h4>Jenis Kelamin</h4>
<select class="form-control" name="jk" style="width:100%; margin-bottom:10px;">

			<option value ='L'>Laki-Laki</option>
			<option value ='P'>Perempuan</option>
		</select>


<h4>Tempat Lahir</h4>
	<input class="form-control" type="text" name="tempat_lahir" value='<?php echo "$r[tempat_lahir]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	

	<h4>Tanggal Lahir</h4>
	<input class="form-control" type="date" name="tgl" value='<?php echo $r['tanggal_lahir'] ?>'  style="width:100%; margin-bottom:10px;" required="required" >
	

	<h4>Status</h4>
<select class="form-control" name="status" style="width:100%; margin-bottom:10px;">

			<option value ='Menikah'>Menikah</option>
			<option value ='Lajang'>Lajang</option>
			


		</select>	



		<h4>Email</h4>
			<input class="form-control" type="text" name="email" value='<?php echo "$r[email]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >



	<h4>Telepon</h4>
	<input class="form-control" type="text" name="nomor" value='<?php echo "$r[telepon]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >


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

		<?php

		$query=pg_query($connection,"SELECT * FROM pelamar where id_pelamar=$_SESSION[id_pelamar]");
		$r = pg_fetch_array($query);
		?>

<h4>Tempat Pendidikan Terakhir</h4>
	<input class="form-control" type="text" name="tempat_pendidikan" value='<?php echo "$r[tempat_pendidikan_terakhir]" ?>'  style="width:100%; margin-bottom:10px;" required="required" >


<h4>Pekerjaan Terakhir</h4>
	<input class="form-control" type="text" name="pekerjaan" value='<?php echo "$r[pekerjaan_terakhir]" ?>'  style="width:100%; margin-bottom:10px;"  >

<h4>Tempat Bekerja Terakhir</h4>
	<input class="form-control" type="text" name="tempat_kerja"  value='<?php echo "$r[tempat_pekerjaan_terakhir]" ?>'  style="width:100%; margin-bottom:10px;"  >
<hr>


					          <div class="form-group" >
		                        <input class="btn btn-danger" type="reset" value="Reset" style="float:right; margin:0px 3px 0px 3px;">
		                        <button class="btn btn-warning" type="submit" style="float:right; margin:0px 3px 0px 3px;">Edit Profile</button>
		                        <br><br><br><hr>
		                      </div>

		                      </form>

</fieldset>