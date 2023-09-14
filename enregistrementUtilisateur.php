<?php 
require_once 'connexion.php';

if (isset($_POST['insert']))
{
  
     
      $prenom=$_POST['prenom'];
      $nom=$_POST['nom'];
      $adresse=$_POST['adresse'];
      $ville=$_POST['ville'];
      $codePostal=$_POST['codePostal'];
      $telephone=$_POST['telephone'] ;
      $adresseCourriel=$_POST['adresseCourriel'] ;
      $nomDusager=$_POST['nomDusager'];
      $motDePasse1=$_POST['motDePasse1'];
      $motDePasse2=$_POST['motDePasse2'];
      
     
      $query="insert into etudiant(prenom,nom,adresse,ville,codePostal,telephone,adresseCourriel,nomDusager,motDePasse) "
              . "values('$prenom','$nom','$adresse','$ville','$codePostal','$telephone','$adresseCourriel','$nomDusager','$motDePasse1')";
    
     $result=mysqli_query($conn, $query);
     mysqli_close($conn);
}
    

?>
 
<html>
    <head>
        <title>Enregistrement</title>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href='cssPremiereAnnee.css' type='text/css' rel='stylesheet'>
        <script src="script.js"></script>
<style>
.inscrip
{
    border:1px solid#999999;
    font:normal 14px helvetica;
    width:400px;
    margin-left:auto;
    margin-right:auto;
    border-radius:10px; 
    padding-top:40px;
    padding-bottom:40px;
}
button
    {
      float:right;
    }
    
   </style>
    </head>
    <body>
<div></div>
  <div align="center"><h2>Inscription</h2></div>
  <div align="center"><img src="img/logo.png"></div>
  <table class="inscrip" border="0" cellpadding ="2" cellspacing="10">
       <form method='post'autocomplete='off' name='myForm' action="enregistrementUtilisateur.php">
         <tr><td>Prenom</td><td><input type="text" name="prenom" placeholder='prenom' required></td></tr>
         <tr><td>Nom</td><td><input type="text" name="nom" placeholder='nom' required></td></tr>
         <tr><td>Adresse</td><td><input type="text" name="adresse" placeholder='adresse' required></td></tr>
         <tr><td>Ville</td><td><input type= "text" name= "ville" placeholder='ville' required></td></tr>
         <tr><td>Code Postal</td><td><input type="text" name="codePostal" placeholder='lnl nln' required></td></tr>
         <tr><td>Telephone</td><td><input type="text" name="telephone" placeholder='telephone' required></td></tr>
         <tr><td>Adresse courriel</td><td><input type="email" name="adresseCourriel" placeholder='aaaa@mail.com' required></td></tr>
         <tr><td>Nom d'usager</td><td><input type="text" name="nomDusager" required placeholder='nom dusager'></td></tr>
         <tr><td>Mot de passe</td><td><input type="password" name="motDePasse1" id='motDePasse1' placeholder='mot de passe' required></td></tr>
         <tr><td>Confirmer Mot de passe</td><td><input type="password" id='motDePasse2' name="motDePasse2" placeholder='mot de passe' required></td></tr>
         <tr><td><p id='message'></p></td></tr>
         <tr><td colspan="2"><div align="right"><input type="submit" onclick="myFunction()" name ="insert" value='enregitrer' style="border-radius
                                       :10px; margin-top:30px;margin-right:50px; width:40%; height:30px; background-color: royalblue; color:white;"></div></td></tr>
        
      </form>
 </table>
    </body>
</html>

 

