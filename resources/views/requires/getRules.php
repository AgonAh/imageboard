<?php 
			echo '<div class="rules"><strong>RULES</strong><br>';
			$rulesSql=$pdo->prepare('select * from boards where board=:pageName');
			$rulesSql->execute(['pageName'=>$pageName]);
			$rules=$rulesSql->fetch();
			echo $rules->rules;
			echo '</div>'
		 ?>