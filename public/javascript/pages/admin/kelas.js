var dosenPage = new Vue({
    el : "main",
    data : {
        dataKelas : null
    },
    created : function() {
        window.addEventListener("pageshow", this.onpageshow);
    },
    filters : {
        showGeneration : function(generation) {
            return generation == null ? "-" : generation ;
        },
        showDosenWali : function(dosen_wali) {
            return dosen_wali == null ? "-" : dosen_wali ;
        }
    },
    methods : {
        onpageshow : function(event) {
            fetch("/api/get/kelas/data_kelas_page")
                .then(response => response.json())
                .then(data => this.assignData(data));
            
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        },
        redirectToEditPage : function(id) {
            this.dataKelas = null;
            window.location.href = "/admin/dashboard/kelas/update?id="+id;
        },
        deleteClass : function(id, name) {
            const willDelete = confirm("Apakah anda yakin akan menghapus kelas \""+name+"\"");
            if (willDelete) {
                fetch("http://127.0.0.1:8000/api/post/kelas/delete?id="+id);
                window.location.reload();
            }
        },
        checkDeleted : function(dosen) {
            return dosen.isDeleted === 0;
        },
        assignData : function(data) {
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

            this.dataKelas = data;
        }
    }
});