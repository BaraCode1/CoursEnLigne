<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>Inscription</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <style>
    table.listeCours {
        border-collapse: collapse;
      margin-right: auto;
      margin-left: auto;
    }
    
    table.listeCours th,
    table.listeCours td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }
    
    table.listeCours th {
        background-color: #f2f2f2;
    }
    img
    {
        height: 250px;
    }

</style>

          
    </head>
    <body>
        <div align="center"><h2>Liste des Cours</h2></div>
       <?php
            session_start();
            require_once 'connexion.php';

            if(isset($_SESSION['usager'])) {
                $usager = $_SESSION['usager'];

                $query = "SELECT etudiant.nomDusager, cours.coursId, cours.nomCours, cours.descriptionCours 
                          FROM ((cours
                          INNER JOIN inscriptions ON cours.coursId = inscriptions.coursId)
                          INNER JOIN etudiant ON etudiant.nomDusager = inscriptions.nomDusager)
                          WHERE etudiant.nomDusager = '$usager'";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo '<div id="table">';
                    echo '<table class="listeCours">';
                    echo '<th>' . 'Numero Cours' . '</th>';
                    echo '<th>' . 'Nom Cours' . '</th>';
                    echo '<th>' . 'Descriptions' . '</th>';
                    echo '<th>Download</th>';

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['coursId'] . '</td>';
                        echo "<td>" . $row['nomCours'] . '</td>';
                        echo "<td>" . $row['descriptionCours'] . '</td>';
                        echo '<td><a href="download.php?coursId=' . $row['coursId'] . '">Download</a></td>';
                        echo "</tr>";
                    }

                    echo '</table>';
                    echo '</div>';
                }

                mysqli_close($conn);
                
                
}
?>
    </body>
</html>





