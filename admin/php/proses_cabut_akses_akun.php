<?php

require_once '../../koneksi/koneksi.php';
$id_perusahaan =$_GET['id_perusahaan'];

  $query=pg_query($connection,"SELECT * FROM perusahaan 
                    
                    Where id_perusahaan=$id_perusahaan" );



                    $r = pg_fetch_array($query);

                      if(!empty($r['status_perusahaan'])){
                      	$query_input=pg_query($connection,"UPDATE perusahaan SET status_perusahaan='' WHERE  id_perusahaan=$id_perusahaan");
						 echo "<script>alert('Akun dicabut hak aksesnya');window.location='../../home_admin.php?page=halaman_perusahaan&id=$id_perusahaan';</script>";


						}	


?>

