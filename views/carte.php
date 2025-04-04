<?php
// Connexion à la base de données
//require_once __DIR__ . "/../models/connectDB.php";
//require_once __DIR__ . "/../models/functions.php"; // Include function definitions
//include __DIR__ . "/../models/fonctions.php";
//fliste_centres($conn); 

?>


<div class="intro-carte">
    <h2>Explorez nos centres sportifs sur la carte interactive !</h2>
</div>
<div id="macart"></div>
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js "></script>
     <script>
        var Centres =<?php echo(fliste_centres($conn));  ?>;
        var tableauMarker =[];
     //on initialise la carte
     var carte = L.map('macart').setView([48.8744, 6.2081], 15);
     //on charge les "tuiles"
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(carte);
    var markers = L.markerClusterGroup();            
    for( club in Centres){ 
        //ajout d'un marqueur sur la carte et on lui donne un popup
    var marker = L.marker([Centres[club].lat, Centres[club].lon]).addTo(carte)//.addTo(carte);  inutile lor des closter    
    marker.bindPopup("<h1>"+club+"</h1> <a href='index.php?page=information_centre&id="+Centres[club].id+"'>Plus d&apos;info</a>");  
    markers.addLayer(marker);// on ajoute le marker au groupe 
    //on ajoute le marker au tableau
    tableauMarker.push(marker);
    }
    //on ajoute le groupe de marqueurs dans un groupe liflet
    var groupe =new L.featureGroup(tableauMarker);
    //on adapte le zoom au groupe
    carte.fitBounds(groupe.getBounds().pad(0.5));
    carte.addLayer(markers);
     </script>
      <?php  $conn->close();?>