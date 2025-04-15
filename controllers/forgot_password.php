<?php
require_once '../models/user_model.php';
require_once '../models/email_model.php';

if (isset($_POST['email'])) {
    // Validation de l'email
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    if ($email === false) {
        $_SESSION['error_message'] = "Format d'email invalide";
    } else {
        // Vérifier si l'email existe en utilisant la fonction du modèle
        $userExists = checkEmailExists($conn, $email);
        
        if ($userExists) {
            // Générer un token sécurisé
            $token = bin2hex(random_bytes(32));
            $expiration = time() + 86400; // 24h
            
            // Stocker le token en base (via modèle)
            if (storePasswordResetToken($conn, $email, $token, $expiration)) {
                // Envoyer l'email (via fonction du modèle)
                if (sendPasswordResetEmail($email, $token)) {
                    $_SESSION['success_message'] = "Un email de réinitialisation a été envoyé";
                    header("Location: index.php?page=login");
                    exit();
                } else {
                    $_SESSION['error_message'] = "Erreur lors de l'envoi de l'email";
                }
            } else {
                $_SESSION['error_message'] = "Erreur lors de la génération du token";
            }
        } else {
            $_SESSION['error_message'] = "Cet email n'est pas enregistré";
        }
    }
}

require_once '../views/forgot_password.php';
$conn->close();