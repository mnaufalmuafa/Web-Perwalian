const btnEditCollection = document.getElementsByClassName("btnEdit");

for (const btnEdit of btnEditCollection) {
    btnEdit.addEventListener("click", function() {
        window.location.href = "/admin/dashboard/kelas/edit";
    });
}