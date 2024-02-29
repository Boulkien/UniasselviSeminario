<?php 

    while($row = mysqli_fetch_assoc($sql)){

        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                 OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                 OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1"; 

        $query2 = mysqli_query($connection, $sql2);
        $row2= mysqli_fetch_assoc($query2);

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

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                        <div class="content">
                            <img src="../backend/images/'. $row['img'] .'".alt="">
                            <div class="details">
                                <span>'. $row['fname'] . ' ' . $row['lname'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                        </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>';
    }

?>