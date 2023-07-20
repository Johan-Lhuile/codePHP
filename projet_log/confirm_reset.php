<?php
 session_start();

 require_once './php/crud/config.php';

 $user_id = $_GET['id'];
 $token = $_GET['token'];

 $_SESSION['id'] = $user_id;

 $sql = "SELECT * FROM user WHERE token_reset = '$token'";

 $res = mysqli_query($conn, $sql);
 $user = mysqli_fetch_array($res);

 if(($user['id'] == $user_id) && ($user['token_reset'] == $token)){
    header('location: ./form_reset.php');

 }else{
    die("Ce token n'est plus valide!!!");
 }