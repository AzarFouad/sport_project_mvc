<?php
$_SESSION['loc'] = "inscription";

if (!isset($_SESSION['email'])) {
    header('Location: index.php?page=login'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
} else {//1

    // Récupérer les informations de l'utilisateur connecté
    $Id_utilisateur = $_SESSION['Id_utilisateur'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $email = $_SESSION['email'];

    // Gestion de l'inscription au sport après confirmation
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmed']) && $_POST['confirmed'] === 'yes') {//2

        $Id_centre = mysqli_real_escape_string($conn,$_POST['centre']);
        $Id_sport = mysqli_real_escape_string($conn,$_POST['sport']);
        $Date_demande = date('Y-m-d'); // Date actuelle
        $Annee = (date('m') >= 8 && date('m') <= 12) ? date('Y') : date('Y') + 1; // Inscription pour l'année en cours ou la prochaine

        // Insertion dans la table inscription_sport
        $sql = "INSERT INTO inscription_sport (Id_utilisateur, Id_centre, Id_sport, Date_demande, Annee) 
                VALUES ('$Id_utilisateur', '$Id_centre', '$Id_sport', '$Date_demande', '$Annee')";

        if ($conn->query($sql) === TRUE) {//3
            // Redirection vers la page "mes inscriptions"
            header('Location: index.php?page=mes_inscriptions');
            exit();
        } //3
        else {//3
            echo "Erreur lors de l'insertion : " . $conn->error;
        }//3
    }//2

    $Id_centre = isset($_SESSION['id']) ? intval($_SESSION['id']) : null;

    $centres_query = "SELECT Id_centre, Nom FROM centres";

    $centres_result = $conn->query($centres_query);

    // Récupérer les sports disponibles pour le centre sélectionné
    $sports_query = "SELECT Id_sport, Nom, Id_centre, Horaire_sport FROM sport";
    $sports_result = $conn->query($sports_query); 
    
    require_once 'views/inscription.php';

} // Fin de l'else
$conn->close();
?>
