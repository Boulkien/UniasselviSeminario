<?php
    session_start();
    include_once "config.php";
    
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC");
    $output = "";

    if(mysqli_num_rows($sql) == 0){
        $output .= "Nenhum usuário online. :(";
    }elseif(mysqli_num_rows($sql) > 0) {
       include "data.php";
    } 
    
    echo $output;
?>