<?php
session_start();
require_once 'connexion.php';

if(isset($_POST['envoye'])) {

    $utilisateur = $_POST['utilisateur'];
    $motDepasseU = $_POST['motDePasse'];

    if (!isset($_SESSION['cmpt'])) {
        $_SESSION['cmpt'] = 0;
    }

    $query = "SELECT * FROM etudiant WHERE nomDusager='$utilisateur'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $row = mysqli_fetch_assoc($result);


        if ($row && $row['motDePasse'] === $motDepasseU && $_SESSION['cmpt'] < 3) {

            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['usager'] = $row['nomDusager'];

            header("Location: cours.php");
            exit();
        }

        // ✅ Tuteur login
        if ($_SESSION['tuteur'] === $utilisateur && $_SESSION['motDePassTut'] === $motDepasseU) {

            header("Location: pageTuteur.php");
            exit();
        }


        $_SESSION['cmpt']++;
        echo "Nom d'utilisateur ou mot de passe incorrect. Tentative: " . $_SESSION['cmpt'];

        if ($_SESSION['cmpt'] >= 3) {
            header("Location: index.php");
            exit();
        }

    } else {
        echo "Erreur SQL.";
    }
}
?>