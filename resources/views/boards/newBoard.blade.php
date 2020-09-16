@include('templates.app')
<div class="container">
    <div style="margin:auto; width: 80%; margin-top: 20vh">
        <form method="POST" action="/newBoard" class="ml-auto">
            @csrf
            <div class="form-group">
                <label>Board name:</label>
                <input type="text" class="form-control" placeholder="Enter board name" name="name"/>
            </div>

{{--            <div class="form-group">--}}
{{--                <label>Board description:</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter board description" name="description"/>--}}
{{--            </div>--}}

            <div class="form-group">
                <label>Board rules:</label><br />
                <textarea placeholder="Enter board rules" class="form-control" style="height: 20vh" name="rules"></textarea>
            </div>
            <div class="form-group" >
                <input type="submit" class="form-control" value="Create board" />
            </div>
        </form>
    </div>

</div>
