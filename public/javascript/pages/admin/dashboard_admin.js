var dashboard = new Vue({
    el : "#body-main-content",
    data : {
        dosenCount : null,
        kelasCount : null,
        mahasiswaCount : null,
        fills : null,
        tahunAjaran : null,
        selectedTahunAjaran : [],
        selectedSemester : [],
    },
    created : function() {
        window.addEventListener("pageshow", this.onpageshow);
    },
    filters : {
        formName : function(id){
            return "Form "+id;
        },
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

        fetch("/api/get/school_year/for_dashboard_admin")
            .then(response => response.json())
            .then(data => this.tahunAjaran = data);

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
        addTaFilter : function(id) {
            if (this.selectedTahunAjaran.includes(id)) {
                this.selectedTahunAjaran.splice(this.selectedTahunAjaran.indexOf(id), 1);
            }
            else {
                this.selectedTahunAjaran.push(id);
            }
        },
        addSemesterFilter : function(semester) {
            if (this.selectedSemester.includes(semester)) {
                this.selectedSemester.splice(this.selectedSemester.indexOf(semester), 1);
            }
            else {
                this.selectedSemester.push(semester);
            }
        },
    }
});