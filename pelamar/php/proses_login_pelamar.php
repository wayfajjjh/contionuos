
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
			echo "<script language=javascript>document.location.href='../../login.php?page=login_pelamar'</script>";
		}else{
			$result = pg_fetch_array($query);
			$login_id = $result['id_login'];
			$login_role = $result['role_login'];
			if($login_role === "pelamar") {
				$strQuery = "SELECT * FROM pelamar WHERE id_pelamar = '$login_id'";
				$query = pg_query($connection, $strQuery);
				if($query) {
					$thereIsAnUser = pg_num_rows($query);
					if($thereIsAnUser == 0){
						echo "<script language=javascript>alert('Data Pelamar tidak Ditemukan');</script>";
						echo "<script language=javascript>document.location.href='../../login.php?page=login_pelamar'</script>";
					}else {
						$_SESSION['role_login'] = $login_role;
						$result = pg_fetch_array($query);
						$_SESSION['id_pelamar'] = $result['id_pelamar'];
						$_SESSION['pelamar_nama_lengkap'] = $result['pelamar_nama_lengkap'];
						echo "<script language=javascript>alert('Berhasil Login');document.location.href='../../home_pelamar.php'</script>";
					}
				}else {
					echo "<script language=javascript>alert('Terjadi Kesalahan Saat Login');</script>";
					echo "<script language=javascript>document.location.href='../../login.php?page=login_pelamar'</script>";
				}
			}else {
				echo "<script language=javascript>alert('Anda Tidak Terdaftar ');</script>";
				echo "<script language=javascript>document.location.href='../../login.php?page=login_pelamar'</script>";
			}
		}
	}else {
		echo "<script language=javascript>alert('Terjadi Kesalahan');</script>";
		echo "<script language=javascript>document.location.href='../../login.php?page=login_pelamar'</script>";
	}
	pg_close($connection);
?>