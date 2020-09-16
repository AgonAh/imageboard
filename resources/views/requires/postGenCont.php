<div class="container">	
		<?php require('../../requires/getRules.php'); ?>
	<div id="createPost">
		<button id="cpb" onclick="cpbClicked()">Create post</button>
	</div>
	<div class="posts">
<?php
	if(isset($_SESSION['isMod'])&&$_SESSION['isMod']==1)
		$isMod=true;
	else
		$isMod=false;

		//cont post generation
			foreach ($postList as $post) {
			if($post->user==null){
				$user='Anonymous';
			}
			else{
				$user=$post->user;
			}
			$replyQ=$pdo->prepare('select * from replies where postid=:pid order by replyDate desc limit 5');
			$replyQ->execute(['pid'=>$post->pid]);
			$replies=$replyQ->fetchAll();

			$picReplies=$pdo->prepare('select * from replies r  where postid=:pid && replyPic IS NOT NULL');
			$picReplies->execute(['pid'=>$post->pid]);
			$picRepliesCount=count($picReplies->fetchAll());
			$allReplies=$pdo->prepare('select * from replies r  where postid=:pid');
			$allReplies->execute(['pid'=>$post->pid]);
			$allRepliesCount=count($allReplies->fetchAll());
			$thisPid=$post->pid;
		?>
		<!-- Post content -->
		<div class="postContainer" id=<?php echo 'p'.$post->pid ?>>
		<div class="post"><br>
		<a href=<?php echo '"../../pics/'.$post->postPic.'"'?>><img src=<?php echo '"../../pics/'.$post->postPic.'"'?> class="postImg"></a>
		<section class="title"><?php echo $post->title?></section>
		<section class="details"><?php echo "   /". $user."   /".$post->postDate."   /no:".$post->pid ?></section>
		<div class="space"></div>
		<section class="opText"><?php echo $post->postText ?></section><br>
		<section class="viewMore"><?php echo $picRepliesCount.' pics ommited, '. $allRepliesCount.' replies'?>, <a href=<?php echo'"'.$thisPid.'"' ?>>click here </a> to view</section>
		<div class="replyBtn" id=<?php echo '"rbtn'.$post->pid.'"'?>>
			<input type="button" name="replyBtn" value="Reply" onclick=<?php echo '"replyBtnPushed('.$post->pid.')"' ?>>
			<?php if($isMod){ echo '
			<form name="deletePostForm" action="#" method="POST" style="display:inline;">
			<input type="hidden" name="pidToDel" value="'.$thisPid.'">
			<input type="submit" value="delete">
			</form>
		' ;} ?>
		</div>
		<?php
		//Reply generation
			require('../../requires/replyGen.php');
		?>
	</div>
	 </div> 
		<?php
			} //end of post loop

			echo '<script type="text/javascript">
		board=document.getElementById("'.$pageName.'Board");
		board.setAttribute("class","active");
	</script>'
		?>