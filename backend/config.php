<?php
    $connection = mysqli_connect("localhost", "root", "", "uniasselvichat");

    if(!$connection){
        echo "Banco de Dados conectado" . mysqli_connect_error();
    }
?>