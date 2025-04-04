<div class="form-container">
    <form action="index.php?page=signup" method="POST">
        <h2>Inscription</h2>
        <input type="text" name="prenom" placeholder="Prénom" <?php if (isset($_POST["prenom"])) {echo "value=".$_POST['prenom'];} ?> required>
        <input type="text" name="nom" placeholder="Nom" <?php if (isset($_POST['nom'])) {echo "value=".$_POST['nom'];} ?>required>
        <input type="email" name="email" placeholder="Email"<?php if (isset($_POST['email'])) {echo "value=".$_POST['email'];} ?> required>
        <input id="password" type="password" name="mot_de_passe" placeholder="Mot de passe*" required>
        <p><small > * Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</small></p>
        <input type="password" name="confirm_mot_de_passe" placeholder="Confirmer mot de passe" required>
        <button type="submit">S'inscrire</button>
    </form>
</div>
