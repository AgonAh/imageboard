<?php
//start post generation
	// $stmt=$pdo->prepare('select * from posts where board=:pagename order by postDate desc limit 10');
	$stmt=$pdo->prepare('select * from posts where board=:pagename order by postDate desc limit 9');
	$stmt->execute(['pagename'=>$pageName]);
	$postList=$stmt->fetchAll();
	$postCount=count($postList);
	
	if(isset($_POST['submitPost'])) {
		$pTitle=$_POST['postTitle'];
		$pPic=$newFileName;
		$pText=$_POST['cPostText'];
		// $pUser=$_POST['userCheckBox'];
		if(isset($_POST['userCheckBox'])){
			$isUser=',user';
			$isUser2=','.$_SESSION['username'];
		}
		else{
			$isUser='';
			$isUser2='';
		}
		// echo 'insert into posts(board,title,postPic,postText'.$isUser.') values(:board,:title,:postPic,:postText'.$isUser2.')';
		$cPostSql=$pdo->prepare('insert into posts(board,title,postPic,postText'.$isUser.') values(:board,:title,:postPic,:postText'.$isUser2.');');
			$cPostSql->execute(['board'=>$pageName,'title'=>$pTitle,'postPic'=>$pPic,'postText'=>$pText]);
			$gennedPost=$pdo->prepare('SELECT LAST_INSERT_ID();');
			$gennedPost->execute();
			$gennedPostFetch=$gennedPost->fetch(PDO::FETCH_ASSOC);
			$postIdentity=$gennedPostFetch['LAST_INSERT_ID()'];
			
			//start postFolder creation
			mkdir($postIdentity);
			mkdir($postIdentity.'/pics');
			$file=fopen("$postIdentity/index.php",'w');
			$txt="<?php \$postNo=$postIdentity; require('../../../requires/post.php');?>";
			fwrite($file, $txt);
			fclose($file);
		}