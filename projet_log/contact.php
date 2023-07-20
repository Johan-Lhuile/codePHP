<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <?php include './php/includes/menu.php'; ?>

    <h1>Nous contacter</h1>

    <form action="./clients/contacter.php" method="post" >

        <input type="text" placeholder="Votre email" name="email">
        <input type="text" name="nom" placeholder="Nom"><br><br>
        <input type="text" name="tel" placeholder="Téléphone"><br><br>
        <textarea name="message" cols="30" rows="10" placeholder="Votre message"></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php include './php/includes/footer.php'; ?>
    
</body>
</html>