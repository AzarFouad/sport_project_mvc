<?php
require_once '../models/user_model.php';
$_SESSION['loc'] = "compte";

// Vérification de l'authentification
if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=login");
    exit();
}

// Traitement de la modification du compte
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modification'])) {
    $data = [
        'nom' => htmlspecialchars($_POST['nom']),
        'prenom' => htmlspecialchars($_POST['prenom']),
        'email' => filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)
    ];

    if ($data['email'] === false) {
        $_SESSION['error_message'] = "Email invalide";
    } else {
        if (updateUser($conn, $_SESSION['Id_utilisateur'], $data)) {
            // Mettre à jour les données de session si l'email a changé
            $_SESSION['email'] = $data['email'];
            $_SESSION['success_message'] = 'Informations mises à jour avec succès';
        } else {
            $_SESSION['error_message'] = 'Erreur lors de la mise à jour';
        }
    }
}

// Récupération des données utilisateur
$user = getUserById($conn, $_SESSION['Id_utilisateur']);
if (!$user) {
    $_SESSION['error_message'] = 'Utilisateur introuvable';
    header("Location: index.php?page=login");
    exit();
}

require_once '../views/compte.php';
$conn->close();