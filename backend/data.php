<?php 

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

?>