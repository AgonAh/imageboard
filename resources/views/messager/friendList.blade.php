<form id="msgNewFriend" method="POST">
    <label>Message new friend</label><br>
    <input type="text" name="friendName" placeholder="Friend username">
    <input type="button" value="Send" onclick="newFriend()" >
</form>
<script>
    function newFriend(){
        $.post('/messager/newfriend',$('#msgNewFriend').serialize());
        loadFriendList();
    }
</script>

@foreach($rooms as $room)
    @foreach($room['user'] as $user)
        @if($user['id']!=$loggedUser->id)
{{--            {{$user}}--}}

            <div class="friend" onclick="loadFriend({{$room['id']}}),loadSendBox({{$room['id']}})">
{{--           TODO::return profile image after fixing upload   --}}
            {{$user['name']}}
            </div>
        @endif
    @endforeach
@endforeach
