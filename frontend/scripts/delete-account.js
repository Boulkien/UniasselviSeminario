const deleteButton = document.querySelector(".delete-account-button");

deleteButton.addEventListener("click", () => {
    const confirmation = confirm("Você deseja mesmo remover sua conta?");

    if (confirmation) {
        fetch("../backend/delete-account.php", {
            method: "POST"
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Erro ao excluir conta.");
            }
            return response.text();
        })
        .then(data => {
            if (data === "success") {
                location.href = "login.php";
            } else {
                console.error("Erro:", data);
            }
        })
        .catch(error => {
            console.error("Erro:", error.message);
        });
    }
});
