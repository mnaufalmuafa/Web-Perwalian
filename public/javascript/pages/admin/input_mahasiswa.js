var inputMahasiswa = new Vue({
    el : "main",
    data : {
        dataKelas : null,
        dataDosen : null,
    },
    created : function(){
        const smallError = document.getElementById("smallError");
        smallError.style.display = "none";
    },
    mounted : function(){
        fetch("http://127.0.0.1:8000/api/get/kelas/input_mahasiswa_page")
            .then(response => response.json())
            .then(data => this.dataKelas = data);
    },
    methods : {
        onSubmit : function() {
            const smallError = document.getElementById("smallError");
            smallError.style.color = "red";
            const inputName = document.getElementById("inputName");
            const inputNIM = document.getElementById("inputNIM");
            const inputStatus = document.getElementById("inputStatus");
            const inputClassId = document.getElementById("inputClassId");

            let formData = {
                name : "?name="+inputName.value,
                nim : "&nim="+inputNIM.value,
                status : "&status="+inputStatus.value,
                class_id : "&class_id="+inputClassId.value
            };

            fetch("http://127.0.0.1:8000/api/post/mahasiswa/store"+ formData.name + formData.nim + formData.status + formData.class_id )
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