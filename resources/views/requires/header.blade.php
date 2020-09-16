
<script type="text/javascript">var one = document.getElementsByTagName("BODY")[0].firstChild.remove();</script>
<div class="header">
		<a href="/"><img src="/resources/logo.png" class="logo"></a>

		<?php
		if(isset($pageName))
		 	echo "<h1>/".$pageName."/</h1>"
		 ?>

		<div class="profileList">
			<img src="/resources/profileLogo.png" class="profileLogo">
		<ul>
			<a href="/"><li>Home</li></a>
            <?php if(Auth::user()&&Auth::user()->role_id<3){ ?>
            <a href="/manageBoards"><li>Manage boards</li></a>
            <?php } ?>

        @guest
			<a href="/login"><li>Log in</li></a>
        @else

			<a href="/profile" id=profileLi><li>Profile</li></a>
                <form action="/logout" id="signoutForm"  method="POST">
                    @csrf
                    <a href="javascript:{}" onclick="document.getElementById('signoutForm').submit(); return false;"><li>Sign out</li></a>
                </form>

		@endguest


		</ul>
	</div>
	</div>
	<hr class="postHeader">
