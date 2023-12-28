$(document).ready(function () {
    // ? Disable the button when the form is clicked
    $("#transactionForm").submit(function (e) {
        //* Disable the submit button
        $("#submitButton").attr("disabled", true);
        //* Continue with the form submission
        return true;
    });


    // TODO: What next? :)
});

//* Sidebar Dashboard Confirm
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

//* Sidebar & Header Dashboard Confirm
// Showing Sweet alert when li clicked.
document.getElementById('logout-li-header').addEventListener('click', function() {
    confirmLogout();
});
document.getElementById('logout-li-sidebar').addEventListener('click', function() {
    confirmLogout();
});

//* Button Confirm
// Confirm Delete
function confirmDelete() {
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Kamu akan menghapus data ini.",
        icon: "warning",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        showCancelButton: true,
        cancelButtonText: "Batal",
        confirmButtonText: "Ya, hapus!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengonfirmasi, kirim formulir logout
            document.getElementById('confirm-delete').submit();
        }
    });
}

//* Transacion Input Checked
// Transaction Create Get Input
document.addEventListener('DOMContentLoaded', function () {
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Jika checkbox saat ini dicentang
            if (this.checked) {
                // Uncheck checkbox lainnya
                checkboxes.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
});

