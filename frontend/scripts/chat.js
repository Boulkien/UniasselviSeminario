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
              scrollToBottom();
            }
        }
    }

    let formData = new FormData(form); //Criando novo objeto formData

    xmlRequest.send(formData); //Enviando o form para o php
}

chatBox.onmouseenter = () => {
    chatBox.classList.add('active')
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove('active')
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
                
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); //Criando novo objeto formData
    xmlRequest.send(formData); //Enviando o form para o php

}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}