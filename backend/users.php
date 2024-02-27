<?php
    session_start();
    include_once "config.php";
    
    $sql = mysqli_query($connection, "SELECT * FROM users");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "Nenhum usuário online. :(";
    }elseif(mysqli_num_rows($sql) > 0) {
        while($result = mysqli_fetch_assoc($sql)){
            $output .= '<a href="#">
                            <div class="content">
                                <img src="../backend/images/'. $result['img'] .'".alt="">
                                <div class="details">
                                    <span>'. $result['fname'] . ' ' . $result['lname'] .'</span>
                                    <p>Mensagem de teste</p>
                                </div>
                            </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                        </a>';
        }
    } 
    echo $output;
?>