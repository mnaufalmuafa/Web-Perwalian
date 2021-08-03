const btnLogout = document.getElementById("btnLogout");
btnLogout.addEventListener("click", function() {
    fetch("/api/post/admin/logout").then(response => response).then(window.location.href = "/");
});