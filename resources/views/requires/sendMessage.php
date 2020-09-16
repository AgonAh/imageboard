<?php
	require('pdo.php');
	session_start();
	$user=$_SESSION['username'];
	$message=$_POST['message'];
	$cId=$_POST['chatId'];
	$sql=$pdo->prepare('insert into messages(chatId,senderId,message) values (:cId,:user,:message)');
	$sql->execute(['user'=>$user,'message'=>$message,'cId'=>$cId]);
?>