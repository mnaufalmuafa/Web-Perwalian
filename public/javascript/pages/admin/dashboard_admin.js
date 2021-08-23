var dashboard = new Vue({
    el : "#body-main-content",
    data : {
        dosenCount : null,
        kelasCount : null,
        mahasiswaCount : null,
        fills : null,
    },
    created : function() {
        window.addEventListener("pageshow", this.onpageshow);
    },
    mounted : function mounted() {
        fetch("/api/get/dosen/count")
            .then(response => response.json())
            .then(data => this.dosenCount = data);

        fetch("/api/get/kelas/count")
            .then(response => response.json())
            .then(data => this.kelasCount = data);

        fetch("/api/get/mahasiswa/count")
            .then(response => response.json())
            .then(data => this.mahasiswaCount = data);

        fetch("/api/get/fill/rekap")
            .then(response => response.json())
            .then(data => this.fills = data);
    },
    methods : {
        redirectToInfo : function(category) {
            window.location.href = "/admin/dashboard/"+category;
        },
        onpageshow : function(event) {
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        },
    }
});