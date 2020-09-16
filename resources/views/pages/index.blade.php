@include('templates/app')
	<div id="boardBox">
		<div class="boardList">
			<ul>
                @foreach($boards as $board)
                <a href="boards/{{$board->id}}"><li>/{{$board->id}}/</li></a>
                @endforeach
			</ul>
		</div>
	</div>
