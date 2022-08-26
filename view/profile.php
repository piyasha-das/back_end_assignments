<?php
    // require '../controller/index3.php';
    // require '/controller/pdf.php';
    session_start();
    // include 'seturl.php';
    // set_url("/profile");
    if(!isset($_SESSION['emailid'])){
        header('location:/register');
    }
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="/view/style.css">
    </head>
    <body>
        <div class="full-page">
            <?php 
            $enjoy=$_SESSION['datee'];
                $protocol="http://";
                $hostname=$_SERVER['HTTP_HOST'];
                $sid=$_SESSION['emailid']; 
                $directory="./controller/pdfs/".$sid."/";
                $file=glob($directory."*");
                $filescount=0;
                if($file){
                    $filescount=count($file);
                }
            ?> 
            <table style="border:1px solid black;margin-left:auto;margin-right:auto" class="table">
                <th>
                    Profile history
                </th>
                <tr>
                    <td>Date and time</td>
                    <td>Download Link</td>
                </tr>
                <?php for($i=0;$i<$filescount;$i++) { ?>
                    <tr>
                        <td><?php echo date ("F d Y H:i:s.", filemtime($file[$i])); ?></td>
                        <td><a href="<?php echo $file[$i]; ?>">Download Resume</a></td>
                    </tr>
                <?php 
               
             }     
            ?>
            </table>
        </div>
    </body>
</html>