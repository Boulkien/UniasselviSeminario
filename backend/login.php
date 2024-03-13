<?php 
session_start();

include_once "config.php";

$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($email) && !empty($password)){
    //Checando se o e-mail e senha do usuário são compatíveis com o banco
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);

    //Se as credenciais do usuário forem compatíveis
    if(mysqli_num_rows($query) > 0){
        $result = mysqli_fetch_assoc($query);
        $status = "Online";
        $update_query = mysqli_query($connection, "UPDATE users SET status = '{$status}' WHERE unique_id = {$result['unique_id']}");
        
        if($update_query){
            $_SESSION['unique_id'] = $result['unique_id'];
            echo "success";
        }
    }else{
        echo "E-mail ou senha inválidos!";
    }

} else {
    echo "Necessário preencher todos os campos!";
};
?>
