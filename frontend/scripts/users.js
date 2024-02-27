const searchBar = document.querySelector(".users .search input"),
        searchButton = document.querySelector(".users .search button"),
        usersList = document.querySelector(".users .users-list");
        
searchButton.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchButton.classList.toggle("active");
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;

    //AJAX Code

    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("POST", "../backend/search.php");

    xmlRequest.onload = ()=> {
        if(xmlRequest.readyState === XMLHttpRequest.DONE){
            if (xmlRequest.status === 200){
                let data = xmlRequest.response;
                usersList.innerHTML = data
            }
        }
    }
    xmlRequest.send();
}

//Atualizando a página a cada 500ms 
setInterval(() => {
    //AJAX Code

    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("GET", "../backend/users.php");

    xmlRequest.onload = ()=> {
        if(xmlRequest.readyState === XMLHttpRequest.DONE){
            if (xmlRequest.status === 200){
                let data = xmlRequest.response;
                usersList.innerHTML = data
            }
        }
    }
    xmlRequest.send();

}, 500);