<?php

require ('config.php');

// Création de la  table users (procédurale)

$sql = "CREATE TABLE IF NOT EXISTS user(

    id int(6) unsigned auto_increment primary key,
    login varchar(50) unique not null,
    mdp varchar(150) not null,
    role varchar(15) not null,
    isVerified bool null),
    token_reset varchar(150) null)";
    


// On test si la table est bien créée

if(mysqli_query($conn,$sql)){

    echo "Table 'CLIENTS' est créée <br><hr>";

}else{

    echo "Erreur de création table client <br><hr>";

}


$sql = "CREATE TABLE IF NOT EXISTS produits(

    id int(6) unsigned auto_increment primary key,
    Reference varchar(50) not null,
    Categorie varchar(150) not null,
    PUHT float(15) not null,
    tva int(10) not null,
    Description text not null,
    Stock int(10) not null)";

if(mysqli_query($conn,$sql)){

    echo "Table 'Produits' est créée <br><hr>";

}else{

    echo "Erreur de création table produits <br><hr>";

}

$sql = "CREATE TABLE IF NOT EXISTS clients (

    id int(6) unsigned auto_increment primary key,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    tel varchar (15) not null,
    adresse text not null,
    cp varchar(10) not null,
    ville varchar(50) not null,
    user_id int(15) null,
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES user(id))";            
        

if(mysqli_query($conn,$sql)){

    echo "Table 'Clients' est créée <br><hr>";

}else{

    echo "Erreur de création table Clients <br><hr>";

}
    
$sql = "CREATE TABLE IF NOT EXISTS contacts (

    id int(6) unsigned auto_increment primary key,
    nom varchar(50) not null,
    email varchar(50) not null,
    tel varchar (15) not null,
    message text not null)";
    
if(mysqli_query($conn,$sql)){

    echo "Table 'contacts' est créée <br><hr>";

}else{

    echo "Erreur de création table contacts <br><hr>";

}
$conn -> close();





?>