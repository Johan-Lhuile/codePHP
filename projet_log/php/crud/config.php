<?php

$host= "localhost";
$user= "root";
$pass= "";
$db="test"; //nom de la BDD

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("connexion erreur:".mysqli_connect_error());
}

?>