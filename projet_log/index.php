<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    
</head>
<body>
    <?php include './php/includes/menu.php'; ?>

    <div class="col-3 text-center carte bg-primary">

                                <div class="card col-12 m-2">
                                    <h3 class="card-header"></h3>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['reference'] ?></h5>
                                            <h6 class="card-subtitle text-muted"><?= $row['categorie'] ?></h6>
                                    </div>

                                    <div class="card-body">
                                        <p class="card-text"><?= $row['puht'] ." € / TVA : " . $row['tva'] ?></p>
                                    </div>
                                </div>
                                <div class="card m-2">
                                    <div class="card-body">
                                        <h4 class="card-title">Descriptif <br> <?= $row['description'] ?></h4>
                                        <h6 class="card-subtitle mb-2 text-muted">Stock</h6>
                                        <p class="card-text"><?= $row['stock'] ?></p>
                                    </div>
                                </div>
                            </div>

    <h1>Accueil</h1>
    <?php include './php/includes/footer.php'; ?>
</body>
</html>