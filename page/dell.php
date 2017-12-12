<?php
	ob_start();
	session_start();
	date_default_timezone_set("Asia/Jakarta");
	include "../config/koneksi.php";

	if( ! isset($_SESSION["jenisuser"])) header("location:login.php?noakses");

	$querystring = trim($_GET["mau_delete"]);
	$explode = explode(',', $querystring);
	
	$nama_table = $explode[0] == 'pemeliharaan_biasa' ? "pemeliharaan" : $explode[0];
	$nama_table = strpos($explode[0], 'datamaster') !== false ? explode('-', $nama_table)[2] : $nama_table;
	$pk = $explode[1];
	$id = $explode[2];
	$loc = $explode[3];
	$id2 = !empty($_GET['id']) ? $_GET['id'] : null;
	
	
	$sql = "update $nama_table set status = 'tidak aktif' WHERE $pk=?";
	$sql = $db->prepare($sql);
	$sql->execute([$id]);
	
	
	if(strpos($explode[0], 'datamaster') !== false)
		header("location:../?$explode[0]");
	else
		header("location:../?$loc=$nama_table");
	die();
?>
