<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>
</head>
<body>
    <div class="form">
        <form action="http://localhost:8888/piephp/" method="post">
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" class="input">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="input">
            </div>

            <button type="reset">Réinitialiser les champs</button>
            <button type="submit">Soumettre le formulaire</button>
        </form>
    </div>
</body>
</html>