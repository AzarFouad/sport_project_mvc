<?php
$_SESSION['loc'] = "compte";
// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=login");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modification'])) {
    // Récupère les nouvelles valeurs des champs du formulaire
    $sql1 = "UPDATE utilisateur SET nom = '{$_POST['nom']}', prenom = '{$_POST['prenom']}',  email = '{$_POST['mail']}' WHERE Id_utilisateur = ".$_SESSION['Id_utilisateur'];

    if ($conn->query($sql1) === TRUE) {
        ?>
        <script>alert('Les informations ont été mises à jour avec succès.');</script>
        <?php
        } 
        else {
            ?>
            <script>alert('Erreur lors de la mise à jour.');</script>
            <?php
        }
}

//recuperation des informations
$sql= " SELECT * from utilisateur WHERE Id_utilisateur = ".$_SESSION['Id_utilisateur'].";";
$result = $conn->query($sql);

if ($result->num_rows > 0) { //if

    while ($row = $result->fetch_assoc()) { //w

        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $email = $row['email'];


        require_once 'views/compte.php';
    }//w
    } //if
    $conn->close();
    ?>