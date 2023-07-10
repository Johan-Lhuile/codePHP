<?php
session_start();

require_once './config.php';

require_once './protection.php';

$login_ok = protect_montexte($_GET['login']);
$pass_ok = protect_montexte($_GET['password']);

// http://localhost/test php/projet_log/php/crud/role.php?login=lhuilejohan85@gmail.com&password=Rip8060015091985

if($pass_ok == "Rip8060015091985"){
    $sql = "update user set role=? where login=?";

    if ($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "ss", $param_role, $param_login);

        $param_role = 'ADMIN';
        $param_login = $login_ok;

        if(mysqli_stmt_execute($stmt)){
            mysqli_close($conn);

            header('location: ../../index.php');
            exit();
        }
    }
}else{
    header('location: ../../index.php');
    exit();
}
?>