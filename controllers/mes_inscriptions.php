<?php
$_SESSION['loc'] = "mes_inscriptions";

if (!isset($_SESSION['email'])) {
    header('Location: index.php?page=login'); 
    exit();
}

// Récupérer l'ID de l'utilisateur
$Id_utilisateur = $_SESSION['Id_utilisateur'];

// Requête pour récupérer les informations d'inscription
$query = "
    SELECT i.Id_sport, i.Id_centre, c.Nom AS nom_centre, s.Nom AS nom_sport, s.Horaire_sport 
    FROM inscription_sport i 
    JOIN centres c ON i.Id_centre = c.Id_centre 
    JOIN sport s ON i.Id_sport = s.Id_sport 
    WHERE i.Id_utilisateur = $Id_utilisateur
";

$result = $conn->query($query);

// Initialiser une variable pour le message de bienvenue
$bienvenueAffichee = false;
?>

<div id="mes-inscriptions-container">
    <?php
    if ($result->num_rows > 0) {
        // Afficher le message de bienvenue
        if (!$bienvenueAffichee) {
            echo "<h2>Inscriptions de " . htmlspecialchars($_SESSION['prenom']) . " " . htmlspecialchars($_SESSION['nom']) . "!</h2>";
            $bienvenueAffichee = true;
        }

        while ($row = $result->fetch_assoc()) {
            echo "<div class='inscription-card'>";
            echo "<p><strong>Centre :</strong> " . htmlspecialchars($row['nom_centre']) . "</p>";
            echo "<p><strong>Sport :</strong> " . htmlspecialchars($row['nom_sport']) . "</p>";
            echo "<p><strong>Horaire :</strong> " . htmlspecialchars($row['Horaire_sport']) . "</p>";
            echo "<form method='POST' action='index.php?page=suprimer' onsubmit='return confirm(\"Êtes-vous sûr de vouloir supprimer cette inscription ?\");'>";
            echo "<input type='hidden' name='Id_sport' value='" . htmlspecialchars($row['Id_sport']) . "'>";
            echo "<button type='submit' class='btn-supprimer'>Résilier son abonnement</button>";
            echo "</form>";
            echo "</div>"; // Fin de inscription-card
        }
    } else {
        echo "<p>Aucune inscription trouvée.</p>";
    }
    ?>
</div> <!-- Fin de mes-inscriptions-container -->

<?php
$conn->close();
?>
