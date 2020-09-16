<?php 
session_start();
	require('pdo.php');

	$getCid=$pdo->prepare('select uc.cId from userchatroom uc INNER join chatroom c on uc.cId = c.cId where uId=:user1 && uc.cId in ( select uc.cId from userchatroom uc INNER join chatroom c on uc.cId = c.cId where uId=:user2)');
	$user1=$_SESSION['username'];
	$user2=htmlentities($_POST['friendId']); 
	$getCid->execute(['user1'=>$user1,'user2'=>$user2]);
	$cid=$getCid->fetch()->cId;
	?>
<div class="sendMsg">
		<textarea name="sendMsg" id="sendMsg"></textarea>
		<input type="hidden" name="chatId" id="chatId" value="<?php echo $cid?>">
		<input type="button" name="sendBtn" id="sendBtn" value="Send" onclick="sendMessage()">
	</div>
	<style type="text/css">
		.sendMsg{
	position: absolute;
	bottom: 0;
/*}*/
	</style>
	<script type="text/javascript">
		var input = document.getElementById("sendMsg");
		input.addEventListener("keyup", function(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
   			document.getElementById("sendBtn").click();
  		}

});

	</script>