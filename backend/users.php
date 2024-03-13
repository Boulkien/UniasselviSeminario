<?php
session_start();
include_once "config.php";
    
$outgoing_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM users WHERE NOT unique_id = ? ORDER BY user_id DESC";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $outgoing_id);
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);

$output = "";

if(mysqli_num_rows($query) == 0){
    $output .= "Nenhum usuário online. :(";
}elseif(mysqli_num_rows($query) > 0) {
   include "data.php";
} 

echo $output;
?>
