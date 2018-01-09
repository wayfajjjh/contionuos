



<?php
require_once '../../koneksi/koneksi.php';


$id_pelamar=$_GET['id_pelamar'];
$id_admin=$_GET['id_admin'];
$q1=pg_query($connection,"DELETE FROM 		cv	 WHERE		id_pelamar=$id_pelamar   			");
$q12=pg_query($connection,"DELETE FROM 		lamaran	 WHERE		id_pelamar=$id_pelamar  			");
$q2=pg_query($connection,"DELETE FROM 		lamaran_perusahaan	 WHERE		id_pelamar=$id_pelamar  			");
$q3=pg_query($connection,"DELETE FROM 		following	 WHERE		id_pelamar=$id_pelamar  			");
$q3=pg_query($connection,"DELETE FROM 		following	 WHERE		id_login=$id_pelamar  			");

$q4=pg_query($connection,"DELETE FROM 		follower	 WHERE		id_pelamar=$id_pelamar  			");
$q4=pg_query($connection,"DELETE FROM 		follower	 WHERE		id_login=$id_pelamar  			");

$q5=pg_query($connection,"DELETE FROM 		koneksi_teman	 WHERE		id_pelamar=$id_pelamar  			");
$q5=pg_query($connection,"DELETE FROM 		koneksi_teman	 WHERE		id_login=$id_pelamar  			");

$q6=pg_query($connection,"DELETE FROM 		pesan	 WHERE 		id_pelamar=$id_pelamar 			");
$q6=pg_query($connection,"DELETE FROM 		pesan	 WHERE 		id_login=$id_pelamar 			");

$q7=pg_query($connection,"DELETE FROM 		likes	 WHERE 		id_pelamar=$id_pelamar 			");
$q8=pg_query($connection,"DELETE FROM 		dislikes	 WHERE		id_pelamar=$id_pelamar  			");
$q9=pg_query($connection,"DELETE FROM 		gagal	 WHERE  		id_pelamar=$id_pelamar			");
$q10=pg_query($connection,"DELETE FROM 		pelamar	 WHERE  		id_pelamar=$id_pelamar			");
$q11=pg_query($connection,"DELETE FROM 		login	 WHERE  		id_login=$id_pelamar			");

 echo "<script>alert('Akun Dihapus !');window.location='../../home_admin.php?page=pelamar&id=$id_admin';</script>";



?>






