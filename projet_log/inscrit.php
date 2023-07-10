<?php
session_start();

$_SESSION['erreur'] = '';

require_once './php/crud/protection.php';

if ((!empty($_POST['pseudo']) && filter_var($_POST['pseudo'], FILTER_VALIDATE_EMAIL))){
    $pseudo = $_POST['pseudo'];
}else{
    $_SESSION['erreur'].='champs incorrect';
    header('location: ./inscription.php');
    exit();
}

if(!empty($_POST['password'])){
    $password = $_POST['password'];
}else{
    $_SESSION['erreur'] .='champs incorrect';
    header('location: ./inscription.php');
    exit();
}

require_once './php/crud/config.php';

$login = protect_montexte($pseudo);
$password = protect_montexte($password);

$pass = password_hash($password, PASSWORD_ARGON2ID);

$sql = "insert into user (login, mdp, role, isVerified) values (?,?,?,?)";

if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "sssi", $param_login, $param_mdp, $param_role, $param_verif);
    $param_login = $login;
    $param_mdp = $pass;
    $param_role = "user";
    $param_verif = false;

    if(mysqli_stmt_execute($stmt)){
        header('location: ./index.php');
        exit();
    }
}


?>