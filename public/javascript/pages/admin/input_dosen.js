var inputDosen = new Vue({
    el : "main",
    created : function(){
        const smallError = document.getElementById("smallError");
        smallError.style.display = "none";
    },
    methods : {
        onSubmit : function() {
            const inputLecturerCode = document.getElementById("inputLecturerCode");
            fetch("http://127.0.0.1:8000/post/store_dosen?lecturer_code="+inputLecturerCode.value)
                .then(response => response.json())
                .then(data => this.checkResponse(data));
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