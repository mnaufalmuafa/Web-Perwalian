const footerLecturer = document.getElementById("footerLecturer");
const footerStudent = document.getElementById("footerStudent");
const footerClass = document.getElementById("footerClass");

footerLecturer.addEventListener("click", function() {
    window.location.href = "/admin/dashboard/dosen";
});

footerStudent.addEventListener("click", function() {
    window.location.href = "/admin/dashboard/mahasiswa";
});

footerClass.addEventListener("click", function() {
    window.location.href = "/admin/dashboard/kelas";
});