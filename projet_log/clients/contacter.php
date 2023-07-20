<?php

require_once '../php/crud/config.php';

$email = $_POST['email'];
$name = $_POST['nom'];
$phone = $_POST['tel'];
$message = $_POST['message'];


$sql = "INSERT INTO contacts (nom, email, tel, message) VALUES (?,?,?,?)";

if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt,"ssss", $param_email, $param_name, $param_phone, $param_message);
    $param_email = $email;
    $param_name = $name;
    $param_phone = $phone;
    $param_message = $message;

    if(mysqli_stmt_execute($stmt)){

        ini_set('display_errors',1);
        error_reporting(E_ALL);
        $from = $email;
        $to= "lhuilejohan85@gmail.com";
        $subject = "Contact par le site ";
        $header = "De: " . $from;

        mail($to, $subject, $message);
        echo "L'email a éte envoyé.";
        
        header('location: ../index.php');
        exit();
    }
} 