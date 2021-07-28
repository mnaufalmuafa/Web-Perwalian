var inputDosen = new Vue({
    el : "main",
    methods : {
        onSubmit : function() {
            const inputLecturerCode = document.getElementById("inputLecturerCode");
            fetch("http://127.0.0.1:8000/post/store_dosen?lecturer_code="+inputLecturerCode.value);
            window.history.back();
        }
    }
});