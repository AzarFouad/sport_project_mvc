<?php
// Vérification de la présence des paramètres token et expiration
if (isset($_GET['token']) && isset($_GET['expiration'])) { 
    $token = $conn->real_escape_string($_GET['token']);
    $expiration = intval($_GET['expiration']);

    // Vérifier si le lien a expiré
    if (time() >= $expiration) {
        echo "<script>alert('Ce lien a expiré. Veuillez demander une nouvelle réinitialisation.');</script>";
        echo "<script>window.location.href = 'index.php?page=forgot_password';</script>";
        exit;
    }

    // Vérifier si le token correspond à un utilisateur
    $sql = "SELECT Id_utilisateur FROM utilisateur WHERE SHA1(email) = '{$token}'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userId = $user['Id_utilisateur'];

        // Traitement du formulaire pour changer le mot de passe
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'], $_POST['confirm_password'])) {
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Validation du mot de passe
            $passwordErrors = [];
            if (strlen($password) < 8) {
                $passwordErrors[] = "Le mot de passe doit comporter au moins 8 caractères.";
            }
            if (!preg_match('/[A-Z]/', $password)) {
                $passwordErrors[] = "Le mot de passe doit contenir au moins une majuscule.";
            }
            if (!preg_match('/[a-z]/', $password)) {
                $passwordErrors[] = "Le mot de passe doit contenir au moins une minuscule.";
            }
            if (!preg_match('/[0-9]/', $password)) {
                $passwordErrors[] = "Le mot de passe doit contenir au moins un chiffre.";
            }
            if (!preg_match('/[\W]/', $password)) {
                $passwordErrors[] = "Le mot de passe doit contenir au moins un caractère spécial.";
            }

            if (!empty($passwordErrors)) {
                echo "<script>alert('Mot de passe non conforme :\\n" . implode("\\n", $passwordErrors) . "');</script>";
            } elseif ($password === $confirmPassword) {
                // Hashage sécurisé du mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Mise à jour du mot de passe dans la base de données
                $sqlUpdate = "UPDATE utilisateur SET mot_de_passe = '{$hashedPassword}' WHERE Id_utilisateur = {$userId}";
                if ($conn->query($sqlUpdate) === TRUE) {
                    echo "<script>alert('Votre mot de passe a été modifié avec succès.');</script>";
                    echo "<script>window.location.href = 'index.php?page=login';</script>";
                    exit;
                } else {
                    echo "<script>alert('Erreur lors de la mise à jour du mot de passe.');</script>";
                }
            } else {
                echo "<script>alert('Les mots de passe ne correspondent pas.');</script>";
            }
        }
    } else {
        echo "<script>alert('Lien invalide ou utilisateur introuvable.');</script>";
        echo "<script>window.location.href = 'index.php?page=forgot_password';</script>";
        exit;
    }
} else {
    echo "<script>alert('Aucun token ou expiration fournis.');</script>";
    echo "<script>window.location.href = 'index.php?page=forgot_password';</script>";
    exit;
}

require_once 'views/reset_password.php';
?>


