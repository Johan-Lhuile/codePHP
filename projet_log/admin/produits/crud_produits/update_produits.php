<?php
require '../../../php/crud/config.php';

$reference = $categorie = $puht = $description = $stock = '';
$reference_err =  $categorie_err = $puht_err = $description_err = $stock_err ='';

if (isset($_POST['id']) && !empty($_POST['id'])) {

    $id = $_POST['id'];

    $input_reference = trim($_POST['reference']);

    if (empty($input_reference)) {
        $reference_err = 'Entrez une reference';
    } else {
        $reference = $input_reference;
    }

    $input_categorie = trim($_POST['categorie']);

    if (empty($input_categorie)) {
        $categorie_err = 'Entrez une categorie';
    } else {
        $categorie = $input_categorie;
    }

    $input_puht = trim($_POST['puht']);

    if (empty($input_puht)) {
        $puht_err = 'Entrez un prix';
    } else {
        $puht = $input_puht;
    }

    $input_description = trim($_POST['description']);

    if (empty($input_description)) {
        $description_err = 'Entrez une description';
    } else {
        $description = $input_description;
    }

    $input_stock = trim($_POST['stock']);

    if (empty($input_stock)) {
        $stock_err = 'Entrez un stock';
    } else {
        $stock = $input_stock;
    }

    


    if(empty($reference_err) && empty($categorie_err) && empty($puht_err) && empty($tva_err) && empty($description_err) && empty($stock_err)){

        $sql = 'update produits set Reference=?, Categorie=?, PUHT=?, Description=?, Stock=?  where id=?';

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, 'isisii', $param_reference, $param_categorie, $param_puht, $param_description, $param_stock, $param_id);

            $param_reference = $reference;
            $param_categorie = $categorie;
            $param_puht = $puht;
            $param_description = $description;
            $param_stock = $stock;
            $param_id = $id;
            

            if (mysqli_stmt_execute($stmt)) {
                
                header("location: ../index_produits.php");
                exit();
            } else {
                echo "Oops ! Erreur inattendu, rééssayez plus tard !!!";
            }
        }
    }
    mysqli_close($conn);
} else {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = trim($_GET['id']);

        $sql = "select * from produits where id=?";
            
        if ($stmt = mysqli_prepare($conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;
            if (mysqli_stmt_execute($stmt)) {

                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $reference = $row['Reference'];
                    $categorie = $row['Categorie'];
                    $puht = $row['PUHT'];
                    $description = $row['Description'];
                    $stock = $row['Stock'];
                    $id = $row['id'];
                }
            } else {
                echo "Oops ! erreur inattendu, réésayer plous tard !!!";
            }
        } else {
            header('location: ./index_admin.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Mise à jour des produits <?php echo $reference; ?></h2>
                </div>
                <p>Changez les valeurs et validez !!! </p>
                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                    <div class="form-group">
                        <label>Reference</label>
                        <input type="text" name="reference" class="form-controle <?php echo (!empty($reference_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $reference; ?>">
                        <span class="invalid-feedback"><?php echo $reference_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Categorie</label>
                        <textarea name="categorie" class="form-control <?php echo (!empty($categorie_err)) ? 'is-invalid' : ''; ?>"><?php echo $categorie; ?></textarea>
                        <span class="invalid-feedback"><?php echo $categorie_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>PUHT</label>
                        <input type="text" name="puht" class="form-control <?php echo (!empty($puht_err)) ? 'is-invalid' : ''; ?>"value = "<?php echo $puht; ?>">
                        <span class="invalid-feedback"><?php echo $puht_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                        <span class="invalid-feedback"><?php echo $description_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" name="stock" class="form-control <?php echo (!empty($stock_err)) ? 'is-invalid' : ''; ?>"value = "<?php echo $stock; ?>">
                        <span class="invalid-feedback"><?php echo $stock_err; ?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                    <a href="../index_admin.php" class="btn btn-secondary ml-2">Annuler</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>