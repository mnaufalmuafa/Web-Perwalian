var updateDosen = new Vue({
    el : "main",
    created : function(){
        const smallError = document.getElementById("smallError");
        smallError.style.display = "none";
    },
    methods : {
        onSubmit : function() {
            const inputLecturerCode = document.getElementById("inputLecturerCode");
            const inputLecturerCodePrevious = document.getElementById("inputLecturerCodePrevious");
            const inputId = document.getElementById("inputId");
            if (inputLecturerCode.value == inputLecturerCodePrevious.value) {
                window.history.back();
            }
            else {
                fetch("http://127.0.0.1:8000/api/post/dosen/edit?id="+inputId.value+"&lecturer_code="+inputLecturerCode.value)
                    .then(response => response.json())
                    .then(data => this.checkResponse(data));
            }
        },
        checkResponse : function(isSuccess) {
            if (isSuccess) {
                window.history.back();
            }
            else {
                const smallError = document.getElementById("smallError");
                smallError.style.display = "block";
            }
        }
    }
});