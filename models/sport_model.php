<?php
function getUserRegistrations($conn, $userId) {
    $stmt = $conn->prepare("
        SELECT i.Id_sport, i.Id_centre, c.Nom AS nom_centre, s.Nom AS nom_sport, s.Horaire_sport 
        FROM inscription_sport i 
        JOIN centres c ON i.Id_centre = c.Id_centre 
        JOIN sport s ON i.Id_sport = s.Id_sport 
        WHERE i.Id_utilisateur = ?
    ");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function deleteRegistration($conn, $userId, $sportId) {
    $stmt = $conn->prepare("DELETE FROM inscription_sport WHERE Id_utilisateur = ? AND Id_sport = ?");
    $stmt->bind_param("ii", $userId, $sportId);
    return $stmt->execute();
}