<?php 
    // Konfigurasi database anda
    global $connection;
	
	$host = "localhost";
    $dbname = "aplog_ppn";
    $username = "root";
    $password = "tabs";
	
	/* $connection = mysql_connect($host,$username,$password) or die(mysql_error());
	mysql_select_db($dbname, $connection)or die (mysql_error());
	 */
	
	//$connection = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    try {
        // Buat Object PDO baru dan simpan ke variable $db
        $db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        // Mengatur Error Mode di PDO untuk segera menampilkan exception ketika ada kesalahan
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception){
        die("Connection error: " . $exception->getMessage());
    }
?>