var changePassword = new Vue({
    el : "main",
    data : {
        newPassword : "",
        retypeNewPassword : "",
        oldPassword : "",
        csrftoken : null,
        oldPasswordNotFetched : true,
        oldPasswordIsBeingFetching : false,
        oldPasswordWrong : false,
    },
    created : function() {
        this.csrftoken = document.getElementsByName("_token")[0].getAttribute("content");
    },
    methods : {
        onSubmit : function() {
            if (this.newPassword !== "" && this.newPassword === this.retypeNewPassword) {
                this.oldPasswordNotFetched = false;
                this.oldPasswordIsBeingFetching = true;
                fetch('/api/get/admin/is_password_true?password='+this.oldPassword)
                    .then(response => response.json())
                    .then(isOldPasswordTrue => this.checkFetchOldPassword(isOldPasswordTrue));
            }
        },
        checkFetchOldPassword : function(isOldPasswordTrue) {
            if (isOldPasswordTrue) {
                this.oldPasswordWrong = false;
                this.submitData();
                window.location.href = "/";
            }
            else {
                this.oldPasswordIsBeingFetching = false;
                this.oldPasswordWrong = true;
            }
        },
        submitData : function() {
            data = {
                password : this.newPassword,
                _token : this.csrftoken
            };

            fetch("/api/post/admin/change_password", {
                method : "POST",
                headers : {
                    'Content-Type': 'application/json;charset=utf-8'
                },
                body : JSON.stringify(data)
            });
        }
    }
});