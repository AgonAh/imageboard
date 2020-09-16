<?php
	if(isset($_POST['submitPost'])||isset($_POST['submitReply'])){
		$newFileName=null;
		if($_FILES['inputFile']['name']!=''){
		$file=$_FILES['inputFile'];
		//naming start
		$fileName=$_FILES['inputFile']['name'];
		$fileExp=explode('.', $file['name']);
		$fileExt=strtolower(end($fileExp));
		//naming end
		$allowed=array('jpg','jpeg','png','mp4','webm');
		if(in_array($fileExt, $allowed)){
			if($file['error']==0){
				$newFileName=uniqid('',false).'.'.$fileExt;
				if(isset($postNo)){
					$fileDest='pics/'.$newFileName;
				}
				else if(isset($_POST['submitReply'])){
					$fileDest=$_POST['replyPostNo'].'/pics/'.$newFileName;
				}
				else{
					$fileDest='../../pics/'.$newFileName;
				}
				move_uploaded_file($file['tmp_name'], $fileDest);

			}
			else{
				echo "There was an error ".$file['error']." uploading your file";
			}
		}
		else{
			echo 'You cannot upload this type of file';
		}
	}
}
?>