<?php
require_once '../../koneksi/koneksi.php';

	error_reporting(0);
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['konfirmasi_password'];
		
	
	if($password == $confirm_password){
		$encPassword = md5($password);

		$login = pg_query($connection,"SELECT * FROM pelamar inner join login on pelamar.id_login = login.id_login where username = '$username'OR email = '$email'  ");

		$user = pg_num_rows($login);
		
		if($user >0){


			echo "<script language=javascript>alert('Username / Email Sudah Dipakai');</script>";
			echo "<script language=javascript>document.location.href='../../login.php?page=daftar_pelamar'</script>";
		
		}
		else{
			$query = pg_query($connection, "INSERT INTO login(username,pass,role_login) VALUES ('$username','$encPassword','pelamar')");
				if($query){
					$query_ambil = pg_query($connection,"SELECT * FROM login where id_login IN(Select MAX(id_login)FROM login) AND role_login = 'pelamar'");
					$hasilnya = pg_fetch_array($query_ambil);
					$id = $hasilnya['id_login'];
					$query = pg_query($connection,  "INSERT INTO pelamar(id_login,id_pelamar,pelamar_nama_lengkap,pelamar_alamat,email) VALUES( 
						'$id',
						'$id',
						'$nama', 
						'$alamat',  
						'$email'  
						
					)");
					if($query){	
						echo "<script language=javascript>alert('Registrasi Berhasil');</script>";			
						echo "<script language=javascript>document.location.href='../../login.php?page=login_pelamar'</script>";
					}else{
						echo "<script language=javascript>alert('Registrasi Gagal');</script>";		
						echo "<script language=javascript>document.location.href='../../login.php?page=daftar_pelamar'</script>";
					}
				}

			}
		
	}else{
		echo "<script language=javascript>alert('Password Tidak Cocok');</script>";
		echo "<script language=javascript>document.location.href='../../login.php?page=daftar_pelamar'</script>";
	}
	
	pg_close($connection);



?>