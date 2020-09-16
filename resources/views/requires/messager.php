<div class="messager"><!-- Message system -->
	<?php include($pre."requires/friendReq.php");?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		function loadFriend(friendId){
			if(friendId!=null)
			$("#msgBody").load('<?php echo $pre?>requires/getTexts.php',{
				friendId: friendId
			});
		};

		function loadSendBox(friendId){
			if(friendId!=null)
			$("#sendBox").load('<?php echo $pre?>requires/getSendBox.php',{
				friendId: friendId
			});
		}

		function loadFriendList(pre){

			$("#msgBody").load('<?php echo $pre?>requires/getFriendList.php',{pre:pre});
		};
		function sendMessage(){
			$.post("<?php echo $pre?>requires/sendMessage.php",{
				message: document.getElementById('sendMsg').value,
				chatId: document.getElementById('chatId').value
			});
			msgField=document.getElementById('sendMsg').value='';
			loadFriend(document.getElementById('friendId').innerHTML);
		}

		

		$(function(){
			setInterval(function(){
				if(document.getElementById('friendId')!=null){
					console.log(document.getElementById('friendId').innerHTML);
					console.log(document.getElementById('friendId').innerHTML);
					friendId=document.getElementById('friendId').innerHTML;
					$("#msgBody").load('<?php echo $pre?>requires/getTexts.php',{
					friendId: friendId
					});

				}
			},1000);
			
		});
		
	</script>
	<img src="<?php echo $pre; ?>msgIcon.png" class="msgIcon">
	<div class="friendsTab">
		<input type="button" name="friendsMsg" value="friends" class="msgTabs" onclick="loadFriendList('<?php echo $pre ?>')">
	</div>
	<div class="incognitoTab">
		<input type="button" name="anonMsg" value="anonymous" class="msgTabs">
	</div>
	<div class="roomsTab">
		<input type="button" name="roomsMsg" value="rooms" class="msgTabs">
	</div>
<!-- 	<form class="groupsBox">
		<label>Groups:</label>
		<select class="messagerCBox">
			<option value="1">one</option>
			<option value="2">two</option>
			<option value="3">three</option>
		</select>
	</form> -->
	<div id="msgBody">
		<script type="text/javascript">
			loadFriendList('<?php echo $pre ?>');
		</script>
	</div>
    <div id="sendBox"></div>

	</div>
