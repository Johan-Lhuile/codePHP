<?php


function display2(){
    if(isset($_POST)){
        echo'<table border = "1">';
        foreach($_POST as $key => $val){
            if($key == 'btnsubmit') continue ;
            echo '<tr>';
            echo "<td>$key</td>";
            if (!is_array($val)){
                echo "<td>$val</td>";
            }else{
                echo '<td><table border = "1">';
                foreach($val as $k => $v) {
                    echo "<tr>";
                    echo "<td>  $v </td>";
                    echo '<tr/>';
                }
                echo '</table></td>';
            }
            echo "</tr>";
        }
        echo '</table>';
    }
}

display2();

?>