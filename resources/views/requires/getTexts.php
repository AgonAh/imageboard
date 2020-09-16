<?php
	session_start();
	require('pdo.php');

	$getCid=$pdo->prepare('select uc.cId from userchatroom uc INNER join chatroom c on uc.cId = c.cId where uId=:user1 && uc.cId in ( select uc.cId from userchatroom uc INNER join chatroom c on uc.cId = c.cId where uId=:user2)');
	$user1=$_SESSION['username'];
	$user2=htmlentities($_POST['friendId']); 
	$getCid->execute(['user1'=>$user1,'user2'=>$user2]);
	$cid=$getCid->fetch()->cId;
	$getTexts=$pdo->prepare('select * from messages where chatId = :cid order by timeSent asc limit 10');
	$getTexts->execute(['cid'=>$cid]);
	$texts=$getTexts->fetchAll();
	// print_r($texts);
	 echo '<div id=friendId>'.$user2.'</div>';
	foreach ($texts as $text) {
	if($text->senderId==$user1){
?>
			<div class="sMsg">
				
				<?php echo $text->message; ?>
			</div>
		<?php 
		}
		else{
			?>
	 <div class="rMsg">
	 		<?php echo $text->message; ?>
	 </div>
	<?php 
		}
	}
	?>