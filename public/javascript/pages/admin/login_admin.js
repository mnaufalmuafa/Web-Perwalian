let loginAdmin = new Vue({
    el : "main",
    data : {
        currentlyFetching : false,
        alreadyFetching : false,
        usernameOrPasswordFalse : false,
        username : "",
        password : "",
    },
    methods : {
        onSubmit : function() {
            this.alreadyFetching = true;
            this.currentlyFetching = true;
            fetch("/api/get/admin/check_login?username="+this.username+"&password="+this.password)
                .then(response => response.json())
                .then(isLoginAccepted => this.checkLoginAccepted(isLoginAccepted));
        },
        checkLoginAccepted: function(isLoginAccepted) {
            this.currentlyFetching = false;
            if (isLoginAccepted) {
                this.usernameOrPasswordFalse = false;
                window.location.href = "/admin/dashboard";
            }
            else {
                this.usernameOrPasswordFalse = true;
            }
        }
    }
});