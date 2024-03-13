const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendButton = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.addEventListener("submit", (event) => {
    event.preventDefault();
});

sendButton.addEventListener("click", () => {
    const formData = new FormData(form);

    fetch("../backend/insert-chat.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro ao enviar mensagem.");
        }
        return response.text();
    })
    .then(data => {
        inputField.value = "";
        scrollToBottom();
    })
    .catch(error => {
        console.error("Erro:", error.message);
    });
});

chatBox.addEventListener("mouseenter", () => {
    chatBox.classList.add('active');
});

chatBox.addEventListener("mouseleave", () => {
    chatBox.classList.remove('active');
});

setInterval(() => {
    fetch("../backend/get-chat.php", {
        method: "POST",
        body: new FormData(form)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro ao buscar mensagens.");
        }
        return response.text();
    })
    .then(data => {
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
            scrollToBottom();
        }
    })
    .catch(error => {
        console.error("Erro:", error.message);
    });
}, 500);

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}