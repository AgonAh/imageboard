<div class="sendMsg">
    <form id="sendMsgForm" method="POST">
    <textarea name="sendMsg" id="sendMsg"></textarea>
    <input type="hidden" name="chatId" id="chatId" value="{{$room->id}}">
    <input type="button" name="sendBtn" id="sendBtn" value="Send" onclick="sendMessage()">
    </form>
</div>
<style type="text/css">
    .sendMsg{
        position: absolute;
        bottom: 0;
    }
</style>
<script type="text/javascript">
    var input = document.getElementById("sendMsg");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("sendBtn").click();
        }

    });

</script>
