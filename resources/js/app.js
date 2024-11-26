import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        var alert = document.getElementById('success_5sec');
        if (alert) {
            alert.classList.add('fade-out');
            setTimeout(function() {
                alert.style.display = 'none';
            }, 1000); // Match the duration of the CSS transition
        }
    }, 3500); // 5000 milliseconds = 5 seconds
});

import Swal from 'sweetalert2';
window.Swal = Swal;


document.addEventListener('DOMContentLoaded', function () {
    const deleteInputs = document.querySelectorAll('.btn-delete');

    deleteInputs.forEach(input => {
        input.addEventListener('click', function (event) {
            event.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});