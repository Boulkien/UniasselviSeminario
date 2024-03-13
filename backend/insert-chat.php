<?php 
session_start();
    
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_POST["outgoing_id"];
    $incoming_id = $_POST["incoming_id"];
    $message = $_POST["message"];

    if(!empty($message)){
        $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "iis", $incoming_id, $outgoing_id, $message);
        mysqli_stmt_execute($stmt);
    }

} else {
    header("location: ../login.php");
}
?>
