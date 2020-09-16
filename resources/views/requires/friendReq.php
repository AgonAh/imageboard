<?php
	if(isset($_POST['friendName'])){
		$checkFriend = $pdo->prepare("select * from user where username=:friendName");
		$checkFriend->execute(['friendName'=>$_POST['friendName']]);
		$friend=$checkFriend->fetch();
		if($friend!=null){
			$createChatroom=$pdo->prepare("insert into chatroom(type) values (1);");
			$createChatroom->execute();
			$getcid = $pdo->prepare("select LAST_INSERT_ID();");
			$getcid->execute();
			$chatroomId=$getcid->fetch(PDO::FETCH_ASSOC);
			$cid=$chatroomId['LAST_INSERT_ID()'];

			$createUC=$pdo->prepare("insert into userchatroom(uid,cid) values(:user1,:cid),(:user2,:cid)");
			$createUC->execute(['user1'=>$_SESSION['username'],'user2'=>$_POST['friendName'],'cid'=>$cid]);
		}
	}
?>