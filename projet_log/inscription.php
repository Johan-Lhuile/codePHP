<?php


if(isset($_SESSION['erreur'])){
    $erreur = $_SESSION['erreur'];
}else{
    $erreur = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<?php include './php/includes/menu.php' ?>
    <h1>Inscrivez vous !!</h1>
    <br><br>

    <form action="inscrit.php" method="post" class="cnx">
        <input type="text" placeholder="Votre email" name="pseudo">
        <input type="password" name="password" placeholder="Mot de passe"><br><br>
        <input type="submit" value="Inscription">
    </form>

    <div class="erreur">
        <?php
         echo $erreur;
         ?>
    </div>

    <?php include './php/includes/footer.php' ?>
</body>
</html>