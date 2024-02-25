const form = document.querySelector(".login form"),
            continueButton = form.querySelector(".button input"),
            errorText = form.querySelector(".error-txt");

form.onsubmit = (n) => {
    n.preventDefault();
}

continueButton.onclick = () => {

    //AJAX Code

    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("POST", "../backend/login.php");

    xmlRequest.onload = ()=> {
        if(xmlRequest.readyState === XMLHttpRequest.DONE){
            if (xmlRequest.status === 200){
                let data = xmlRequest.response;

                if(data == "success") {
                    location.href = "users.php";
                } else {
                    console.log('teste2')
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }

    let formData = new FormData(form); //Criando novo objeto formData

    xmlRequest.send(formData); //Enviando o form para o php
}  