var inputKelas = new Vue({
    el : "main",
    data : {
        dataAngkatan : null,
        dataDosen : null,
    },
    created : function(){
        const smallError = document.getElementById("smallError");
        smallError.style.color = "white";
    },
    mounted : function(){
        fetch("http://127.0.0.1:8000/api/get/generation/for_input_kelas")
            .then(response => response.json())
            .then(data => this.dataAngkatan = data);

        fetch("http://127.0.0.1:8000/api/get/dosen/for_input_kelas")
            .then(response => response.json())
            .then(data => this.dataDosen = data);
    },
    methods : {
        onSubmit : function() {
            const smallError = document.getElementById("smallError");
            smallError.style.color = "red";
            const inputName = document.getElementById("inputName");
            const inputGeneration = document.getElementById("inputGeneration");
            const inputHomeroom = document.getElementById("inputHomeroom");

            let formData = {
                name : "?name="+inputName.value,
                generation_id : "&generation_id="+inputGeneration.value,
                homeroom_id : "&homeroom_id="+inputHomeroom.value
            };

            fetch("http://127.0.0.1:8000/api/post/kelas/store"+formData.name+formData.generation_id+formData.homeroom_id)
                .then(response => response.json())
                .then(data => this.checkResponse(data));
        },
        checkResponse : function(isSuccess) {
            if (isSuccess) {
                window.history.back();
            }
            else {
                const smallError = document.getElementById("smallError");
                smallError.style.color = "red";
            }
        }
    }
});