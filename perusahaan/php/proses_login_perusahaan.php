
<?php
require_once '../../koneksi/koneksi.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$encPassword = md5($password);
	
	
	$query = pg_query($connection,"SELECT * FROM login WHERE username = '$username' AND pass='$encPassword'");
	if($query){
		$thereIsAUser = pg_num_rows($query);
		if($thereIsAUser == 0){
			echo "<script language=javascript>alert('Username atau Password Tidak Cocok');</script>";
			echo "<script language=javascript>document.location.href='../../login.php?page=login_perusahaan'</script>";
		}else{
			$result = pg_fetch_array($query);
			$login_id = $result['id_login'];
			$login_role = $result['role_login'];
			if($login_role === "perusahaan") {
				$strQuery = "SELECT * FROM perusahaan WHERE id_perusahaan = '$login_id'";
				$query = pg_query($connection, $strQuery);
				if($query) {
					$thereIsAnUser = pg_num_rows($query);
					if($thereIsAnUser == 0){
						echo "<script language=javascript>alert('Data Perusahaan tidak Ditemukan');</script>";
						echo "<script language=javascript>document.location.href='../../login.php?page=login_perusahaan'</script>";
					}else {
						$_SESSION['role_login'] = $login_role;
						$result = pg_fetch_array($query);
						$_SESSION['id_perusahaan'] = $result['id_perusahaan'];
						$_SESSION['nama_perusahaan'] = $result['nama_perusahaan'];
						echo "<script language=javascript>alert('Berhasil Login');document.location.href='../../home_perusahaan.php'</script>";
					}
				}else {
					echo "<script language=javascript>alert('Terjadi Kesalahan Saat Login');</script>";
					echo "<script language=javascript>document.location.href='../../login.php?page=login_perusahaan'</script>";
				}
			} else {
				echo "<script language=javascript>alert('Anda Tidak Terdaftar Sebagai Admin Perusahaan');</script>";
				echo "<script language=javascript>document.location.href='../../login.php?page=login_perusahaan'</script>";
			}
		}
	}else {
		echo "<script language=javascript>alert('Terjadi Kesalahan');</script>";
		echo "<script language=javascript>document.location.href='../../login.php?page=login_perusahaan'</script>";
	}
	pg_close($connection);
?>