<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            
            <header>
                <img src="../imgs/uniasselvi-logo.png" class="logo-uniasselvi" alt="">
                Chat Uniasselvi
            </header>
            
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Nome</label>
                        <input type="text" name="fname" placeholder="Nome" autocomplete="on" required>
                    </div>
                    <div class="field input">
                        <label>Sobrenome</label>
                        <input type="text" name="lname" placeholder="Sobrenome" autocomplete="on" required>
                    </div>
                </div>
                <div class="field input">
                    <label>E-mail</label>
                    <input type="text" name="email" placeholder="Adicione aqui seu e-mail" autocomplete="on" required>
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Adicione aqui sua senha" autocomplete="on" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Adicione seu avatar</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Siga para o Chat">
                </div>
            </form>

            <div class="link">Já tem conta? <a href="login.php">Entre agora</a></div>

        </section>

        <script src="scripts/pass-censor.js"></script>
        <script src="scripts/signup.js"></script>
        
    </div>
</body>
</html>