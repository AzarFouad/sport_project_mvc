<?php
session_start();


if (isset($_POST['Id_sport'])) {
    $Id_sport = $_POST['Id_sport'];
    $Id_utilisateur = $_SESSION['Id_utilisateur'];

    $query = "DELETE FROM inscription_sport WHERE Id_sport =".$Id_sport." AND Id_utilisateur = ".$Id_utilisateur;
    $sql = $conn->prepare($query);

    if ($sql->execute()) {
        // Rediriger avec un message de succès
        $_SESSION['message'] = "Inscription supprimée avec succès.";
    } else {
        // Rediriger avec un message d'erreur
        $_SESSION['message'] = "Erreur lors de la suppression de l'inscription.";
    }
    
    
}

$conn->close();
header('Location:index.php?page=mes_inscriptions'); // Redirection vers la page d'inscriptions
exit();
?>
