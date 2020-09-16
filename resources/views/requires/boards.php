<div class="boardCont">
	<div class="boards">
		<?php 
			if(isset($postNo)){
				$pref='../../';
			}
			else{
				$pref='../';
			}
		 ?>
		<a href="<?php echo $pref; ?>b" id="bBoard"><h4>/b/</h4></a>
		<a href="<?php echo $pref; ?>wp" id="wpBoard"><h4>/wp/</h4></a>
	</div>
</div>