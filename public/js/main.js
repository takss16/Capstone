document.addEventListener('DOMContentLoaded', function() {
    const changePasswordForm = document.getElementById('change-password-form');
    const newPasswordInput = document.getElementById('new_password');
    const confirmPasswordInput = document.getElementById('new_password_confirmation');
    const newPasswordError = document.getElementById('new_password_confirmation_error');

    changePasswordForm.addEventListener('submit', function(event) {
        if (newPasswordInput.value !== confirmPasswordInput.value) {
            newPasswordError.textContent = 'New Password and Confirm New Password must match.';
            event.preventDefault(); // Prevent form submission
        } else if (newPasswordInput.value.length < 8) {
            newPasswordError.textContent = 'New Password must be at least 8 characters.';
            event.preventDefault(); // Prevent form submission
        } else {
            newPasswordError.textContent = ''; // Clear the error message
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var contactInput = document.getElementById('contact');

    contactInput.addEventListener('input', function() {
        var contactValue = this.value;
        
        if (isValidContact(contactValue)) {
            this.setCustomValidity('');
        } else {
            this.setCustomValidity('Contact must be a number with exactly 11 digits');
        }

        console.log('Contact input value:', contactValue);
        console.log('Custom validity message:', this.validationMessage);
    });

    function isValidContact(contact) {
        var numericRegex = /^[0-9]+$/;
        return numericRegex.test(contact) && contact.length === 11;
    }
});


// document.addEventListener('DOMContentLoaded', function () {
//     function filterTable(inputId, tableId) {
//         const input = document.getElementById(inputId);
//         const table = document.getElementById(tableId);
//         const rows = table.getElementsByTagName("tr");
    
//         input.addEventListener("input", function () {
//             const filter = input.value.toLowerCase();
//             for (let i = 1; i < rows.length; i++) {
//                 const name = rows[i].getElementsByTagName("td")[0];
//                 if (name) {
//                     const text = name.textContent || name.innerText;
//                     if (text.toLowerCase().indexOf(filter) > -1) {
//                         rows[i].style.display = "";
//                     } else {
//                         rows[i].style.display = "none";
//                     }
//                 }
//             }
//         });
//     }
// });

