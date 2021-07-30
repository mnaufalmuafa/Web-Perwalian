const btnLogout = document.getElementById("btnLogout");
btnLogout.addEventListener("click", function() {
    fetch("/api/post/admin/logout");
    window.location.href = "/";
});