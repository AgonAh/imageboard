<?php
	if(isset($_POST['submitReply'])){
		$file=$_FILES['inputFile'];
		$fileName=$_FILES['inputFile']['name'];
		$fileExp=explode('.', $file['name']);
		$fileExt=strtolower(end($fileExp));
		$allowed=array('jpg','jpeg','png','mp4','webm');
		if(in_array($fileExt, $allowed)){
			if($file['error']==0){
				$newFileName=uniqid('',false).'.'.$fileExt;
				$fileDest='pics/'.$newFileName;
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
?>