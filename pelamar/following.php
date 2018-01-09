<fieldset>

<div class="col-xs-12">
<?php
$id_pelamar=$_GET['id_pelamar_nya'];
									if($id_pelamar!=$_SESSION['id_pelamar']){
									?>
									<h3 style="color:#f05f40;">Follower</h3>
									<hr>
									<?php
									}

									?>
				 <?php

				 	$id_pelamar = $_GET['id_pelamar_nya'];


				 $query=pg_query($connection,"SELECT * FROM pelamar ");
				 while($lamaran=pg_fetch_array($query)){


				 	if($id_pelamar==$_SESSION['id_pelamar']){

				 ?>


							  	<?php 

							  	$query_teman = pg_query($connection,"SELECT id_koneksi,id_pelamar,id_login FROM koneksi_teman
							  	 where id_pelamar=$lamaran[id_pelamar] AND id_login = $id_pelamar ORDER BY id_koneksi desc");

							  	while ($teman=pg_fetch_array($query_teman)) {
							  		if(isset($teman['id_pelamar']) AND isset($teman['id_login'])){

							  	

							  

							  	?>
							  					  <div class="col-md-4 col-xs-12 " >

			                            <div style="height:240px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
			                              <a href="<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?>"><img src=<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?> alt="" style="width:100%; height:150px; "></a>
			                              <center><a href="<?php echo "home_pelamar.php?page=profil_pelamar&page_profil=profil_kita&id_pelamar_nya=$teman[id_pelamar]" ?>">
			                              <h5> <?php echo "$lamaran[pelamar_nama_lengkap]"; ?> </h5></a></center> 
			                             
			                          
			                           
			                         
			                            </div>
			                        </div>



							 <?php
							 		}
							 	}
							 }else{
							 

							 ?>
							 	<?php 


							  	$query_teman = pg_query($connection,"SELECT id_following,id_pelamar,id_login FROM following
							  	 where id_pelamar=$lamaran[id_pelamar] AND id_login =$id_pelamar  ORDER BY id_following desc");

							  	while ($teman=pg_fetch_array($query_teman)) {
							  		if(isset($teman['id_pelamar']) AND isset($teman['id_login'])){

							  	

							  

							  	?>
							  	


							  					  <div class="col-md-4 col-xs-12 " >

			                            <div style="height:240px; margin-bottom:15px; background-color:white; padding:10px 10px 10px 10px;">
			                              <a href="<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?>"><img src=<?php echo "img/pelamar/foto_profil/$lamaran[foto_profil]" ?> alt="" style="width:100%; height:150px; "></a>
			                              <center><a href="<?php echo "home_pelamar.php?page=profil_pelamar&page_profil=profil_kita&id_pelamar_nya=$teman[id_pelamar]" ?>">
			                              <h5> <?php echo "$lamaran[pelamar_nama_lengkap]"; ?> </h5></a></center> 
			                             
			                          
			                           
			                         
			                            </div>
			                        </div>




							 <?php 
								 	}
								 }

							  }


							 ?>


<?php

}

?>

</div>



</fieldset>