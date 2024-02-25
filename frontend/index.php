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
        <section class="form signup">
            
            <header>
                <img src="../imgs/uniasselvi-logo.png" class="logo-uniasselvi" alt="">
                Chat Uniasselvi
            </header>
            
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Primeiro Nome</label>
                        <input type="text" name="fname" placeholder="Primeiro Nome" required>
                    </div>
                    <div class="field input">
                        <label>Sobrenome</label>
                        <input type="text" name="lname" placeholder="Sobrenome" required>
                    </div>
                </div>
                <div class="field input">
                    <label>E-mail</label>
                    <input type="text" name="email" placeholder="Adicione aqui seu e-mail" required>
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Adicione aqui sua senha" required>
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