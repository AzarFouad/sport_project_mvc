<h2>Réinitialiser le mot de passe</h2>
<form action="index.php?page=reset_password&token=<?php echo htmlspecialchars($_GET['token']); ?>&expiration=<?php echo htmlspecialchars($_GET['expiration']); ?>" method="POST">
    <div class="form-container">
        <label for="password"><b>Nouveau mot de passe</b></label>
        <input type="password" placeholder="Entrez un nouveau mot de passe" name="password" required>
        <p><small > * Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</small></p>
        <label for="confirm_password"><b>Confirmez le mot de passe</b></label>
        <input type="password" placeholder="Confirmez votre mot de passe" name="confirm_password" required>

        <button type="submit">Réinitialiser le mot de passe</button>
    </div>
</form>
