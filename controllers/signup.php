<?php
if (isset($_POST["prenom"])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prenom = mysqli_real_escape_string($conn,$_POST['prenom']);
        $nom = mysqli_real_escape_string($conn,$_POST['nom']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $mot_de_passe = mysqli_real_escape_string($conn,$_POST['mot_de_passe']);
        $confirm_mot_de_passe = mysqli_real_escape_string($conn,$_POST['confirm_mot_de_passe']);

        $error = '';
        
        // Vérification du mot de passe
        if ($mot_de_passe !== $confirm_mot_de_passe) {
            $error = 'Les mots de passe ne correspondent pas !';
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $mot_de_passe)) {
            $error = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.';
        } else {
            // Vérification si l'email existe déjà
            $stmt = $conn->prepare("SELECT email FROM utilisateur WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $error = 'Un compte avec cet email existe déjà. Veuillez vous connecter avec cet email ou utiliser une autre adresse email pour vous inscrire.';
            } else {
                $token = bin2hex(random_bytes(50)); // Génère un token unique
                $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                echo'avant. '.$mot_de_passe.'apres: '.$mot_de_passe_hash;
                echo'avant. '.$mot_de_passe.'apres: '.$mot_de_passe_hash;
                $stmt = $conn->prepare("INSERT INTO utilisateur (prenom, nom, email, mot_de_passe, token) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $prenom, $nom, $email,$mot_de_passe_hash, $token);

                if ($stmt->execute()) {
                    // Envoi de l'email d'activation
                    $link = "http://sportzone.fouadalazar.fr/index.php?page=activate&token=$token";
                    $subject = '=?UTF-8?B?'.base64_encode('Activation de compte').'?=';
                    $message = "Bonjour $prenom,\n\nCliquez sur le lien suivant pour activer votre compte : $link\n\nMerci.";
                    $headers = 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
                    $headers .= 'From: info@fouadalazar.com' . "\r\n";

                    if (mail($email, $subject, $message, $headers)) {
                        echo "<script>alert('Un email d\'activation a été envoyé. Veuillez vérifier votre boîte de réception.'); window.location.href = 'index.php?page=login';</script>";
                    } else {
                        echo "<script>alert('Erreur lors de l\'envoi de l\'email d\'activation.');</script>";
                    }
                } else {
                    echo "Erreur : " . $stmt->error;
                }
            }

            $stmt->close();
        }

        $conn->close();

        if ($error != '') {
            echo "<script>alert('$error');</script>";
        }
    }
}

require_once 'views/signup.php';
?>