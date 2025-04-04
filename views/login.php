<div class="form-container">
    <form action="index.php?page=login" method="POST">
        <h2>Connexion</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
        <input class="btninscription" type="button" onclick="window.location.href ='index.php?page=signup';" value="Pas de compte?" />
        <span><a href="index.php?page=forgot_password" class="psw">Mot de passe oublié?</a></span>
    </form>
</div>

