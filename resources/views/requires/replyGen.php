<?php
			if(isset($postNo)){
				$replyQ=$pdo->prepare('select * from replies where postid=:pid order by replyDate asc');
				$replyQ->execute(['pid'=>$postNo]);
				$replies=$replyQ->fetchAll();
			}

			foreach ($replies as $reply) {
				$rId=$reply->replyId;
				if($reply->replyUser==null){
					$rUser='Anonymous';
				}
				else{
					$rUser=$reply->replyUser;
				}
				if($reply->replyPic==null){
					$rPic='';
				}
				else if(isset($postNo))
					$rPic='<a href="pics/'.$reply->replyPic.'"><img src="pics/'.$reply->replyPic.'"></a>';
				else
					$rPic='<a href="'.$reply->postId.'/pics/'.$reply->replyPic.'"><img src="'.$reply->postId.'/pics/'.$reply->replyPic.'"></a>';
				
				?>
				<div class="reply">
				<?php echo $rPic; ?>
				<section class="details"><?php echo $rUser.'/  Id:'.$reply->replyId.'/  '.$reply->replyDate;?></section>
				<div class="space"></div>
				<section class="replyText"><?php echo $reply->replyText; ?></section>
				<?php if(isset($_SESSION['isMod'])&&$_SESSION['isMod']){ echo '
			<form name="deleteReplyForm" action="#" method="POST" style="display:inline;">
			<input type="hidden" name="ridToDel" value="'.$rId.'">
			<input type="submit" value="delete">
			</form>
		' ;} ?>
				</div>
				<br>
				<?php
			}//end of reply loop
			?>