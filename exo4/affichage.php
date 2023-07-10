<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affichage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-items">
                    <a href="#" class="nav-linkactive">Home</a>
                </li>
                <li class="nav-items">
                    <a href="#" class="nav-link">A propos</a>
                </li>
            </ul>
        </nav>

        <h3 class="text-muted">Exercice 4 GET</h3>
    </div>

    <div class="jumbotron">
        <h1 class="display-3">Information :</h1>

        <table class="table">
                <tr>
                    <th scope="row" class="col-md-2">Nom</th>
                    <td class="col-md-4"><?php echo $_POST['nom']; ?></td>

                    <th scope="row" class="col-md-2">Prénom</th>
                    <td class="col-md-4"><?php echo $_POST['prenom']; ?></td>

                </tr>
                <tr>
                    <th scope="row">Sexe</th>
                    <td><?php echo  $_POST['txt_sex']; ?></td>
                    <th scope="row">statut marital</th>
                    <td><?php echo  $_POST['txt_st_marital']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Mot de passe</th>
                    <td><?php echo  $_POST['mot_de_passe']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Passion préférée</th>
                    <td><?php echo  $_POST['passion_pref']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Passes-temps</th>
                    <td><?php echo  $_POST['txt_passes_temps']; ?></td>
                </tr>
            </table>
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>



<?php

?>

