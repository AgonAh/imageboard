<?php
    use App\Replies;
?>
<script>
    isLogged =<?= Auth::user() ? 'true' : 'false' ?>;
    console.log(isLogged);
</script>
@include('templates/app')
        <div class="container">

            <div class="posts">

                {{Form::open(['action'=>'BoardsController@store','enctype'=>'multipart/form-data'])}}
                <div id="createPost">
                    <button id="cpb" onclick="cpbClicked()">Create post</button>

                </div>
                <input type="hidden" name="board" value="{{$pageName}}">
                </form>
@foreach($posts as $post)
<?php
$r = $post->replies();
$replies = $r->orderBy('id','DESC')->paginate(6);
$replyCount=$r->count();

?>
<div class="postContainer" id=<?php echo 'p'.$post->id ?>>

    <div class="post"><br>
        <div style="width:70vw; height:1px;"></div>
    <a href="/storage/pics/{{$post['postPic']}}"><img src="/storage/pics/{{$post['postPic']}}" class="postImg"></a>

    <section class="title">{{$post['title']}}</section>
    <section class="details">
        /{{$post['created_at']}}
        /no: {{$post['id']}}
        /{{$post->user ? $post->user : 'Anon'}}
    </section>
    <div class="space"></div>
    <section class="opText">{{$post['postText']}}</section><br>
    <section class="viewMore">{{$replyCount}} replies, <a href="/{{$post['id']}}">click here </a> to view</section>
        <?php if(Auth::user()&&Auth::user()->role_id<3){ ?>
        <form name="deletePostForm" action="/boards/{{$post->id}}" method="POST" style="display:inline;">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" value="delete">

        </form>
        <?php } ?>
    {{Form::open(['action'=>'BoardsController@store','enctype'=>'multipart/form-data'])}}
    <div class="replyBtn" id=<?php echo '"rbtn'.$post['id'].'"'?>>


        <input type="button" name="replyBtn" value="Reply" onclick=<?php echo '"replyBtnPushed('.$post['id'].')"' ?>>

    </div>
    <input type="hidden" name="board" value="{{$pageName}}">
    <input type="hidden" name="id" value="{{$post['id']}}">
    </form>

    {{-- //Reply generation --}}
        @foreach($replies as $reply)
                <?php
                    $rId=$reply['id'];
                    if($reply->user_id==null){
                        $rUser='Anon';
                    }
                    else{
                        $rUser=$reply->user_id;
                    }
                    if($reply['replyPic']==null){
                        $rPic='';
                    }
                    else
                        $rPic='<a href="/storage/pics/'.$reply['replyPic'].'"><img src="/storage/pics/'.$reply->replyPic.'"></a>';
				?>
				<div class="reply">
				{!!$rPic!!}
                <section class="details">
                    Id:{{$reply['id']}}
                    /{{$reply['created_at']}}
                    /{{$rUser}}
                </section>
				    <div class="space"></div>
                <section class="replyText">{{$reply['replyText']}}</section>
        <?php if(Auth::user()&&Auth::user()->role_id<3){ ?>
			<form name="deleteReplyForm" action="/boards/deleteReply" method="POST" style="display:inline;">
                @csrf
			<input type="hidden" name="rid" value="{{$reply->id}}">
			<input type="submit" value="delete">
                {{method_field('DELETE')}}
			</form>
                    <?php } ?>

				</div>
                <br>
                @endforeach

</div>
 </div>
 @endforeach

                {{ $posts->links() }}

            <?php
        echo '<script type="text/javascript">
    board=document.getElementById("'.$pageName.'Board");
    board.setAttribute("class","active");
</script>'
    ?>
</div>
</div>




<script type="text/javascript" src="/resources/script.js"></script>
<script>document.getElementsByClassName("pagination")[0].style.justifyContent="center";</script>
