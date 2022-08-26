<!Doctype html>
<body>
<?php
    
    $info=$_POST["description"];
    // $info_copy= str_replace("\n","<br>",$info);
    echo $info;
    $arr=explode("\n",$info);
    print_r($arr);
    // print_r($arr);
    // $length=count($arr);
    // for($x = 0; $x < $length; $x++) {
    //     echo "<br>";
    //     // echo $arr[$x];
    //     separator($arr[$x]);
    //     // echo $arr[$x];
    //     // var_dump($arr[$x]);
    //     // echo $arr[$x];
    //     // echo explode("|", $arr[$x]);
    //     echo "<br>";
    // }
    // var_dump($arr);
    // function separator($arr){
    //     $y=0;
    //     $sub=[];
    //     $marks=[];
    //     // $length=count($arr);
    //     while($arr[$y]!=="|"){
    //         // $sub[$y]= clone $new[$y];
    //         // echo $sub[$y];
    //         // $y=$y + 1;
    //         echo $arr[$y];
    //         $y++;
    //     }
    //     $y++;
    //     echo str_repeat('&nbsp;', 5). $arr[$y];
    //     $y++;
    //     echo $arr[$y];

        // $y++;
        // for($i=$y;$i<=$length;$i++){
        //     echo $arr[$i];
        // }
    




        // while($arr[$y]!="\n"){
        //     // $marks[$y]=clone $arr[$y];
        //     // echo $marks[$y];
        //     // echo $arr[$y];


        //     $y = $y + 1;
        // }
        // // echo $sub;
        // // echo $marks;
     $n=count($arr);
    echo "<table border='1'>";
    echo "<tr>";
    echo   "<td>";
    echo "subject";
    echo "</td>";
    
    echo   "<td>";
    echo "Marks";
    echo "</td>";
    echo "</tr>";
    foreach ($arr as $val){
        $var=explode("|",$val);
        var_dump($var);
        echo "<tr>";
        for($i=0;$i<2;$i++){
            echo "<td>";
            echo $var[$i];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>
