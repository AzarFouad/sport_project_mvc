<?php
require_once '../models/sport_model.php';
$_SESSION['loc'] = "mes_inscriptions";

// Vérification de l'authentification
if (!isset($_SESSION['email'])) {
    header('Location: index.php?page=login');
    exit();
}

// Récupération des inscriptions
$registrations = getUserRegistrations($conn, $_SESSION['Id_utilisateur']);

// Traitement de la suppression
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Id_sport'])) {
    if (deleteRegistration($conn, $_SESSION['Id_utilisateur'], $_POST['Id_sport'])) {
        $_SESSION['success_message'] = "Inscription résiliée avec succès";
        header("Location: index.php?page=mes_inscriptions");
        exit();
    } else {
        $_SESSION['error_message'] = "Erreur lors de la résiliation";
    }
}

require_once '../views/mes_inscriptions.php';
$conn->close();