<?php
session_start();
include_once "config.php";

if (isset($_SESSION['unique_id'])) {

    $unique_id = $_SESSION['unique_id'];

    // Query para remover o usuário do banco de dados
    $sql = "DELETE FROM users WHERE unique_id = $unique_id";

    // Executar a query
    if (mysqli_query($connection, $sql)) {
        // Remoção bem-sucedida, enviar "success" de volta para o front-end
        echo "success";
        exit(); // Certifique-se de sair após enviar a resposta
    } else {
        // Se houver algum erro ao executar a query, enviar uma mensagem de erro de volta para o front-end
        echo "Erro ao remover o usuário: " . mysqli_error($connection);
        exit(); 
    }
} else {
    // Se o usuário não estiver logado, enviar uma mensagem de erro de volta para o front-end
    echo "Erro: Usuário não está logado";
    exit();
}
?>