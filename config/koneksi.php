<?php
	date_default_timezone_set("Asia/jakarta");
	$Open = mysql_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
	$Koneksi = mysql_select_db("siperdis");
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}


		error_reporting(0);
?>