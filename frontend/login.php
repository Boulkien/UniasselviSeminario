<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Uniasselvi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    
</head>
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
                    <input type="text" placeholder="Digite seu e-mail">
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" placeholder="Digite sua senha">
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