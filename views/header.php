<?php
session_start();
include __DIR__ . "/../models/fonctions.php";
include __DIR__ . "/../models/connectBD.php";
//include ("../models/connectBD.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navigation Bar with Search Box</title>
    <!-- CSS et js du menu -->
    <link rel="stylesheet" href="css/general.css"/>
    <link rel="stylesheet" href="css/menu.css"/>
    <link rel="stylesheet" href="css/carte.css"/>
    <link rel="stylesheet" href="css/diapo.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/information.css"/>
    <link rel="stylesheet" href="css/inscription.css"/>
    <link rel="stylesheet" href="css/mes_inscription.css"/>
    <link rel="stylesheet" href="css/contact.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="js/menu.js" defer></script>
    <!-- CSS et js de la carte-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/> 
     <link  rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/markercluster.css "  >
     <link  rel="stylesheet" href="https://unpkg.com/Leaflet.markercluster-1.4.1/dist/MarkerCluster.css ">
     
      <link  rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/markercluster.Default.css "  >
      <!-- Fichiers CSS diapo -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
  </head>
  <body>

 


