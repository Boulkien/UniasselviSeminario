<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>
                <img src="../imgs/uniasselvi-logo.png" class="logo-uniasselvi" alt="">
                Chat Uniasselvi
            </header>
            
            <form action="#">
                <div class="error-txt"></div>

                <div class="field input">
                    <label>E-mail</label>
                    <input type="text" name="email" placeholder="Digite seu e-mail">
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Digite sua senha">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Vá para o Chat">
                </div>
            </form>

            <div class="link">Ainda não tem conta? <a href="index.php">Inscreva-se!</a></div>

        </section>
    </div>

    <script src="scripts/pass-censor.js"></script>
    <script src="scripts/login.js"></script>


</body>
</html>