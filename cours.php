<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>Mon compte</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="cssCours.css" rel="stylesheet">
        <script defer src="scriptPaiement.js"></script>
        
    </head>
    <body>
        <header>
            <div id="bandeau">
              <div id="logo">MCeL</div>
              <ul>  
                  <a href="index.php"><li><button>Log out</button></li></a>
                  <a href="pageInscriptions.php"><li><button>Mes Cours</button></li></a>      
                </ul>
           </div> 
          
        </header>
        
        
        <div class="container">
       <?php session_start();
       require_once 'connexion.php';
   
      
     if(isset($_SESSION['prenom']))
     {
         $prenom=$_SESSION['prenom'];
//          echo '<div align="center"><h2>'.'Mon Compte'.'</h2></div>';
          echo '<div align="center" id="bandeauBienvenue"><h2>'.'Bienvenue !'.' '.$_SESSION['prenom'].'</h2></div>';
          
           $query = "SELECT * FROM cours";  
           $row;
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo '<div align="center"><h1>Table des cours</h1></div>';
                   
                    echo '<div id="table">';
                   
                    echo '<table class="listeCours">';     
                        echo '<th>'.'Titre du cours'.'</th>';
                        echo '<th>'.'Description'.'</th>';
                        echo '<th>'.'Prix'.'</th>';
                       
                            
                    while ($row = mysqli_fetch_array($result)) 
                    {
                      
                        echo "<tr>";                       
                        echo "<td>" .$row['nomCours'] . '</td>';
                        echo "<td>" .$row['descriptionCours'] . '</td>';
                        echo "<td>".'$'.$row['prixCours'] . '</td>';
                        echo "</tr>";      
                      
                    }
                    
                     echo '</table>';
                     echo '</form>';
                     echo '</div>';
                    
                    echo '<div id="tableChoix">';
                       echo'<form method="post" action="">';
                       echo '<table id="choixCours">';
                       echo '<th>'.'Select Cours'. '</th>'; 
                       echo '<tr>';             
                       echo "<td>".'<input type="checkbox" name="check[]" value=1>'.'</td>';
                       echo "</tr>";
                       echo "<tr>";
                       echo "<td>".'<input type="checkbox" name="check[]" value=2>'.'</td>';
                       echo "</tr>";
                       echo "<tr>";
                       echo "<td>".'<input type="checkbox" name="check[]" value=3>'.'</td>';
                       echo "</tr>";
                       echo "<tr>";
                       echo "<td>".'<input type="checkbox" name="check[]" value=4>'.'</td>';
                       echo "</tr>";
                       echo '</table>';
                       echo '<input type="submit"id="buton" name="submit" value="Sinscrire">';
                       echo'</form>';
                    echo '</div>';
                }
          if(isset($_POST['submit']))
          {
              if(isset($_POST['check']))
              {
               $answers= $_POST['check'];
//               $valuechecked= implode(",",$answers);
               $_SESSION['selection']=$answers;
               header("location:payment.php");
              }
            
          }
          
          
       }
  
       ?>
        </div>
    </body>
</html>


