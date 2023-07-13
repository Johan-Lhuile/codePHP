<?php
session_start();

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
    if($role!='ADMIN') header('location:../index.php');
}else{
    $role = '';
    if($role!='ADMIN') header('location: ../index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" >
</head>
<body>
    <?php include '../../php/includes/menu.php'; ?>
    <h1 class="text-center">Produits</h1>

        <div class="text-center">
            <a class="btn btn-danger" href="./crud_produits/create_produits.php" role="button">+ Ajout produits +</a>
            
        </div>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    require '../../php/crud/config.php';

                    $sql = "select * from produits";

                    if($result = mysqli_query($conn,$sql)){
                        if (mysqli_num_rows($result)>0){
                        echo '<table class="table table-bordered table-striped">';
                            echo '<thead>';
                            echo ' <tr>';
                                echo '<th>id</th>';
                                echo '<th>Reference</th>';
                                echo '<th>Categorie</th>';
                                echo '<th>PUHT</th>';
                                echo '<th>Description</th>';
                                echo '<th>Stock</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '</tbody';

                        while($row = mysqli_fetch_array($result)){
                            echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['Reference'] . '</td>';
                                echo '<td>' . $row['Categorie'] . '</td>';
                                echo '<td>' . $row['PUHT'] . '</td>';
                                echo '<td>' . $row['Description'] . '</td>';
                                echo '<td>' . $row['Stock'] . '</td>';
                                echo '<td>';
                                    echo '<a href="./crud_produits/update_produits.php?id='.$row['id'].'" class="mr-3" title="update" data-toggle="tooltip"><span class="fas fa-pencil-alt"></span></a>';
                                    echo '<a href="./crud_produits/delete_produits.php?id='.$row['id'].'" class="mr-3" title="update" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                    echo '</table>';

                    }else{
                            echo '<div class="alert alert-danger"><em>Aucun produit trouvé.</em></div>';
                        }
                    
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>
    <?php include '../../php/includes/footer.php'; ?>
</body>
</html>