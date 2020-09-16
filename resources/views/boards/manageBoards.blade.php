@include('templates.app')
<div class="container">
    <div style="margin:auto; width: 100%; margin-top: 10vh">
        <a href="/newBoard"><button type="button" class="btn btn-success " style="width: 100%; font-size: 2rem">Create new board!</button></a>
        <table class="table table-striped table-dark" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rules</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($boards as $board)

                    <tr id="row{{$board->id}}">
                        <th scope="row">{{$board->id}}</th>
                        <td class="truncate" id="rules{{$board->id}}">{{$board->rules}}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deleteB('{{$board->id}}')">Delete</button>
                            <span id="edit{{$board->id}}"><button type="button" class="btn btn-info"  onclick="editB('{{$board->id}}')">Edit</button></span>
                        </td>
                    </tr>

                @endforeach
            </tbody>

        </table>
    </div>

</div>

<form id="setRulesForm" style="display: none">
    @csrf
    <input type="text" id="setRulesFormText" name="rules" />
</form>

<script>
    function deleteB(id){
        document.getElementById("row"+id).style.color="red";
        $.post("/deleteBoard/"+id,$('#setRulesForm').serialize());

    }

    function editB(id){
        rulesEl = document.getElementById("rules"+id);
        text = rulesEl.innerHTML;
        rulesEl.innerHTML = `<TextArea id="TA`+id+`">`+text+`</TextArea>`;

        btnEl = document.getElementById("edit"+id);
        btnEl.innerHTML = `<button type="button" class="btn btn-info"  onclick="saveB('`+id+`')">Save</button>`
    }

    function saveB(id){
        newRulesEl =  document.getElementById("TA"+id);
        text = newRulesEl.value;
        document.getElementById("rules"+id).innerHTML = text;

        btnEl = document.getElementById("edit"+id);
        btnEl.innerHTML = `<button type="button" class="btn btn-info"  onclick="editB('`+id+`')">Edit</button>`;


        document.getElementById("setRulesFormText").value = text;
        $.post("/setRules/"+id,$('#setRulesForm').serialize());

    }
</script>

<style>
    table{
        display: table;
        text-align: center;
        border-collapse: collapse;
    }

    table, tr{
        border: 2px solid coral;
    }

    tr{
        height:20px
    }

    th, td{
        padding-top: 10px;
        padding-bottom: 10px;
    }

    tbody th{
        font-size: 2rem;
    }

    .truncate{
        max-width: 20vw;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    TextArea{
        width: 90%;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
