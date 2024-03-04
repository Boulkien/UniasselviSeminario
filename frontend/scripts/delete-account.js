const deleteButton = document.querySelector(".delete-account-button");

deleteButton.onclick = () => {
    let confirmation = confirm("Você deseja mesmo remover sua conta?");

    if (confirmation) {
        let xmlRequest = new XMLHttpRequest();
        xmlRequest.open("POST", "../backend/delete-account.php");

        xmlRequest.onload = () => {
            if (xmlRequest.readyState === XMLHttpRequest.DONE) {
                if (xmlRequest.status === 200) {
                    let data = xmlRequest.response;

                    console.log(data);

                    if (data === "success") {
                        location.href = "login.php";
                    } else {
                        // Trate qualquer erro retornado pelo delete-account.php
                        console.error("Erro ao excluir conta:", data);
                    }
                }
            }
        };

        xmlRequest.send(); // Enviar solicitação sem dados, pois não precisa enviar nenhum dado para excluir a conta
    }
};