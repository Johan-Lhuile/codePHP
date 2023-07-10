<?php

// function display1(){
//     if(isset($_GET)){
//         var_dump($_GET);die
//     }
// }

// display1();

function display1(){
    if(isset($_GET)){
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
    }
}

?>

<div style = "font-size:24px;">
    <?php display1(); ?>
</div>