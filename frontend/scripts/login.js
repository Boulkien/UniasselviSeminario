const form = document.querySelector(".login form"),
    continueButton = form.querySelector(".button input"),
    errorText = form.querySelector(".error-txt");

form.addEventListener("submit", (event) => {
    event.preventDefault();
});

continueButton.addEventListener("click", () => {
    const formData = new FormData(form);

    fetch("../backend/login.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro ao fazer login.");
        }
        return response.text();
    })
    .then(data => {
        console.log("Resposta do servidor:", data); // Adicione esta linha para verificar a resposta do servidor no console
        if (data.trim() === "success") { // Use trim() para remover espaços em branco extras
            location.href = "users.php";
        } else {
            errorText.textContent = data;
            errorText.style.display = "block";
        }
    })
    .catch(error => {
        console.error("Erro:", error.message);
    });
});

