// const footerLecturer = document.getElementById("footerLecturer");
// const footerStudent = document.getElementById("footerStudent");
// const footerClass = document.getElementById("footerClass");

// footerLecturer.addEventListener("click", function() {
//     window.location.href = "/admin/dashboard/dosen";
// });

// footerStudent.addEventListener("click", function() {
//     window.location.href = "/admin/dashboard/mahasiswa";
// });

// footerClass.addEventListener("click", function() {
//     window.location.href = "/admin/dashboard/kelas";
// });

var dashboard = new Vue({
    el : "#body-main-content",
    data : {
        dosenCount : null,
        kelasCount : null,
        mahasiswaCount : null,
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
    },
    methods : {
        redirectToInfo : function(category) {
            window.location.href = "/admin/dashboard/"+category;
        }
    }
});