<?php
	$host='localhost';
	$user='root';
	$sPassword='';
	$dbname='milkchan';

	$dsn='mysql:host='.$host.';dbname='.$dbname;
	$pdo=new PDO($dsn,$user,$sPassword);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
?>