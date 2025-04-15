<?php
require_once '../models/user_model.php';
require_once '../models/email_model.php';

if (isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    if ($email === false) {
        $_SESSION['error_message'] = "Email invalide";
    } else {
        // Vérifier si l'email existe
        $sql = "SELECT email FROM utilisateur WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            // Générer un token sécurisé
            $token = bin2hex(random_bytes(32));
            $expiration = time() + 86400; // 24h
            
            // Envoyer l'email
            if (sendPasswordResetEmail($email, $token)) {
                $_SESSION['success_message'] = "Un email de réinitialisation a été envoyé";
                header("Location: index.php?page=login");
                exit();
            } else {
                $_SESSION['error_message'] = "Erreur lors de l'envoi de l'email";
            }
        } else {
            $_SESSION['error_message'] = "Cet email n'est pas enregistré";
        }
    }
}

require_once '../views/forgot_password.php';
$conn->close();