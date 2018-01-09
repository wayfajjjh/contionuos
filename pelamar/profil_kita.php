<fieldset>

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



</fieldset>