<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($connection, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline";
            $update_query = mysqli_query($connection, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($update_query){
                session_unset();
                session_destroy();
                header('location: ../frontend/login.php');
            }
        } else {
            header("location: ../frontend/users.php");
        }
    } else {
        header("location: ../frontend/login.php");
    }
?>