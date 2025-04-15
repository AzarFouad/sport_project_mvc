<?php
function sendContactEmail($to, $from, $subject, $message) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$from>" . "\r\n";
    return mail($to, $subject, $message, $headers);
}

function sendPasswordResetEmail($email, $token) {
    $subject = 'Réinitialisation de mot de passe';
    $link = "http://sports.fouadalazar.fr/index.php?page=reset_password&token=$token";
    $message = "Bonjour,\n\nCliquez sur le lien suivant pour réinitialiser votre mot de passe : $link\n\nCe lien expirera dans 24 heures.";
    
    $headers = 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
    $headers .= 'From: info@fouadalazar.com' . "\r\n";
    
    return mail($email, $subject, $message, $headers);
}