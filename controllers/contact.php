<?php
require_once '../models/email_model.php';

if (isset($_POST['send'])) {
    // Nettoyage des données
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message_content = htmlspecialchars(trim($_POST['message']));

    // Validation
    if (empty($username) || $email === false || empty($phone) || empty($message_content)) {
        $_SESSION['error_message'] = "Tous les champs doivent être remplis correctement";
    } else {
        $subject = "Nouveau message de contact: $username";
        $message = "
            <h3>Nouveau message de contact</h3>
            <p><strong>Nom:</strong> $username</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Téléphone:</strong> $phone</p>
            <p><strong>Message:</strong></p>
            <p>$message_content</p>
        ";

        if (sendContactEmail('info@fouadalazar.fr', $email, $subject, $message)) {
            $_SESSION['success_message'] = "Votre message a été envoyé avec succès";
        } else {
            $_SESSION['error_message'] = "Une erreur est survenue lors de l'envoi";
        }
    }
}

require_once '../views/contact.php';