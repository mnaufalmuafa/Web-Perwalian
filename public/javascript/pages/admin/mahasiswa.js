var kelasPage = new Vue({
    el : "main",
    data : {
        dataMahasiswa : null
    },
    created : function() {
        window.addEventListener("pageshow", this.onpageshow);
    },
    filters : {
        showClass : function(kelas) {
            return kelas == null ? "-" : kelas;
        }
    },
    methods : {
        onpageshow : function(event) {
            fetch("/api/get/mahasiswa/data_mahasiswa_page")
                .then(response => response.json())
                .then(data => this.assignData(data));
            
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        },
        redirectToEditPage : function(id) {
            this.dataMahasiswa = null;
            window.location.href = "/admin/dashboard/mahasiswa/update?id="+id;
        },
        deleteMahasiswa : function(id, name) {
            const willDelete = confirm("Apakah anda yakin akan menghapus mahasiswa \""+name+"\"");
            if (willDelete) {
                fetch("http://127.0.0.1:8000/api/post/mahasiswa/delete?id="+id);
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

            this.dataMahasiswa = data;
        }
    }
});