<?php

if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn,$_GET['token']);

    $stmt = $conn->prepare("UPDATE utilisateur SET is_active = 1, token = NULL WHERE token = ?");
    $stmt->bind_param("s", $token);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "<script>alert('Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.'); window.location.href = 'index.php?page=login';</script>";
        
    } else {
        echo "<script>alert('Token invalide ou compte déjà activé.'); window.location.href = 'index.php?page=login';</script>";

    }

    $stmt->close();
    $conn->close();
} else {
    echo "Aucun token fourni.";
}
?>
