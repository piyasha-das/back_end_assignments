<!Doctype html>
<head>
<style>
    #header{
        border:none;
        text-align:center;
    }
</style>
</head>
<body>
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["eng"])){
      echo "marks of English is required\n";
    }
    else{
      $eng = test_input($_POST["eng"]);
      if (!preg_match("/^[0-9]+$/",$eng)){
        $engErr = "Only Numbers are allowed in english field...\n";
        echo $engErr;
        $eng=" ";
      }
    }
  }
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["maths"])){
      echo "marks of maths is required\n";
    }
    else{
      $maths = test_input($_POST["maths"]);
      if (!preg_match("/^[0-9]+$/",$maths)){
        $mathsErr = "Only Numbers are allowed in maths field....\n";
        echo $mathsErr;
        $maths=" ";
      }
    }
  }
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["phy"])){
      echo "marks of Physics is required\n";
    }
    else{
      $phy = test_input($_POST["phy"]);
      if (!preg_match("/^[0-9]+$/",$phy)){
        $phyErr = "Only Numbers are allowed in physics field...\n";
        $phy=" ";
      }
    }
  }
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["bio"])){
      echo "marks of Biology is required\n";
    }
    else{
      $bio = test_input($_POST["bio"]);
      if (!preg_match("/^[0-9]+$/",$bio)){
        $bioErr = "Only Numbers are allowed in biology field...";
        echo $bioErr;
        $bio=" ";
      }
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
<table border="1">
    <th id="header">YOUR MARKS : </th>
    <tr>
         <td>subject: </td>
        <td> Your Marks: </td>
    </tr>
    <tr>
        <td>English</td>
        <td><?php echo $eng ?></td>
    </tr>
    <tr>
        <td>Maths</td>
        <td><?php echo $maths ?></td>
    </tr>
    <tr>
        <td>Physics</td>
        <td><?php echo $phy ?></td>
    </tr>
    <tr>
        <td>Biology</td>
        <td><?php echo $bio ?></td>
    </tr>
</table>
</body>
</html>