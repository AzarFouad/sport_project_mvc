<?php
session_start();
// Définition des pages autorisées (plus sécurisé)
$routes = [
    "index" => "index",
    "contact" => "contact",
    "signup" => "signup",
    "inscription" => "inscription",
    "mes_inscriptions" => "mes_inscriptions",
    "disconnect" => "disconnect",
    "login" => "login",
    "forgot_password" => "forgot_password",
    "reset_password" => "reset_password",
    "information_centre" => "information_centre",
    "compte" => "compte",
    "suprimer" => "suprimer",
    "activate" => "activate"
];


$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$controllerName = $routes[$page];
//echo $page;
$view_path = __DIR__ . "/controllers/" . basename($controllerName) . ".php";
require_once __DIR__ . "/models/connectBD.php"; // Connexion à la base de données


include __DIR__ . "/views/header.php"; // Inclure le header (directement à la racine)
include __DIR__ . "/views/menu.php";   // Inclure le menu (directement à la racine)

if (file_exists($view_path)) {
    include $view_path; // Charger la vue demandée
} else {
    echo "<h2 style='color: red; text-align: center;'>Erreur 404 : Page non trouvée</h2>";
}

include __DIR__ . "/views/footer.php"; // Inclure le footer (directement à la racine)
?>



