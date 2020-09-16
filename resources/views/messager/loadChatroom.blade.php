<span id=friendId>{{$friend->name}}</span>
<span id=chatId>{{$chatId}}</span>
@foreach($messages->reverse() as $message)
    @if($message->user->id==$loggedUser->id)
        <div class="sMsg">
            <?php echo $message->message;?>
        </div>
    @else
        <div class="rMsg">
            <?php echo $message->message;?>
        </div>
    @endif
@endforeach
