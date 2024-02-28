const form = document.querySelector(".typing-area"),
            inputField = form.querySelector(".input-field"),
            sendButton = form.querySelector("button"),
            chatBox = document.querySelector(".chat-box");

form.onsubmit = (n) => {
    n.preventDefault();
}            

sendButton.onclick = () => {
    
    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("POST", "../backend/insert-chat.php");

    xmlRequest.onload = ()=> {
        if(xmlRequest.readyState === XMLHttpRequest.DONE){
            if (xmlRequest.status === 200){
              inputField.value = ""; 
            }
        }
    }

    let formData = new FormData(form); //Criando novo objeto formData

    xmlRequest.send(formData); //Enviando o form para o php
}

setInterval(() => {
    //AJAX Code

    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("POST", "../backend/get-chat.php", true);

    xmlRequest.onload = ()=> {
        if(xmlRequest.readyState === XMLHttpRequest.DONE){
            if (xmlRequest.status === 200){
                let data = xmlRequest.response;
                chatBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form); //Criando novo objeto formData
    xmlRequest.send(formData); //Enviando o form para o php

}, 500);