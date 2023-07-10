<?php
$host= "localhost";
$user= "root";
$pass= "";

$conn = mysqli_connect($host,$user,$pass);

if(!$conn){
    die("connexion erreur:".mysqli_connect_error());
}

$sql = "CREATE DATABASE if not exists login"; 

if(mysqli_query($conn,$sql)){
    echo "La BDD a éte créée";
}else{
    echo "Creation KO";
}
echo '<hr>';

mysqli_close($conn)

?>