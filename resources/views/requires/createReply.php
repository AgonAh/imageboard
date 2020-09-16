<?php
if(isset($_POST['submitReply'])){
		$replyText=$_POST['replyText'];
		$rpNo=$_POST['replyPostNo'];
		$replyPic=$newFileName;
		if(isset($_POST['replyUser'])){
			$replyUser=$_SESSION['username'];
		}
		else{
			$replyUser=null;
		}
		// if($replyPic==''){
		// 	$replyPic=null;
		// }
		$replySql=$pdo->prepare('insert into replies(postId,replyText,replyPic,replyUser) values(:postId,:replyText,:replyPic,:replyUser)');
		$replySql->execute(['postId'=>$rpNo,'replyText'=>$replyText,'replyPic'=>$replyPic,'replyUser'=>$replyUser]);
	}
	?>