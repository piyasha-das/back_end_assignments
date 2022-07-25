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
            <table style="border:1px solid black;margin-left:auto;margin-right:auto" class="table">
                <th>
                    Profile history
                </th>
                <tr>
                    <td>Date</td>
                    <td>Download Link</td>
                </tr>
                <tr>
                    <td><?php echo $_SESSION['date']; ?></td>
                    <td><a href="<?php echo $_SESSION['link']; ?>">Download Resume</a></td>
                </tr>
            </table>
        </div>
    </body>
</html>