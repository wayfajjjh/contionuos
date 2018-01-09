<?php 
$conn_string = "host=localhost port=5432 dbname=ayokerja user=postgres password='b4r4th4l1m'";

$connection = pg_connect($conn_string);
$login = pg_query($connection,"SELECT * FROM login");
$user = pg_num_rows($login);

$login1 = pg_query($connection,"SELECT * FROM login where id_login = 27 ");
$user1 = pg_fetch_array($login1);
$usernya = $user1['username'];

$login2 = pg_query($connection,"SELECT * FROM login where username = 'azz'");
$user2 = pg_fetch_array($login2);
$usernya1 = $user2['pass'];

$login3 = pg_query($connection,"SELECT * FROM perusahaan where nama_perusahaan = 'afif'");
$user3 = pg_fetch_array($login3);
$usernya2 = $user3['nomor_imb'];





?>