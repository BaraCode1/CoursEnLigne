
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>Tâches du tuteur en ligne</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table
            {
                border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;
            }
            
            table th,
            table td
            {
                border: 1px solid;
                padding: 5px;
                
            }
            table th
            {
                 background-color: #f2f2f2;
            }
            
        </style>
        
    </head>
    <body>
        <?php session_start();
        
         if(isset ($_SESSION['tuteur']))
         {
            
           $prenomTut=$_SESSION['nomTut'];
           echo '<div align="center" id="bandeauBienvenue"><h2>'.'Bienvenue !'.' '.$prenomTut.'</h2></div>';
           echo '<div align="center"><h1>Taches du tuteur en ligne</h1></div>';
           
           echo'<table>';
           echo'<form method="POST" enctype="multipart/form-data" action="PageTuteur.php">';
           echo'<th>Nom cours</th>';
           echo'<th>Description</th>';
           echo'<th>File</th>';
           echo '<th></th>';
           echo '<th>Delete</th>';
           
           
           echo '<tr><td>Programmer Analyst</td>'
           . '<td>Duties of the programmer analyst</td>'
                   . '<td><input type="file" name="program"></td>'
                   .'<td><input type="submit" value="Upload"></td>'
                   . '<td><input type="submit" name="DelProgram" value="Delete"></td></tr>';
           
            echo '<tr><td>Structured Approach</td>'
           . '<td>Determination of relevant entities </td>'
                   . '<td><input type="file" name="stucApr"></td>'
                   .'<td><input type="submit" value="Upload"></td>'
                    . '<td> <input type="submit" name="delStucApr" value="Delete"></td></tr>';
           
            
             echo '<tr><td> Approach to Problem Solving</td>'
           . '<td>Determination of relevant entities and their attributes</td>'
                   . '<td><input type="file" name="approchPro"></td>'
                   .'<td><input type="submit" value="Upload"></td>'
                     . '<td><input type="submit" name="delApprochPro" value="Delete"></td></tr>';
             
             
              echo '<tr><td>Object-Oriented Programming 1</td>'
           . '<td>Adaptation of algorithms and pseudocodes</td>'
                   . '<td><input type="file" name="adaptAlg"></td>'
                   .'<td><input type="submit" value="Upload"></td>'
                      . '<td><input type="submit" name="delAdaptAlg" value="Delete"></td></tr>';
               
          
                  
           echo'</form>';
           echo'</table>';
         }
        
          if(isset($_FILES['program']))
          {
          $file=$_FILES['program'];   
          move_uploaded_file($file["tmp_name"],"uploads/".$file["name"]);
          
          }
  
           if(isset($_FILES['stucApr']))
          {
          $file1=$_FILES['stucApr'];
          move_uploaded_file($file1["tmp_name"],"uploads/".$file1["name"]);
         
          }
          
           if(isset($_FILES['approchPro']))
          {
          $file2=$_FILES['approchPro'];
          move_uploaded_file($file2["tmp_name"],"uploads/".$file2["name"]);
          }
          
           if(isset($_FILES['adaptAlg']))
          {
           $file3=$_FILES['adaptAlg'];
           move_uploaded_file($file3["tmp_name"],"uploads/".$file3["name"]); 
          }
          
          if(isset($_POST['DelProgram']))
          {
          $path1="uploads/Programing.txt";
          if(!unlink($path1))
          {
              echo 'You have an error';
          }
              
          else
          {
              echo 'the file has been deleted';
          }
          
         
          }
          
           if(isset($_POST['delStucApr']))
          {
          $path2="uploads/ApproachtoProblemSolving.txt";
          if(!unlink($path2))
          {
              echo 'You have an error';
          }
              
          else
          {
              echo 'the file has been deleted';
          }
          
         
          }
               
            if(isset($_POST['delStucApr']))
          {
          $path3="uploads/StructuredApproach.txt";
          if(!unlink($path2))
          {
              echo 'You have an error';
          }
              
          else
          {
              echo 'the file has been deleted';
          }
          
         
          }

        if(isset($_POST['delAdaptAlg']))
          {
          $path4="uploads/ObjectOriented.txt";
          if(!unlink($path2))
          {
              echo 'You have an error';
          }
              
          else
          {
              echo 'the file has been deleted';
          }
          
         
          }
         
         
         ?>
    </body>
</html>






