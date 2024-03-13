const searchBar = document.querySelector(".users .search input"),
    searchButton = document.querySelector(".users .search button"),
    usersList = document.querySelector(".users .users-list");

searchButton.addEventListener("click", () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchButton.classList.toggle("active");
    searchBar.value = "";
});

searchBar.addEventListener("keyup", () => {
    const searchTerm = searchBar.value;

    if (searchTerm !== "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }

    fetch("../backend/search.php", {
        method: "POST",
        body: "searchTerm=" + encodeURIComponent(searchTerm),
        headers: {
            "Content-type": "application/x-www-form-urlencoded"
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro ao buscar usuários.");
        }
        return response.text();
    })
    .then(data => {
        usersList.innerHTML = data;
    })
    .catch(error => {
        console.error("Erro:", error.message);
    });
});

setInterval(() => {
    fetch("../backend/users.php")
    .then(response => {
        if (!response.ok) {
            throw new Error("Erro ao buscar usuários.");
        }
        return response.text();
    })
    .then(data => {
        if (!searchBar.classList.contains("active")) {
            usersList.innerHTML = data;
        }
    })
    .catch(error => {
        console.error("Erro:", error.message);
    });
}, 500);
