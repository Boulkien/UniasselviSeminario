<?php 
  session_start();
  include_once "../backend/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "header.php";?>

<body>
    <div class="wrapper">

        <section class="chat-area">
            <header>

            <?php
                include_once "../backend/config.php";
                $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
                $sql = mysqli_query($connection, "SELECT * FROM users WHERE unique_id = {$user_id}");

                if(mysqli_num_rows($sql) > 0){
                    $result = mysqli_fetch_assoc($sql);
                }
            ?>

                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="../backend/images/<?php echo $result['img'];?>" alt="">
                <div class="details">
                    <span><?php echo $result['fname'] . " " . $result['lname'];?></span>
                    <p><?php echo $result['status'];?></p>
                </div>
            </header>

            <div class="chat-box">
                
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Mensagem">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="scripts/chat.js"></script>
</body>
</html>