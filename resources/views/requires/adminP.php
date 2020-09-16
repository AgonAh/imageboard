<?php
	if(isset($_POST['pidToDel'])){
		if($_SESSION['isMod']==1){
			$pidToDel=$_POST['pidToDel'];
			$deletePSql=$pdo->prepare('delete from posts where pid=:pid');
			$deletePSql->execute(['pid'=>$pidToDel]);
		}
	}

	if(isset($_POST['ridToDel'])){
		if($_SESSION['isMod']==1){
			$ridToDel=$_POST['ridToDel'];
			$deletePSql=$pdo->prepare('delete from replies where replyId=:rid');
			$deletePSql->execute(['rid'=>$ridToDel]);
		}
	}
?>