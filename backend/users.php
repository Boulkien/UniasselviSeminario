<?php
    session_start();
    include_once "config.php";
    
    $sql = mysqli_query($connection, "SELECT * FROM users");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "Nenhum usuário online. :(";
    }elseif(mysqli_num_rows($sql) > 0) {
       include "data.php";
    } 
    echo $output;
?>