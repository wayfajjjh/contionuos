<?php
require_once '../../koneksi/koneksi.php';

	//error_reporting(0);
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['konfirmasi_password'];
	$nomor_imb = $_POST['imb'];
		
	
	if($password == $confirm_password){
		$encPassword = md5($password);

		$login = pg_query($connection,"SELECT * FROM perusahaan inner join login on perusahaan.id_login = login.id_login where username = '$username'OR nomor_imb = '$nomor_imb' OR nama_perusahaan = '$nama' ");

		$user = pg_num_rows($login);
		
		if($user >0){


			echo "<script language=javascript>alert('Username Sudah Dipakai');</script>";
			echo "<script language=javascript>document.location.href='../../login.php?page=daftar_perusahaan'</script>";
		
		}
		else{
			$query = pg_query($connection, "INSERT INTO login(username,pass,role_login) VALUES ('$username','$encPassword','perusahaan')");
				if($query){
					$query_ambil = pg_query($connection,"SELECT * FROM login where id_login IN(Select MAX(id_login)FROM login) AND role_login = 'perusahaan'");
					$hasilnya = pg_fetch_array($query_ambil);
					$id = $hasilnya['id_login'];
					$query = pg_query($connection,  "INSERT INTO perusahaan(id_login,id_perusahaan,nama_perusahaan,alamat_perusahaan,email_perusahaan,telp_perusahaan,nomor_imb) VALUES( 
						'$id',
						'$id',
						'$nama', 
						'$alamat',  
						'$email',  
						'$telepon',
						'$nomor_imb'
					)");
					if($query){	
						echo "<script language=javascript>alert('Registrasi Berhasil');</script>";			
						echo "<script language=javascript>document.location.href='../../login.php?page=login_perusahaan'</script>";
					}else{
						echo "<script language=javascript>alert('Registrasi Gagal');</script>";		
						echo "<script language=javascript>document.location.href='../../login.php?page=daftar_perusahaan'</script>";
					}
				}

			}
		
	}else{
		echo "<script language=javascript>alert('Password Tidak Cocok');</script>";
		echo "<script language=javascript>document.location.href='../../login.php?page=daftar_perusahaan'</script>";
	}
	
	pg_close($connection);



?>