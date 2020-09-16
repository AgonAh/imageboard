<div class="messager"><!-- Message system -->
    <?php //include($pre."requires/friendReq.php");?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">

        function loadFriend(chatId){
            if(chatId!=null)
                $("#msgBody").load('/messager/loadfriend/'+chatId);
        };

        function loadSendBox(id){
            if(id!=null)
                $("#sendBox").load('/messager/sendbox/'+id);
        }

        function loadFriendList(){
            document.getElementById('msgBody').innerHTML='';
            $("#msgBody").load('/messager/friendlist');
            document.getElementById('sendBox').innerHTML='';
        };

        function sendMessage(){
            $.post("/messager/sendmessage",$('#sendMsgForm').serialize());
            msgField=document.getElementById('sendMsg').value='';
            loadFriend(document.getElementById('chatId').innerHTML);
        }



        $(function(){
            setInterval(function(){
                if(document.getElementById('chatId')!=null){
                    //$("#msgBody").load('/messager/loadfriend/'+document.getElementById('chatId').innerHTML);
                    loadFriend(document.getElementById('chatId').innerHTML);
                }
            },1000);

        });

    </script>
    <img src="/resources/msgIcon.png" class="msgIcon">
    <div class="friendsTab">
        <input type="button" name="friendsMsg" value="friends" class="msgTabs" onclick="loadFriendList()">
    </div>
    <div class="incognitoTab">
        <input type="button" name="anonMsg" value="anonymous" class="msgTabs">
    </div>
    <div class="roomsTab">
        <input type="button" name="roomsMsg" value="rooms" class="msgTabs">
    </div>
    <!-- 	<form class="groupsBox">
            <label>Groups:</label>
            <select class="messagerCBox">
                <option value="1">one</option>
                <option value="2">two</option>
                <option value="3">three</option>
            </select>
        </form> -->
    <div id="msgBody">
        <script type="text/javascript">
            loadFriendList();
        </script>
    </div>
    <div id="sendBox"></div>
</div>
