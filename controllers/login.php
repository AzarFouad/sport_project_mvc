<?php
require_once '../models/user_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation de l'email
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['mot_de_passe'];

    if ($email === false) {
        $_SESSION['error_message'] = "Format d'email invalide";
    } else {
        // Utilisation de la fonction du modèle
        $user = checkUserCredentials($conn, $email, $password);
        
        if ($user) {
            if ($user['is_active']) {
                // Création de la session
                $_SESSION['Id_utilisateur'] = $user['id'];
                $_SESSION['prenom'] = $user['prenom'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['email'] = $user['email'];
                
                // Redirection
                $redirect = isset($_SESSION['loc']) ? $_SESSION['loc'] : 'index';
                header("Location: index.php?page=$redirect");
                exit( );
            } else {
                $_SESSION['error_message'] = 'Compte non activé - Vérifiez vos emails';
            }
        } else {
            $_SESSION['error_message'] = 'Identifiants incorrects';
        }
    }
}

require_once '../views/login.php';
$conn->close();