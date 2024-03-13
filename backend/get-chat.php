<?php 
session_start();
    
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_POST["outgoing_id"];
    $incoming_id = $_POST["incoming_id"];
    $output = "";

    $sql = "SELECT * FROM messages 
            LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id 
            WHERE (outgoing_msg_id = ? AND incoming_msg_id = ?)
            OR (outgoing_msg_id = ? AND incoming_msg_id = ?) 
            ORDER BY msg_id";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "iiii", $outgoing_id, $incoming_id, $incoming_id, $outgoing_id);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($query) > 0){
        while($result = mysqli_fetch_assoc($query)){
            if($result['outgoing_msg_id'] == $outgoing_id){
                // Mensagem enviada pelo usuário atual
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $result['msg'] .'</p>
                                </div>
                            </div>';
            } else {
                // Mensagem recebida pelo usuário atual
                $output .= '<div class="chat incoming">
                                <img src="../backend/images/'. $result['img']  .'" alt="">
                                <div class="details">
                                    <p>'. $result['msg'] .'</p>
                                </div>
                            </div>';
            }
        }
        echo $output;
    }
} else {
    header("location: ../login.php");
}

// Saída de depuração para verificar os valores de $outgoing_id e $incoming_id
// echo "outgoing_id: " . $outgoing_id . "<br>";
// echo "incoming_id: " . $incoming_id . "<br>";
?>
