<form action="?ctrl=security&action=login" method="post">
    <p>
        <label>
            Nom d'utilisateur ou adresse e-mail :
            <input type="text" name="credentials" required>
        </label>
    </p>
    <p>
        <label>
            Mot de passe :
            <input type="password" name="password" required>
        </label>
    </p>
    <p>
        <input type="hidden" name="csrf_token" value="<?= $token ?>">
        <input type="submit" value="Connexion">
    </p>
</form>

    