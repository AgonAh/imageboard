@include('templates/app')
<script>
    isLogged =<?= Auth::user() ? 'true' : 'false' ?>;
    console.log(isLogged);
</script>
<?php $pageName = $post['board'] ?>
<div class="container">
<div class="postContainer" id={{$post['id']}}>
    <div class="post"><br>
    <a href="/storage/pics/{{$post['postPic']}}"><img src="/storage/pics/{{$post['postPic']}}" class="postImg"></a>

    <section class="title">{{$post['title']}}</section>
    <!-- <section class="details"><?php// echo "   /". $user."   /".$post->postDate."   /no:".$post->id ?></section> -->
    <section class="details">/{{$post['created_at']}}   /no: {{$post['id']}}</section>
    <div class="space"></div>
    <section class="opText">{{$post['postText']}}</section><br>
    <!-- <section class="viewMore"><?php// echo $picRepliesCount.' pics ommited, '. $allRepliesCount.' replies'?>, <a href=<?php// echo'"'.$thisid.'"' ?>>click here </a> to view</section> -->
    <section class="viewMore">{{count($replies)}} replies, <a href="/{{$post['id']}}">click here </a> to view</section>
    {{Form::open(['action'=>'BoardsController@store','enctype'=>'multipart/form-data'])}}
    <div class="replyBtn" id=<?php echo '"rbtn'.$post['id'].'"'?>>


        <input type="button" name="replyBtn" value="Reply" onclick="replyBtnPushed({{$post['id']}})">
        <?php /*if($isMod){ echo '
        <form name="deletePostForm" action="#" method="POST" style="display:inline;">
        <input type="hidden" name="idToDel" value="'.$thisid.'">
        <input type="submit" value="delete">
        </form>
    ' ;} */?>
    </div>
    <input type="hidden" name="board" value="{{$pageName}}">
    <input type="hidden" name="id" value="{{$post['id']}}">
    </form>
    {{-- //Reply generation --}}
        {{-- // require('../../requires/replyGen.php'); --}}
        @foreach($replies as $reply)
                <?php
                    $rId=$reply['replyId'];
                    if($reply['replyUser']==null){
                        $rUser='Anonymous';
                    }
                    else{
                        $rUser=$reply['replyUser'];
                    }
                    if($reply['replyPic']==null){
                        $rPic='';
                    }
                    else
                        $rPic='<a href="/storage/pics/'.$reply['replyPic'].'"><img src="/storage/pics/'.$reply->replyPic.'"></a>';
				?>
				<div class="reply">
				{!!$rPic!!}
                <section class="details">Id:{{$reply['replyId']}}/  {{$reply['created_at']}}</section>
				<div class="space"></div>
                <section class="replyText">{{$reply['replyText']}}</section>
				<?php /*if(isset($_SESSION['isMod'])&&$_SESSION['isMod']){ echo '
			<form name="deleteReplyForm" action="#" method="POST" style="display:inline;">
			<input type="hidden" name="ridToDel" value="'.$rId.'">
			<input type="submit" value="delete">
			</form>
		' ;} */?>
				</div>
                <br>
                @endforeach

</div>
 </div>
</div>
