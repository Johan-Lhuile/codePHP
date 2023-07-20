<?php


if (isset($_SESSION['erreur'])){
    $erreur = $_SESSION['erreur'];
}else {
    $erreur = '';
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
</head>
<body>
    <?php include './php/includes/menu.php'; ?>

    <h1>Connectez-vous !!!</h1>

    <br><br>

    <form action="traitement.php" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="password">
        <br> <input type="submit" value="Connexion">
    </form>

    <a href="./reset_password.php">Mot de passe oublié !!!</a>

    <div class="erreur">
        <?php
            echo $erreur;
        ?>    

    </div>

    <?php include './php/includes/footer.php'; ?>
</body>
</html>