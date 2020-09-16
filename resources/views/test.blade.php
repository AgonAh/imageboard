@admin
    User is admin
@else
    Not logged in
@endadmin


<script>

    // arr = [1,1,0,1];
//     var n=0;
//     for(i=0;i<arr.length;i++){
//         power = arr.length-(i+1);
//         if(arr[i]==1)
//             n+=Math.pow(2,power);
//     }
// console.log(n);

    <?php
    $str="This website is for losers LOL!";
    $arr1 = explode(" ",$str);
    $s='';
    for($i=0;$i<sizeof($arr1);$i++){
        $word = $arr1[$i];
        $revWord = strrev($word);
        $space=$i+1<sizeof($arr1)? ' ' : '';
        $s=$s.$revWord.$space;
    }
    echo $s;
    ?>







     // input = "kimik";
     // reverse = "";
     // for(i = input.length;i>=0;i--){
     //     reverse+=input.charAt(i);
     // }
     // not = input==reverse ? '' : 'not ';
     // console.log(input+' is '+not+'equal to '+reverse);


</script>



