<!-- Conteneur principal de tout le diaporama -->
 <!--<main>-->
 <div class="diapo">
            

        <!-- Conteneur des "diapos" -->
        <div class="elements">
            <!-- Boucle pour afficher les images et les noms des centres -->
            <?php
            $sql = "SELECT  Id_centre, Nom, Adresse FROM centres WHERE Id_centre >= 0 ORDER BY RAND() limit 0,5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["Id_centre"];  
                    echo '<div class="element">
                            <img src="images/' . $id . '.jpg" alt="Image ' . $id . '">
                            <a href="index.php?page=information_centre&id=' . $id . '"><div class="caption">
                                <h2 class="text"> '.$row["Nom"].' </h2>
                                <h2 class="text"> '.$row["Adresse"].' </h2>
                                Plus d&apos;info...


                            </div></a>
                          </div>';
                }
            } else {
                echo '<div class="element">
                        <div class="caption">
                            <h2>Aucune donnée trouvée</h2>
                        </div>
                      </div>';
            }

             ?>
            </div>
      
            <!-- Flèches de navigation -->
            <i id="nav-gauche" class="las la-chevron-left"></i>
            <i id="nav-droite" class="las la-chevron-right"></i>
        </div>
       <!-- </main>-->
    <!-- Fichiers JS -->
   <script src="js/diapo.js"></script>