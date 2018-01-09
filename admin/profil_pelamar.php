<div class="row">
	<div class="col-md-4">
	
		<?php

		$query=pg_query($connection,"SELECT * FROM pelamar INNER JOIN kota ON pelamar.id_kota=kota.id_kota where 

			id_pelamar='$_GET[id_pelamar]'");

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
									<a href="<?php echo "admin/php/proses_hapus_akun_pelamar.php?id_pelamar=$_GET[id_pelamar]&id_admin=$_SESSION[id_profil]"; ?>"><button type="button" class="btn btn-danger btn-sm">Hapus Akun</button></a>

					
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->

				
				
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li >
							<a href=<?php echo "home_admin.php?page=profil_pelamar&id_pelamar=$_GET[id_pelamar]&page_profil=profil_kita" ?>>
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>

						<li >
							<a href=<?php echo "home_admin.php?page=profil_pelamar&id_pelamar=$_GET[id_pelamar]&page_teman=teman" ?>>
							<i class="glyphicon glyphicon-user"></i>
							Teman </a>
						</li>

						<li >
							<a href=<?php echo "home_admin.php?page=profil_pelamar&id_pelamar=$_GET[id_pelamar]&page_teman=lowongan_pelamar" ?>>
							<i class="glyphicon glyphicon-briefcase"></i>
							Lowongan</a>
						</li>

						<li >
							<a href=<?php echo "home_admin.php?page=profil_pelamar&id_pelamar=$_GET[id_pelamar]&page_teman=follower" ?>>
							<i class="glyphicon glyphicon-globe"></i>
							Follower</a>
						</li>						
						
						<li >
							<a href=<?php echo "home_admin.php?page=profil_pelamar&id_pelamar=$_GET[id_pelamar]&page_teman=following" ?>>
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
          
                   
	                    if($page_profil){

	                      include "$page_profil".".php";
	                    }else{
	                      include "profil_kita.php";
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
