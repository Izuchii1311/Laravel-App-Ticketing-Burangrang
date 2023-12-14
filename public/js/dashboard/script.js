// Confirm Logout
function confirmLogout() {
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Kamu akan logout dari akun ini.",
        icon: "warning",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        showCancelButton: true,
        cancelButtonText: "Batal",
        confirmButtonText: "Ya, logout saja!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengonfirmasi, kirim formulir logout
            document.getElementById('logout-form').submit();
        }
    });
}

// Sidebar & Navbar Dashboard
// Showing Sweet alert when li clicked.
document.getElementById('logout-li-header').addEventListener('click', function() {
    confirmLogout();
});
document.getElementById('logout-li-sidebar').addEventListener('click', function() {
    confirmLogout();
});