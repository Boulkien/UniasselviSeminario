<?php 
    session_start();

    include_once "config.php";

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    
    if(!empty($email) && !empty($password)){
        
        //Checando se o e-mail e senha do usuário são compatíveis com om banco
        $sql = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");

        //Se as credenciais do usuário forem compatíveis
        if(mysqli_num_rows($sql) > 0){
            $result = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $result['unique_id'];
            echo "success";
        }else{
            echo "E-mail ou senha inválidos!";
        }

    } else {
        echo "Necessário preencher todos os campos!";
    };
?>