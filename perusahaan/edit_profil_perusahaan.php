	
<fieldset>

	<?php


	$query_perusahaan = pg_query($connection,"SELECT * FROM perusahaan where id_perusahaan =$_SESSION[id_perusahaan]");
	$r = pg_fetch_array($query_perusahaan);


	?>
	<form action="perusahaan/php/proses_edit_profil.php" method="post" enctype="multipart/form-data" style="border: none; padding: 30px 30px;">
					<input type="hidden" name="id_perusahaan" value =<?php echo $_SESSION['id_perusahaan']; ?>>
					

			 <h4>Nama Perusahaan</h4>
					 <input class="form-control" type="text" name="judul_lowongan" value="<?php echo $r['nama_perusahaan'] ?>" readonly style="width:100%; margin-bottom:10px;" required="required" >

           <h4>Kota</h4>

                <select class="form-control" name="kota" style="width:100%; margin-bottom:10px; " >
                  <?php 

                    $query = pg_query($connection,"SELECT * FROM kota");
                    

                    while($x=pg_fetch_array($query)){


                    

                  ?>
                  <option value='<?php echo "$x[id_kota]"; ?>'><?php echo "$x[nama_kota]"; ?></option>
                  

                  <?php

                  }

                ?>
               
                </select> 		
           
               


            <h4>Alamat Perusahaan</h4>
           	<input class="form-control" type="text" name="alamat" value="<?php echo $r['alamat_perusahaan'] ?>"  style="width:100%; margin-bottom:10px;" required="required" >

            <h4>Deskripsi Perusahaan</h4>
			            <textarea name="isi" style="width:100%; height:500px;" ><?php echo "$r[deskripsi_perusahaan]" ?></textarea>

			    <h4>Email Perusahaan</h4>
			    <input class="form-control" type="text" name="email" value="<?php echo "$r[email_perusahaan]";  ?>"  style="width:100%; margin-bottom:10px;" required="required" >

            		<h4>Telepon/Fax Perusahaan</h4>
            	 <input class="form-control" type="text" name="nomor" value="<?php echo "$r[telp_perusahaan]" ?>" style="width:100%; margin-bottom:10px;" required="required" >


            	 	<h4>Nomor IMB</h4>
             <input class="form-control" type="text" name="imb" value='<?php echo $r['nomor_imb']; ?>' readonly style="width:100%; margin-bottom:10px;" required="required" >
            

			<br><br><br>
			 <div class="form-group" >
		                        <input class="btn btn-danger" type="reset" value="Reset" style="float:right; margin:0px 3px 0px 3px;">
		                        <button class="btn btn-success"  name="btn_upload" type="submit" style="float:right; margin:0px 3px 0px 3px;">Tambah Profil</button>
		                        <br><br><br><hr>
		                      </div>

	</form>

</fieldset>
	