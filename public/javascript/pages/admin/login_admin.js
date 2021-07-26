const form = document.getElementsByTagName("form")[0];
const inputUsername = document.getElementById("inputUsername");
const inputPassword = document.getElementById("inputPassword");
const warnInfo = document.getElementsByTagName("small")[0];

form.addEventListener("submit", function(event) {
    event.preventDefault();
    fetch("http://127.0.0.1:8000/check_login_admin?username="+inputUsername.value+"&password="+inputPassword.value)
        .then(response => response.json())
        .then(data => afterSubmit(data));
});

function afterSubmit(isSuccess) {
    if (isSuccess) {
        warnInfo.classList.add("hidden-small");
        window.location.href = "/admin/dashboard";
    }
    else {
        warnInfo.classList.remove("hidden-small");
    }
}
