function loadHTML(id, url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById(id).innerHTML = data;
        });
}

document.addEventListener("DOMContentLoaded", function() {
    loadHTML("insertedImports", "imports.html");
    loadHTML("insertedNavbar", "navbar_footer/navbar.html");
    loadHTML("insertedFooter", "navbar_footer/footer.html");
});