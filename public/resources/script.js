//Generate post creation form

function cpbClicked(){
    cpb=document.getElementById('cpb');
    if(isLogged){
        anon=`Show username:<input type="checkbox" name="userCheckBox" id="userCheckBox">`;
    }
    else{
        anon='';
    }
        inn=`<div id="createPostForm">`+
            `<input type="file" id="rinputFile" required name="inputFile">`+
            `<input type="text" placeholder="Title" id="postTitle" name="title">`+
            anon+
            `<input type="hidden" name="type" value="post">`+
            `<textarea class="cPostText" id="cPostText" name="cPostText" required style="width:100%;height:80px;resize:none;"></textarea>`+
            `<input type="submit" name="submitPost" value="Submit"></div>`;
        cp=document.getElementById('createPost');
        cp.innerHTML=inn;
}




function replyBtnPushed(btnId){
    rbtn=document.getElementById(`rbtn${btnId}`);
    if(isLogged){
        anon=`Show username:<input type="checkbox" name="userCheckBox" id="userCheckBox">`;
    }
    else{
        anon='';
    }
        inn=`<div id="createReplyForm">`+
            `<input type="file" name="inputFile" id="replyInputPic">`+
            anon+
            `<input type="hidden" name="type" value="reply">`+
            '<br>'+
    		`<textarea id="replyText" name="replyText" style="display:inline-block;width:50%;height:80px;resize:none;"></textarea><br>`+
    		`<input type='hidden' name='replyPostNo' value=`+btnId+`>`+
            `<input type="submit" name="submitReply" value="Submit" ></div>`;
                rbtn.innerHTML=inn;
}
//end of reply


//
// function signClick(){
//     span=document.getElementById('emailSpan');
//     span.innerHTML='<input type="email" name="email" placeholder="Email(Optional)"><br>';
//     btn=document.getElementById('logSignBtn');
//     btn.setAttribute('onClick','logClick()');
//     btn.innerHTML='Log in';
//
// }
//
// function logClick(){
//     span=document.getElementById('emailSpan');
//     span.innerHTML='';
//     btn=document.getElementById('logSignBtn');
//     btn.setAttribute('onClick','signClick()');
//     btn.innerHTML='Sign up';
// }
//
//
