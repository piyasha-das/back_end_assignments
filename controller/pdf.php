<?php
    // require '/var/www/Files/view/resume.php';
    // session_start();
    require ("/usr/share/fpdf/fpdf.php");

    if(isset($_POST['submit'])){
        session_start();
        $name=$_POST['name'];
        $dob=$_POST['dob'];
        // $image=$_POST['image'];
        $emailid=$_POST['emailid'];
        $profilelink=$_POST['profilelink'];
        // echo $name;
        // echo $dob;
        // echo $emailid;
        // echo $profilelink;
        $sname=$_POST['sname'];
        $sstream=$_POST['sstream'];
        $syear=$_POST['syear'];
        $smarks=$_POST['smarks'];
        // var_dump($sname);
        // foreach($sname as $val){
        //         //  $pdf->Cell(40,10,$val[$i],1,0);
        //         echo $val;
        // }
        // var_dump($sstream);
        // var_dump($syear);
        // var_dump($smarks);
        $cname=$_POST['cname'];
        $cstream=$_POST['cstream'];
        $cyear=$_POST['cyear'];
        $cmarks=$_POST['cmarks'];
        // var_dump($cname);
        // var_dump($cstream);
        // var_dump($cyear);
        // var_dump($cmarks);
        $pname=$_POST['pname'];
        $pdescription=$_POST['pdescription'];
        $pyear=$_POST['pyear'];
        // var_dump($pname);
        // var_dump($pdescription);
        // var_dump($pyear);


        if( isset($_FILES['image']) ) { 
           
            $file_name=$_FILES['image']['name']; 
        
            $file_tmp=$_FILES['image']['tmp_name']; 

            $protocol="http://";
            $hostname=$_SERVER['HTTP_HOST'];   
            $val=move_uploaded_file($file_tmp, "../uploads/".$file_name);
            $image=$_FILES['image']['name'];
        
        // echo $hostname;
        // echo $_SERVER['HTTPS'];
        // echo $file_name;
        // echo $file_tmp;
        // echo '<br>';
        // $img="http://localhost/uploads/".$image;
        $img=$protocol.$hostname."/uploads/".$image;
        // echo $img;
            // echo '<img src="'.$img.'">';
        }
        
        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,10,"Curriculum Vitae",1,1,'C');

        // $pdf->Cell(0,15,$image,0,1);
        // $pdf->Image($img, 50, 50, 70);
        $pdf->Image($img, 155,30,40,60);
        $pdf->Ln(10);
        $pdf->Cell(0,10,"Personal Details",0,0,'C');
        $pdf->Ln(10);
        // $pdf->Image($img, 50, 50, 70);
        $pdf->Cell(30,10,"Name:",0,0,'C');
        $pdf->Cell(70,10,$name,0,0,'C');
        $pdf->Ln(10);

        $pdf->Cell(30,10,"DOB:",0,0,'C');
        $pdf->Cell(70,10,$dob,0,0,'C');
        $pdf->Ln(10);

        $pdf->Cell(30,10,"Emailid:",0,0,'C');
        $pdf->Cell(70,10,$emailid,0,0,'C');
        $pdf->Ln(10);

        $pdf->Cell(30,10,"Profilelink:",0,0,'C');
        $pdf->Cell(70,10,$profilelink,0,0,'C');
        $pdf->Ln(10);

        $pdf->Cell(0,10,"Educational Details",0,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(0,10,"school details",0,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(40,10,"School name",1,0,'C');
        foreach($sname as $val){
                $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(40,10,"Stream",1,0,'C');
        foreach($sstream as $val){
            $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(40,10,"Passing year",1,0,'C');
        foreach($syear as $val){
            $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(40,10,"Marks",1,0,'C');
        foreach($smarks as $val){
            $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(0,10,"college details",0,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(40,10,"College name",1,0,'C');
        foreach($cname as $val){
            $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(40,10,"Stream",1,0,'C');
        foreach($cstream as $val){
            $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(40,10,"Passing year",1,0,'C');
        foreach($cyear as $val){
            $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(40,10,"Marks",1,0,'C');
        foreach($cmarks as $val){
            $pdf->Cell(40,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(0,10,"Projects",0,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(50,10,"Project name",1,0,'C');
        foreach($pname as $val){
            $pdf->Cell(80,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(50,10,"Description",1,0,'C');
        foreach($pdescription as $val){
            $pdf->Cell(80,10,$val,1,0);
        }
        $pdf->Ln(10);
        $pdf->Cell(50,10,"Completion year",1,0,'C');
        foreach($pyear as $val){
            $pdf->Cell(80,10,$val,1,0);
        }
        $pdf->Ln(10);


       
        $pdf->Ln(10);

        $t=time();
        $date=date("Y-m-d",$t);
        // echo $date;
       
        // echo($_SESSION['date']);
        $file1=time().'.pdf';
        $file2=$date.$file1;
        $pdf->output($file2,'D');

        $filename="/var/www/Files/pdfs/$file2";
        $pdf->Output($filename,'F');

        // $pdf->output();
        $protocol="http://";
        $hostname=$_SERVER['HTTP_HOST']; 
        $link=$protocol.$hostname."/pdfs/".$file2;  
        $_SESSION['date']=$date;

        $_SESSION['link']=$link;
    }
?>