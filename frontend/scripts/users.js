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

    if(searchTerm != ""){
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }

    //AJAX Code

    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("POST", "../backend/search.php", true);

    xmlRequest.onload = ()=> {
        if(xmlRequest.readyState === XMLHttpRequest.DONE){
            if (xmlRequest.status === 200){
                let data = xmlRequest.response;
                usersList.innerHTML = data;                
                
            }
        }
    }
    xmlRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlRequest.send("searchTerm=" + searchTerm);
}

//Atualizando a página a cada 500ms 
setInterval(() => {
    //AJAX Code

    let xmlRequest = new XMLHttpRequest();
    xmlRequest.open("GET", "../backend/users.php", true);

    xmlRequest.onload = ()=> {
        if(xmlRequest.readyState === XMLHttpRequest.DONE){
            if (xmlRequest.status === 200){
                let data = xmlRequest.response;
                if(!searchBar.classList.contains("active")){
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xmlRequest.send();

}, 500);