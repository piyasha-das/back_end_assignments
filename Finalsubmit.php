<!Doctype html>
<head>
    <style>
        *{
            margin:10px;
        }
    </style>
</head>
<body>
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["fname"])){
      echo "first name is required\n";
    }
    else{
      $fname = test_input($_POST["fname"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
        $fnameErr = "Only letters and white space allowed";
        $fname=" ";
      }
    }
  }

  if($_SERVER["REQUEST_METHOD"]== "POST"){
    if(empty($_POST["lname"])){
      echo "last name is required";
    }
    else{
      $lname=test_input($_POST["lname"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed";
        $lname=" ";
      }
    }
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    if( isset($_FILES['image']) ) { 
           
        $file_name=$_FILES['image']['name']; 
    
        $file_tmp=$_FILES['image']['tmp_name'];
     
        
    $val=move_uploaded_file($file_tmp, "uploads/".$file_name);
    $image=$_FILES['image']['name'];
    $img="uploads/".$image;
    echo'<img src="'.$img.'">';
    }
?>
<div id="box">
    <?php 
        if($_SERVER["REQUEST_METHOD"]== "POST"){
            echo str_repeat('&nbsp;', 5);
            $name = "hello " . $fname ."  ".$lname;
            echo $name;
            }
    ?>
</div>
<?php
    $info=$_POST["description"];
    $arr=explode("\n",$info);
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>";
    echo "subject";
    echo "</td>";
    
    echo "<td>";
    echo "Marks";
    echo "</td>";
    echo "</tr>";
    foreach ($arr as $val){
        $var=explode("|",$val);
        echo "<tr>";
        for($i=0;$i<2;$i++){
            echo "<td>";
            echo $var[$i];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["phoneno"])){
          echo "Mobile number is required\n";
        }
        else{
          $phoneno= test_input($_POST["phoneno"]);
        }
      }
      if($_SERVER["REQUEST_METHOD"]== "POST"){
        echo "Your mobile number is: ". $phoneno;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["emailid"])){
          echo "emailid is required\n";
        }
        else{
          $emailid = test_input($_POST["emailid"]);
          if(filter_var($emailid,FILTER_VALIDATE_EMAIL)==false){
            exit("Your mail id is in invalid format");
          }
          echo "<br>"."Your mail id is in valid format";
        }
      }
      if($_SERVER["REQUEST_METHOD"]== "POST"){
        echo " ". "&"."Your emailid is: ". $emailid;
        }


    // set API Access Key
    $access_key = 'T8oRDpYwD4Ova37VBMuYe5w1svYecMN8';

    // set email address
    $email_address = $_POST["emailid"];
    $header = [
        'apikey: ' . $access_key,
    ];

    // Initialize CURL:
    $url = "https://api.apilayer.com/email_verification/" . $email_address;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);
    // Decode JSON response:
    $validationResult = json_decode($json);
    // var_dump($validationResult);
    // echo $validationResult->is_deliverable;
    if($validationResult->is_deliverable==1 and $validationResult->can_connect_smtp==1){
        echo "Your mail id exists.";
    }
    else{
        echo "Your mail id does not exist.";
    } 
?>
</body>
</html>