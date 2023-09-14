<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>Payment</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.payment
{
border:1px solid#999999;
font:normal 14px helvetica;
width:400px;
margin-left:auto;
margin-right:auto;
border-radius:10px; 
padding-top:40px;
padding-bottom:40px;
margin-top:300px;       
              
}

#button
{
margin-top:20px;
margin-left: 10px;
background-color:#55A0E1;
margin-left: 20px;
}

.tablePayment
{
    margin-top: 40px;
    background-color: darkgreen  ;
}

img {
  width: 40px; 
  height: auto;  
  vertical-align: middle;
  margin-right: 10px; 
}


</style>
    </head>
    <body>
       <?php
session_start();
require_once 'connexion.php';

if (isset($_POST['confirmation'])) {
    $numerocarte = $_POST['card'];
    $expiration = $_POST['expiryDate'];

    if (isset($_SESSION['usager'])) {
        $nomdeLusager = $_SESSION['usager'];
    }

    if (isset($_SESSION['selection'])) {
        $selection = $_SESSION['selection'];
    }

    $query = "INSERT INTO inscriptions (nomDusager, coursId, numeroDeCarte, dateExpiration) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        foreach ($selection as $IDcours) {
            mysqli_stmt_bind_param($stmt, "siss", $nomdeLusager, $IDcours, $numerocarte, $expiration);
            $result = mysqli_stmt_execute($stmt);

            if ($result) 
            {
                echo '<script>alert("Payment effectue !");</script>';
                echo '<script>
                    if(confirm("Voulez-vous aller à la page inscription?")) {
                        window.location = "pageInscriptions.php";
                    } else {
                        window.location = "index.php";
                    }
                </script>';
            } else {
                echo "Encore un peu d'effort.";
            }
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

         <div id="tablePayment">';
        <table class="payment">';
        <form method="post" action="">';  
        <tr>
        <td><input type="radio" value="credit card" checked>Credit card</td>    
         <td>  
        <td><img src="img/visa_logo.png"></td>   
        <td><img src="img/mastercard_logo.png"></td>   
        <td><img src="img/american.png"></td>    
        </td>  
        </tr>
         <tr><td><input type="text" placeholder="Card number" value="" id="card" name="card" autofocus required></td></tr>
        <tr><td><input type="text" placeholder="Name on card" value="" name="nameOnCard" required></td></tr>';
        <tr>
        <td><input type="text" placeholder="Expiration date(MM/YY)"value="" name="expiryDate" required></td>';   
        <td><input type="text" placeholder="Security code" value="" name="securityCode" required></td>';   
        </tr>
        <tr align="right">
        <td></td>  
        <td><a href=""><button id="button" type="submit" name="confirmation">Pay now</button></a></td>   
        </tr> 
       </form> 
        </table>
        </div>
    </body>
</html>
