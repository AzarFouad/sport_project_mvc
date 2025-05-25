<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
  
    $mot_de_passe = mysqli_real_escape_string($conn,$_POST['mot_de_passe']);

    // Vérification de l'utilisateur dans la base de données
    $stmt = $conn->prepare("SELECT id_utilisateur, prenom, nom, email, mot_de_passe, is_active FROM utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_utilisateur, $prenom, $nom, $email, $stored_password_hash, $is_active);
        $stmt->fetch();

        // Vérification du mot de passe avec password_verify
        if (password_verify($mot_de_passe, $stored_password_hash)) {
            if ($is_active) {
                // Création de la session utilisateur
                session_start();
                $_SESSION['Id_utilisateur'] = $id_utilisateur;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $_SESSION['email'] = $email;

                // Redirection vers la page d'accueil ou la dernière page visitée
                header("Location: index.php?page=".$_SESSION['loc']."");
                exit();
            } else {
                echo "<script>alert('Votre compte n\'est pas encore activé. Veuillez vérifier votre email pour activer votre compte.');</script>";
            }
        } else {
            echo "<script>alert('Email ou mot de passe incorrect.');</script>"; 
        }
    } else {
        echo "<script>alert('Email ou mot de passe incorrect.');</script>";
    }

    $stmt->close();
    $conn->close();
}
require_once 'views/login.php';

?>