const btnEditCollection = document.getElementsByClassName("btnEdit");

for (const btnEdit of btnEditCollection) {
    btnEdit.addEventListener("click", function() {
        window.location.href = "/admin/dashboard/dosen/update";
    });
}

var dosenPage = new Vue({
    el : "main",
    data : {
        dataDosen : null,
    },
    mounted : function mounted() {
        fetch("/get/get_all_dosen")
            .then(response => response.json())
            .then(data => this.dataDosen = data);
    }
});