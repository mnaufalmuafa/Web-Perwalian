const footerLecturer = document.getElementById("footerLecturer");
const footerClass = document.getElementById("footerClass");

footerLecturer.addEventListener("click", function() {
    window.location.href = "/admin/dashboard/dosen";
});

footerClass.addEventListener("click", function() {
    window.location.href = "/admin/dashboard/kelas";
});