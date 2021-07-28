console.log("update dosen");

var updateDosen = new Vue({
    el : "main",
    methods : {
        onSubmit : function() {
            const inputLecturerCode = document.getElementById("inputLecturerCode");
            const inputId = document.getElementById("inputId");
            fetch("http://127.0.0.1:8000/post/edit_dosen?id="+inputId.value+"&lecturer_code="+inputLecturerCode.value);
            window.history.back();
        }
    }
});