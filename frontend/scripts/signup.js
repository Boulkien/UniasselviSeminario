const form = document.querySelector(".signup form"),
    continueButton = form.querySelector(".button input"),
    errorText = form.querySelector(".error-txt");

form.addEventListener("submit", (event) => {
    event.preventDefault();
});

continueButton.addEventListener("click", () => {
    const formData = new FormData(form);

    fetch("../backend/signup.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro ao criar conta.");
        }
        return response.text();
    })
    .then(data => {
        if (data === "success") {
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
