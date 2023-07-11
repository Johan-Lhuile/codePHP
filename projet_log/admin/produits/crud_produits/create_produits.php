<?php
require_once "../../../php/crud/config.php";

$reference = $categorie = $puht = $tva = $description = $stock ="";
$reference_err = $categorie_err = $puht_err = $tva_err = $description_err = $stock_err ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_reference = trim($_POST["reference"]);
    if(empty($input_reference)){
        $reference_err = "entrer une reference"; 
    } else{
        $reference = $input_reference;
    }
    
    $input_categorie = trim($_POST["categorie"]);
    if(empty($input_categorie)){
        $categorie_err = "entrer une catégorie";     
    } else{
        $categorie = $input_categorie;
    }

    $input_puht = trim($_POST["puht"]);
    if(empty($input_puht)){
        $puht_err = "entrer un prix unitaire";
    } else{
        $puht = $input_puht;
    }
    
    $input_tva = trim($_POST["tva"]);
    if(empty($input_tva)){
        $tva_err = "entrer une tva";     
    } else{
        $tva = $input_tva;
    }

    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "entrer la description";     
    } else{
        $description = $input_description;
    }

    $input_stock = trim($_POST["stock"]);
    if(empty($input_stock)){
        $stock_err = "entrer le stock";     
    } else{
        $stock = $input_stock;
    }
  
    if(empty($reference_err) && empty($categorie_err) && empty($puht_err) && empty($tva_err) && empty($description_err) && empty($stock_err)){
       
            $param_reference = $reference;
            $param_categorie = $categorie;
            $param_puht = $puht;
            $param_tva = $tva;
            $param_description = $description;
            $param_stock = $stock;

            $sql = "INSERT INTO produits (Reference, Categorie, PUHT, tva , Description, stock) VALUES ( '$param_reference', '$param_categorie', '$param_puht', '$param_tva', '$param_description', '$param_stock')";
            
            $result = mysqli_query($conn, $sql);
            
            if($result){
                mysqli_close($conn);
                header("location: ../index_produits.php");
                exit();
            } else{
                echo "Oops! erreur inattendu, rééssayez ultérieusement";
            }
        }
    
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
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
                    <h2 class="mt-5">Création d'un produit</h2><br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
                        <div class="form-group">
                            <label>Référence</label>
                            <input type="text" name="reference" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Catégorie</label>
                            <input type="text" name="categorie" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>P.U. HT</label>
                            <input type="text" name="puht" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>TVA</label>
                            <input type="text" name="tva" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="text" name="stock" class="form-control">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="../produits_admin.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>