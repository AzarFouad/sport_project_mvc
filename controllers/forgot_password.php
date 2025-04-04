<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Vérification si l'email existe dans la base de données
    $sql = "SELECT email FROM utilisateur WHERE email = '{$email}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Génération du token (SHA1 de l'email)
        $token = sha1($email);
        $expiration = time() + 86400; // Token valide pendant 24h

        // Envoi du lien par email
        $link = "http://sports.fouadalazar.fr/index.php?page=reset_password&token=$token&expiration=$expiration"; // Correction ici
        $subject = '=?UTF-8?B?'.base64_encode('Réinitialisation de mot de passe').'?=';
        $message = "Bonjour, \n\nCliquez sur le lien suivant pour réinitialiser votre mot de passe : $link\n\nCe lien expirera dans 24 heures.";
        $headers = 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
        $headers .= 'From: info@fouadalazar.com' . "\r\n";
        
        if (mail($email, $subject, $message, $headers)) {
            echo "<script>alert('Un email a été envoyé avec un lien de réinitialisation. Ce lien expirera dans 24 heures'); window.location.href = 'index.php?page=index';</script>";
        } else {
            echo "<script>alert('Erreur lors de l\'envoi de l\'email.');</script>";
        }
    } else {
        echo "<script>alert('Cet email n\'existe pas.');</script>";
    }
}
require_once 'views/forgot_password.php';
?>

