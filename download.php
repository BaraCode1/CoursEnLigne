<?php


$fileId = $_GET['coursId'];


if($fileId==1)
{
    $filePath = 'C:\xampp\htdocs\MesCoursEnLigne\uploads\Programing.txt'; 

   if (file_exists($filePath)) 
   {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
   }  

    else{
         echo "File not found.";
        }
}

if($fileId==2)
{
    
        $filePath = 'C:\xampp\htdocs\MesCoursEnLigne\uploads\StructuredApproach.txt'; 

   if (file_exists($filePath)) 
   {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
   }  

    else{
         echo "File not found.";
        }
}

if($fileId==3)
{
    
        $filePath = 'C:\xampp\htdocs\MesCoursEnLigne\uploads\ApproachtoProblemSolving.txt'; 

   if (file_exists($filePath)) 
   {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
   }  

    else{
         echo "File not found.";
        }
}

if($fileId==4)
{
    
        $filePath = 'C:\xampp\htdocs\MesCoursEnLigne\uploads\ObjectOriented.txt'; 

   if (file_exists($filePath)) 
   {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
   }  

    else{
         echo "File not found.";
        }
}



?>