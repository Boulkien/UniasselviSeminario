<?php
session_start();

include_once "config.php";

$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);

$sql = "SELECT * FROM users WHERE NOT unique_id = ? AND (fname LIKE ? OR lname LIKE ?)";
$stmt = mysqli_prepare($connection, $sql);
$searchTerm = "%{$searchTerm}%";
mysqli_stmt_bind_param($stmt, "iss", $outgoing_id, $searchTerm, $searchTerm);
mysqli_stmt_execute($stmt);
$query = mysqli_stmt_get_result($stmt);

$output = "";

if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){

        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = ? OR outgoing_msg_id = ?) AND (outgoing_msg_id = ? OR incoming_msg_id = ?) ORDER BY msg_id DESC LIMIT 1"; 
        $stmt2 = mysqli_prepare($connection, $sql2);
        mysqli_stmt_bind_param($stmt2, "iiii", $row['unique_id'], $row['unique_id'], $outgoing_id, $outgoing_id);
        mysqli_stmt_execute($stmt2);
        $query2 = mysqli_stmt_get_result($stmt2);
        $row2 = mysqli_fetch_assoc($query2);

        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        } else {
            $result = "Sem mensagens disponíveis.";
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;

        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Você: " : $you = "";
        }else{
            $you = "";
        }

        ($row['status'] == 'Offline') ? $offline = 'offline' : $offline = '';

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                        <div class="content">
                            <img src="../backend/images/'. $row['img'] .'" alt="">
                            <div class="details">
                                <span>'. $row['fname'] . ' ' . $row['lname'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';

        echo $row['status'];

    }
} else {
    $output .= "Nenhum usuário encontrado.";
}

echo $output;
?>
