<?php
	$pre='../../../';
	session_start();
 	require($pre.'requires/pdo.php');
 	require($pre.'requires/upload.php');
 	require($pre.'requires/adminP.php');
 	require('../../../requires/createReply.php');
 	$stmt=$pdo->prepare('select * from posts where pid=:pid');
 	$stmt->execute(['pid'=>$postNo]);
 	$thisPost=$stmt->fetch();
 	if($thisPost->user==null){
				$user='Anonymous';
			}
			else{
				$user=$thisPost->user;
			}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Milkchan/<?php echo $postNo; ?></title>
	<link rel="stylesheet" type="text/css" href="../../../style.css">
	<link rel="icon" href="../../../favicon.png" type="image/x-icon"/>
</head>
<body>
	<?php
		require('../../../requires/header.php');
		require('../../../requires/messager.php');
		require('../../../requires/boards.php');
		?>
		<hr class="postHeader" style="margin-top: 110px;">
		<div class="inPostContainer">
			<div class="post"><br>
			<a href=<?php echo '"../../../pics/'.$thisPost->postPic.'"'?>><img src=<?php echo '"../../../pics/'.$thisPost->postPic.'"'?> class="postImg"></a>
			<section class="title"><?php echo $thisPost->title?></section>
			<section class="details"><?php echo "   /". $user."   /".$thisPost->postDate."   /no:".$thisPost->pid ?></section>
			<div class="space"></div>
			<section class="opText"><?php echo $thisPost->postText ?></section><br>
			<div class="replyBtn" id=<?php echo '"rbtn'.$thisPost->pid.'"'?>>
				<input type="button" name="replyBtn" value="Reply" onclick=<?php echo '"replyBtnPushed('.$thisPost->pid.')"' ?>>
			</div>
			</div>
		

		<?php
		require('../../../requires/replyGen.php');
	?>
</div>

	<script type="text/javascript" src="../../../script.js"></script>
	<script type="text/javascript" src="../../../pristine.min.js"></script>
</body>
</html>
