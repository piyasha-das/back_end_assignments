<?php
    if(!empty($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $name=$_POST['name'];
        $image=$_POST['image'];
        $textarea=$_POST['description'];
        $mobileno=$_POST['phoneno'];
        $emailid=$_POST['emailid'];


        if( isset($_FILES['image']) ) { 
           
            $file_name=$_FILES['image']['name']; 
        
            $file_tmp=$_FILES['image']['tmp_name'];
         
            
        $val=move_uploaded_file($file_tmp, "uploads/".$file_name);
        $image=$_FILES['image']['name'];
        $img="uploads/".$image;
        // echo'<img src="'.$img.'">';
        }
        require ("/usr/share/fpdf/fpdf.php");

        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->SetFont("Arial","",10);
        $pdf->Cell(0,10,"Registration Details",1,1,'C');
        $pdf->Cell(30,10,"First Name",1,0,'C');
        $pdf->Cell(30,10,"lastname",1,0,'C');
        $pdf->Cell(30,10,"Fullname",1,0,'C');
        $pdf->Cell(45,10,"Mobile No",1,0,'C');
        $pdf->Cell(0,10,"Email id",1,1,'C');

        $pdf->Cell(30,15,$fname,1,0,'C');
        $pdf->Cell(30,15,$lname,1,0,'C');
        $pdf->Cell(30,15,$name,1,0,'C');
        $pdf->Cell(45,15,$mobileno,1,0,'C');
        $pdf->Cell(0,15,$emailid,1,1,'C');

        $pdf->Ln(10);
        $pdf->Cell(0,15,$image,0,1);
        $pdf->Image($img, 50, 50, 70);
        

        $pdf->Ln(40);
        $heading="Your Result: ";
        $subject="Subject";
        $marks="Marks";
        $pdf->Cell(0,15,$heading,0,1);
        $pdf->Cell(40,15,$subject,1,0);
        $pdf->Cell(40,15,$marks,1,1);
        $info=$_POST["description"];
        $arr=explode("\n",$info);

        foreach ($arr as $val){
            $var=explode("|",$val);
            for($i=0;$i<2;$i++){
                $pdf->Cell(40,15,$var[$i],1,0);
                if($i==1){
                    $pdf->Ln(5);
                }
            }
        }
        // $pdf->Cell(30,15,$image,0,0,'C');
          
        $file1=time().'.pdf';
        $pdf->output($file1,'D');

        $filename="/var/www/Files/pdfs/test.pdf";
        $pdf->Output($filename,'F');


        // $pdf->output();
        
    }
?>
