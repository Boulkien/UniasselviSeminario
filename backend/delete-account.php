<?php
session_start();
include_once "config.php";

if (isset($_SESSION['unique_id'])) {
    $unique_id = $_SESSION['unique_id'];

    // Query para remover o usuário do banco de dados
    $sql = "DELETE FROM users WHERE unique_id = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $unique_id);
    mysqli_stmt_execute($stmt);

    // Verificar se a remoção foi bem-sucedida
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Remoção bem-sucedida, enviar "success" de volta para o front-end
        echo "success";
    } else {
        // Se houver algum erro ao executar a query, enviar uma mensagem de erro de volta para o front-end
        echo "Erro ao remover o usuário: " . mysqli_error($connection);
    }
} else {
    // Se o usuário não estiver logado, enviar uma mensagem de erro de volta para o front-end
    echo "Erro: Usuário não está logado";
}
?>
