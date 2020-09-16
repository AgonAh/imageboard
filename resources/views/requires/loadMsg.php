<?php
	
	$mStmt1=$pdo->prepare('select * from chatRoom c inner join userchatroom uc on c.cId=u.cId where uc.uid=:uid && c.type=1');
	$mStmt1->execute(['uid'=>_$SESSION['username']]);
	
	$mStmt2=$pdo->prepare('select * from chatRoom c inner join userchatroom uc on c.cId=u.cId where uc.uid=123 && c.type=1');
	// $mStmt2->execute(['uid2'=>123]);

?>