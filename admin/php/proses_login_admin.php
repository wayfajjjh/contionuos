
<?php
require_once '../../koneksi/koneksi.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$encPassword = md5($password);
	
	
	$query = pg_query($connection,"SELECT * FROM admin WHERE username = '$username' AND password='$password'");
	if($query){
		$thereIsAUser = pg_num_rows($query);
		if($thereIsAUser == 0){
			echo "<script language=javascript>alert('Username atau Password Tidak Cocok');</script>";
			echo "<script language=javascript>document.location.href='../../admin_login.php'</script>";
		}else{
			$result = pg_fetch_array($query);
			$login_id = $result['id_login_admin'];
			$login_role = $result['role_login_admin'];
			if($login_role === "admin") {
				$strQuery = "SELECT * FROM admin_profil WHERE id_profil = '$login_id'";
				$query = pg_query($connection, $strQuery);
				if($query) {
					$thereIsAnUser = pg_num_rows($query);
					if($thereIsAnUser == 0){
						echo "<script language=javascript>alert('Data Admin tidak Ditemukan');</script>";
						echo "<script language=javascript>document.location.href='../../admin_login.php'</script>";
					}else {
						$_SESSION['role_login_admin'] = $login_role;
						$result = pg_fetch_array($query);
						$_SESSION['id_profil'] = $result['id_profil'];
						$_SESSION['nama_admin'] = $result['nama_admin'];
						echo "<script language=javascript>alert('Berhasil Login');document.location.href='../../home_admin.php'</script>";
					}
				}else {
					echo "<script language=javascript>alert('Terjadi Kesalahan Saat Login');</script>";
					echo "<script language=javascript>document.location.href='../../admin_login.php'</script>";
				}
			}else {
				echo "<script language=javascript>alert('Anda Tidak Terdaftar ');</script>";
				echo "<script language=javascript>document.location.href='../../admin_login.php'</script>";
			}
		}
	}else {
		echo "<script language=javascript>alert('Terjadi Kesalahan');</script>";
		echo "<script language=javascript>document.location.href='../../admin_login.php'</script>";
	}
	pg_close($connection);
?>