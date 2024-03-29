<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">

        <section class="users">
            <header>
            
            <?php
                include_once "../backend/config.php";

                $sql = mysqli_query($connection, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

                if(mysqli_num_rows($sql) > 0){
                    $result = mysqli_fetch_assoc($sql);
                }
            ?>

                <div class="content">
                    <img src="../backend/images/<?php echo $result['img'];?>" alt="">
                    <div class="details">
                        <span>
                            <?php echo $result['fname'] . " " . $result['lname'];?>
                            <i class="fa-solid fa-user-xmark delete-account-button"></i>
                        </span>
                        <p>
                            <?php echo $result['status'];?>
                        </p>
                    </div>
                </div>
                <a href="../backend/logout.php?logout_id=<?php echo $result['unique_id']?>" class="logout">Sair</a>
            </header>

            <div class="search">
                <span class="text">Pesquisar ou começar uma nova conversa</span>
                <input type="text" placeholder="Insira um nome para pesquisar...">
                <button><i class="fas fa-search"></i></button>
            </div>

            <div class="users-list">
                
            </div>
        </section>
    </div>

    <script src="scripts/users.js"></script>
    <script src="scripts/delete-account.js"></script>

</body>
</html>