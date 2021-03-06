var dosenPage = new Vue({
    el : "main",
    data : {
        dataDosen : null,
        dataKodeDosen : [], // berisi kode dosen
        dataIdDosen : [], // berisi id dosen
        dataKelas : [],
    },
    created : function() {
        window.addEventListener("pageshow", this.onpageshow);
    },
    methods : {
        onpageshow : function(event) {
            fetch("/api/get/dosen/for_data_dosen")
                .then(response => response.json())
                .then(data => this.assignData(data));
            
            
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        },
        redirectToEditPage : function(id) {
            this.dataDosen = null;
            window.location.href = "/admin/dashboard/dosen/update?id="+id;
        },
        deleteLecturer : function(id, lc) {
            const willDelete = confirm("Apakah anda yakin akan menghapus dosen \""+lc+"\"");
            if (willDelete) {
                fetch("http://127.0.0.1:8000/api/post/dosen/delete?id="+id);
                window.location.reload();
            }
        },
        checkDeleted : function(dosen) {
            return dosen.isDeleted === 0;
        },
        assignData : function(data) {
            data = this.filterDeleted(data);
            this.dataDosen = this.mergeSameDosen(data);
        },
        filterDeleted : function(data) {
            let i = 0;
            let deleted_index = [];
            for (const d of data) {
                if (d.is_deleted == 1) {
                    deleted_index.push(i);
                }
                i = i + 1;
            }
            
            if (deleted_index.length !== 0) {
                for (let i = deleted_index.length - 1; i >= 0 ; i--) {
                    data.splice(deleted_index[i], 1);
                }
            }

            return data
        },
        mergeSameDosen : function(data) {
            
            // mengisi dataKodeDosen dan dataIdDosen
            for (let i = 0; i < data.length; i++) {
                if (!this.dataKodeDosen.includes(data[i].lecturer_code)) {
                    this.dataKodeDosen.push(data[i].lecturer_code);
                    this.dataIdDosen.push(data[i].id);
                }
            }

            for (let i = 0; i < this.dataKodeDosen.length; i++) {
                this.dataKelas.push([]);
                for (let j = 0; j < data.length; j++) {
                    if (data[j].lecturer_code == this.dataKodeDosen[i] && !data[j].is_deleted_class) {
                        this.dataKelas[i].push(data[j].name);
                    }
                }
            }

            return data;
        }
    }
});