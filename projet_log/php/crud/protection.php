<?php


//protection des inputs

function protect_montexte($param){
    $param = trim($param);
    $param = stripslashes($param);
    $param = htmlspecialchars($param);
    return $param;
}

?>