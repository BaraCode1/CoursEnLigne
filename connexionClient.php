<?php session_start();

require_once 'connexion.php'; 

if(isset($_POST['envoye']))
{  
   
    $utilisateur=$_POST['utilisateur'];
    $motDepasseU=$_POST['motDePasse'];
    $utilisateur= stripcslashes($utilisateur);
    $motDepasseU= stripcslashes($motDepasseU);
    
    $_SESSION['nomTut']="Jean";
    $_SESSION['tuteur']="tuteurCdi";
    $_SESSION['motDePassTut']="collegeCdi";
    
    $query="select * from etudiant where nomDusager='$utilisateur' and motDePasse='$motDepasseU'";
    $result=mysqli_query($conn, $query);
    
    
        if (!isset($_SESSION['cmpt'])) 
        {
        $_SESSION['cmpt'] = 0;
        }
  
       if ($result) 
       {
        $row = mysqli_fetch_array($result);

     if ($row !== null && isset($row['nomDusager']) && isset($row['motDePasse'])&&$_SESSION['cmpt']<=3)
     {
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['usager'] = $row['nomDusager'];
       

        if ($row['nomDusager'] === $utilisateur && $row['motDePasse'] === $motDepasseU) {
//            setcookie('cookie', $row['prenom'], time(), 60 * 60 * 24 * 7, '/');

            header("location:cours.php");
            mysqli_close($conn);
            exit();
        } 
        
    } 
    
    if ($_SESSION['tuteur'] === $utilisateur && $_SESSION['motDePassTut'] === $motDepasseU) {
            header("location:pageTuteur.php");
            mysqli_close($conn);
            exit();
        } else {
            echo 'Le nom d\'utilisateur ou le mot de passe n\'est pas correct.';
        }
       }
    else 
    {
        echo 'Aucun utilisateur trouvé avec les informations fournies.';
        
        $_SESSION['cmpt']++;
        echo $_SESSION['cmpt'] ;
    }
    if($_SESSION['cmpt']==3)
    {
         header("location:index.php");
    }
}

    
            

    
?>

<html>
    <head>
        <title>Client</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

    .inscriptions
        {
         border:1px solid#999999;
         font:normal 14px helvetica;
         background-color:#fff;
         width:400px;
         margin-left:auto;
         margin-right:auto;
         box-sizing:border-box;
         height:300px;
         border-radius:10px;
         position:relative;
         margin-top:10px;

        }
    .input
        {
         border-radius:5px;
         width: 100%;
         padding: 12px 20px;
         margin: 8px 0;
         border: 1px solid #ccc;
         box-sizing: border-box;
        }
    .button
        {
         width: 100%;
         padding: 15px;
         margin: 5px 0 22px 0;
         display: inline-block;
         border: none;
         background: #f1f1f1;
          background-color: royalblue ;
        }
        img
        {
            height: 250px;
        }

       
</style>
    </head>
    <body>
<div align="center"><img src="img/logo.png"></div>
<table class="inscriptions" border="0" cellpadding ="2" cellspacing="5">
<th  colspan="2" align="center"><h2>Log in</h2></th>
       <form method='POST'><pre>       
       <tr>
           <td><label for="nomUtilisateur">Nom d'utilisateur</label></td>
        </tr>
             <tr>
               <td>
                 <input type="text" name="utilisateur" id="nomUtilisateur" placeholder="nom utilisateur" class="input">
                 </td>
              </tr>
       <tr>
           <td><label for="motDePasse">Mot de passe</label></td>
       </tr>
        <tr>
           <td><input type="password" name="motDePasse" id="motDePasse" placeholder=" mot de passe" class="input"></td>
               
       </tr>
       <tr ><td colspan="2" align="center"><button type="submit" name ="envoye" class="button">Log in</button></td></tr>
        <tr><td>Si vous n’avez pas de compte étudiant</td></tr>
        <tr><td><a href="enregistrementUtilisateur.php">Enregistrez-vous en cliquant ici</td></a></tr>
     </pre></form>
  </table>
    </body>
</html>


