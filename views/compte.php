 <div id="inscription-body"> 
     <form method="POST" id="inscriptionForm" action="index.php?page=compte">
            <h2>Profil  </h2>
             <!-- Affichage des informations utilisateur -->
             <label for="prenom">Prénom :</label>
             <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" readonly/>
             
             <label for="nom">Nom :</label>
             <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" readonly/>
             
             <label for="mail">Email :</label>
             <input type="email" id="mail" name="mail" value="<?php echo htmlspecialchars($email); ?>" required/>  
            <button type="submit" name="modification">Modifier</button>
    </form>
</div>
       