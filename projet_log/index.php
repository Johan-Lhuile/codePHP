<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

</head>

<body>

    
    <?php include './php/includes/menu.php'; ?>

    <h1>Accueil</h1>

    <?php
    require './php/crud/config.php';

    $sql = "SELECT * FROM produits";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
    ?> 
    <div class="row col-10 mx-auto "> 
        <?php
            while ($row = mysqli_fetch_array($result)) {
        ?>

                    <div class=" card col-3 m-12 m-auto bg-dark text-center">

                        <div class="card col-10 m-4 ">
                            <h1 class="card-header"><?= $row['Categorie'] ?></h1>
                            <div class="card-body">
                                <h2 class="card-title"><?= $row['Reference'] ?></h2>
                            </div>

                            <div class="card-body ">
                                <p class="card-text"><?= $row['PUHT'] . '€' . ' HT' ?></p>
                            </div>
                        </div>
                        <div class="card m-2">
                            <div class="card-body">
                                <p class="card-subtitle text-muted"><br> <?= $row['Description'] ?></p>
                                <p class="card-text" ><?= 'Stock: ' . $row['Stock'] ?></p>
                            </div>
                        </div>
                    </div>





                <?php

                            }
                ?>
            </div>

    <?php
        }
    }
    mysqli_close($conn);

    ?>


    <?php include './php/includes/footer.php'; ?>
</body>

</html>