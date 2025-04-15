<?php
function getUserById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE Id_utilisateur = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function updateUser($conn, $id, $data) {
    $stmt = $conn->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, email = ? WHERE Id_utilisateur = ?");
    $stmt->bind_param("sssi", $data['nom'], $data['prenom'], $data['email'], $id);
    return $stmt->execute();
}

function checkUserCredentials($conn, $email, $password) {
    $stmt = $conn->prepare("SELECT Id_utilisateur, prenom, nom, email, mot_de_passe, is_active FROM utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $prenom, $nom, $email, $hashed_password, $is_active);
        $stmt->fetch();
        return password_verify($password, $hashed_password) ? compact('id', 'prenom', 'nom', 'email', 'is_active') : false;
    }
    return false;
}

function getUserByToken($conn, $token) {
    $stmt = $conn->prepare("SELECT Id_utilisateur FROM utilisateur WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function updatePassword($conn, $userId, $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE utilisateur SET mot_de_passe = ? WHERE Id_utilisateur = ?");
    $stmt->bind_param("si", $hashed_password, $userId);
    return $stmt->execute();
}