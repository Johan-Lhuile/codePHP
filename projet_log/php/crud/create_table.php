<?php

require_once ('config.php');

// Création de la  table users (procédurale)

$sql = "CREATE TABLE IF NOT EXISTS user(

    id int(6) unsigned auto_increment primary key,
    login varchar(50) not null,
    mdp varchar(150) not null,
    role varchar(15) not null,
    isVerified bool null)";


// On test si la table est bien créée

if(mysqli_query($conn,$sql)){

    echo "Table 'CLIENTS' est créée";

}else{

    echo "Erreur de création";

}



$conn -> close();



?>