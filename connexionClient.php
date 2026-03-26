<?php
session_start();
require_once 'connexion.php';

if(isset($_POST['envoye'])) {

    $utilisateur = $_POST['utilisateur'];
    $motDepasseU = $_POST['motDePasse'];

    // Init counter
    if (!isset($_SESSION['cmpt'])) {
        $_SESSION['cmpt'] = 0;
    }

    // Init tuteur
    if (!isset($_SESSION['tuteur'])) {
        $_SESSION['tuteur'] = "tuteurCdi";
        $_SESSION['motDePassTut'] = "collegeCdi";
    }

    // Secure query
    $stmt = $conn->prepare("SELECT * FROM etudiant WHERE nomDusager=?");
    $stmt->bind_param("s", $utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // ✅ Student login
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

    if ($_SESSION['cmpt'] >= 3) {
        header("Location: index.php");
        exit();
    }

    $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect.";
    header("Location: index.php");
    exit();
}
?>