<?php
	require('pdo.php');
	session_start();
	$pre=$_POST['pre'];
	if(isset($_SESSION['username'])){
	$getFriends=$pdo->prepare('select uc.uid,u.profilePic from userchatroom uc inner join user u on u.username=uc.uid where uc.uid != :user and uc.cid in (SELECT c.cid FROM `userchatroom` uc inner join chatroom c on uc.cid=c.cid WHERE uId=:user && c.type=1)');
			$getFriends->execute(['user'=>$_SESSION['username']]);
			$friends=$getFriends->fetchAll();
			?>
				<form id="msgNewFriend" method="POST">
				<label>Message new friend</label><br>
				<input type="text" name="friendName" placeholder="Friend username">
				<input type="submit" name="sendFriend" value="Send">
				</form>
			<?php
			foreach ($friends as $friend) {
		?>
		<div class="friend" onclick="loadFriend('<?php echo $friend->uid?>'),loadSendBox('<?php echo $friend->uid?>')">
			<img src="<?php echo $pre; ?>pics/profilePics/<?php echo $friend->profilePic ?>">
			<?php echo $friend->uid?>
		</div>
		<?php
			}
		}
		?>
