<div id="i"> </div>
<button onclick="loadFirst();">First</button>
<div id="btnDiv"></div>
<script type="text/javascript">


function loadFirst(){
fetch('/getApi/40')
	.then(function(resp){
		return resp.json();
	})
	.then(function(data){
		console.log(data);
		document.getElementById('i').innerHTML=data['question_more'][0]['content'];
		// next=data['next']['id'];
		document.getElementById('btnDiv').innerHTML=`<button onclick="loadNext(`+data['next']['id']+`);">Next</button>`;
	})
}

function loadNext(n){
fetch('/api/questionApi/1/'+n)
	.then(function(resp){
		return resp.json();
	})
	.then(function(data){
		console.log(data);
		document.getElementById('i').innerHTML=data['questionnaire'][0]['content'];
		document.getElementById('btnDiv').innerHTML=`<button onclick="loadNext(`+data['next']['id']+`);">Next</button>`;
		
	})
}

	// console.log(next);
</script>

