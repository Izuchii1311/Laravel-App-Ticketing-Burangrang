$(document).ready(function () {
    // ? Disable the button when the form is clicked
    $("#transactionForm").submit(function (e) {
        //* Disable the submit button
        $("#submitButton").attr("disabled", true);
        //* Continue with the form submission
        return true;
    });

    // ? Logout
    $('#logout-li-header, #logout-li-sidebar').click(function() {
        confirmAlert(
            'Apakah kamu Yakin ?',
            'Kamu akan logout dari akun ini.',
            'warning',
            'Batal',
            'Ya, logout saja!',
            'logout-form');
    });

    // TODO: What next? :)
});

// ! Form Delete
function confirmDelete(id) {
    confirmAlert(
        'Apakah kamu yakin?',
        'Kamu akan menghapus data ini.',
        'warning',
        'Batal',
        'Ya, hapus saja!',
        'confirm-delete-' + id);
}

// ? Sweet Alert - Logout
function confirmAlert(title, text, icon, cancelText, confirmText, element) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        showCancelButton: true,
        cancelButtonText: cancelText,
        confirmButtonText: confirmText
    }).then((result) => {
        if (result.isConfirmed) {
            // If the user confirms, submit the logout form
            document.getElementById(element).submit();
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

// Sortable
// const sortable = document.querySelector('.sortable');

// // sortable.addEventListener('click', function(e) {
// //     if (e.target.className = 'name_sort')
// //     {
// //         e.target.setAttribute('checked');
// //     }
// // });