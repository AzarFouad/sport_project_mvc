<div id="inscription-body">
<!--<div class="form-container">-->
        <form method="POST"  class="inscription_form" action="index.php?page=inscription&id=<?php echo $Id_centre; ?>" id="inscriptionForm">
        <h2>S'inscrire à un sport</h2>
        
        <!-- Affichage des informations utilisateur -->
        <label for="prénom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" readonly="readonly"/>
        
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" readonly="readonly"/>
        
        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail" value="<?php echo htmlspecialchars($email); ?>" readonly="readonly"/>
        
        <!-- Choix du centre -->
        <label for="centre">Choisissez un centre :</label>
        <select name="centre" id="centre" required>
            <?php
            if ($centres_result->num_rows > 0) {
                while($row = $centres_result->fetch_assoc()) {
                    $selected = $row['Id_centre'] == $Id_centre ? 'selected' : '';
                    echo "<option value='" . $row['Id_centre'] . "' $selected>" . $row['Nom'] . "</option>";
                }
            } else {
                echo "<option>Aucun centre disponible</option>";
            }
            ?>
        </select>

        <!-- Choix du sport -->
        <label for="sport">Choisissez un sport :</label>
        <select name="sport" id="sport" required>
            <option value="" selected>Selectionnez un Sport</option>  <!-- Option pour afficher un message d'erreur -->

            <!-- Options des sports disponibles -->
            <?php
            if ($sports_result->num_rows > 0) {
                while($row = $sports_result->fetch_assoc()) {
                    echo "<option value='" . $row['Id_sport'] . "' data-centre='" . $row['Id_centre'] . "'>" . $row['Nom'] . " - " . $row['Horaire_sport'] . "</option>";
                }
            } else {
                echo "<option>Aucun sport disponible</option>";
            }
            ?>
        </select>
        
        <input type="hidden" name="confirmed" id="confirmed" value="no">
        <button type="button" onclick="confirmInscription()">S'inscrire</button>
    </form>
<!--</div>-->
 </div>
<script>
    // Script pour afficher uniquement les sports du centre sélectionné
    const centreSelect = document.getElementById('centre');
    const sportSelect = document.getElementById('sport');
    const sportsOptions = sportSelect.querySelectorAll('option');

    centreSelect.addEventListener('change', function() {
        const selectedCentre = this.value;
        sportsOptions.forEach(option => {
            option.style.display = option.getAttribute('data-centre') == selectedCentre ? 'block' : 'none';
        });
    });
    centreSelect.dispatchEvent(new Event('change'));

    function confirmInscription() {
        if (document.getElementById('sport').value != "") {
            const confirmation = confirm('Voulez-vous bien vous inscrire?');
            if (confirmation) {
                document.getElementById('confirmed').value = 'yes';
                alert('Votre inscription est bien pris en compte');
                document.forms['inscriptionForm'].submit();
  
                }
        } else {
            alert('Veuillez choisir un sport pour continuer');
        }
    }
</script>

