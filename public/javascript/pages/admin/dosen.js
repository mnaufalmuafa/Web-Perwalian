// const btnEditCollection = document.getElementsByClassName("btnEdit");

// for (const btnEdit of btnEditCollection) {
//     btnEdit.addEventListener("click", function() {
//         window.location.href = "/admin/dashboard/dosen/update";
//     });
// }

var dosenPage = new Vue({
    el : "main",
    data : {
        dataDosen : null,
    },
    created : function() {
        window.addEventListener("pageshow", this.onpageshow);
    },
    methods : {
        onpageshow : function(event) {
            fetch("/get/get_all_dosen")
                .then(response => response.json())
                .then(data => this.dataDosen = data);
            
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        }
    }
});