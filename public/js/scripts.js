
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {

        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

  

/// Function to calculate EDC and AOG
function calculateEDCAndAOG() {
    const lmpInput = document.getElementById('lmp');
    const aogInput = document.getElementById('aog');
    const edcInput = document.getElementById('edc');
    const lmpError = document.getElementById('lmp-error');

    // Clear the error message and 'is-invalid' class initially
    lmpError.textContent = '';
    lmpInput.classList.remove('is-invalid');

    // Get the value from the LMP input
    const lmpValue = lmpInput.value;



    const lmpDate = new Date(lmpValue);


    // Check if LMP is within the allowed range (between 9 months ago and yesterday)
    const minDate = new Date();
    minDate.setMonth(minDate.getMonth() - 10);
    const maxDate = new Date();
    maxDate.setDate(maxDate.getDate() - 1);

    if (lmpDate < minDate || lmpDate > maxDate) {
        lmpError.textContent = 'LMP must be between 9 months ago and yesterday';
        lmpInput.classList.add('is-invalid'); // Add Bootstrap's 'is-invalid' class for styling
        return;
    }

    // Calculate EDC
    const edcDate = new Date(lmpDate);
    edcDate.setDate(edcDate.getDate() + 280);

    const edcFormatted = edcDate.toISOString().slice(0, 10);
    edcInput.value = edcFormatted;

    // Calculate AOG
    function updateAOG() {
        const currentDate = new Date();
        const timeDifference = currentDate - lmpDate;
        const aogInDays = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        const aogInWeeks = Math.floor(aogInDays / 7);

        aogInput.value = aogInWeeks + " weeks";
    }

    updateAOG();

    setInterval(updateAOG, 1000 * 60 * 60 * 24);
}

document.addEventListener("DOMContentLoaded", function () {
    // Attach the calculateEDCAndAOG function to the LMP input's change event
    const lmpInput = document.getElementById('lmp');
    lmpInput.addEventListener('change', calculateEDCAndAOG);

    // Trigger the function on page load
    calculateEDCAndAOG();
});



  function printMaternalRecord() {
    // Open the print preview in a new window
    const printWindow = window.open("{{ route('printMaternalRecord', ['id' => $patient->id]) }}", "_blank");

    // Wait for the window to finish loading before triggering the print
    printWindow.onload = function () {
        printWindow.print();
    };
}


document.addEventListener('DOMContentLoaded', function () {
  const selectedItemsList = document.getElementById('selected-items');
  const totalAmountElement = document.getElementById('total-amount');
  const checkboxes = document.querySelectorAll('input[name="items[]"]');
  const packagesCheckboxes = document.querySelectorAll('input[name="packages[]"]');
  const quantityInputs = document.querySelectorAll('input[name^="item_quantity["]');

  checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
          updateSelectedItemsAndTotal();
      });
  });

  packagesCheckboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
          updateSelectedItemsAndTotal();
      });
  });

  quantityInputs.forEach(function (input) {
      input.addEventListener('input', function () {
          updateSelectedItemsAndTotal();
      });
  });

  function updateSelectedItemsAndTotal() {
      selectedItemsList.innerHTML = '';
      let totalAmount = 0;

      checkboxes.forEach(function (checkbox) {
          if (checkbox.checked) {
              const itemId = checkbox.value;
              const itemName = checkbox.getAttribute('data-name');
              const itemPrice = parseFloat(checkbox.getAttribute('data-price'));
              const itemQuantityInput = document.querySelector(`input[name="item_quantity[${itemId}]"]`);
              const itemQuantity = parseInt(itemQuantityInput.value);

              const listItem = document.createElement('div');
              listItem.textContent = `${itemName} (${itemQuantity}) - ₱${(itemPrice * itemQuantity).toFixed(2)}`;
              selectedItemsList.appendChild(listItem);
              totalAmount += itemPrice * itemQuantity;
          }
      });

      packagesCheckboxes.forEach(function (checkbox) {
          if (checkbox.checked) {
              const packageItems = JSON.parse(checkbox.getAttribute('data-items'));
              const packageName = checkbox.getAttribute('data-name');

              const packageTitle = document.createElement('strong');
              packageTitle.textContent = packageName;
              selectedItemsList.appendChild(packageTitle);

              packageItems.forEach(function (item) {
                  const itemName = item.name;
                  const itemPrice = parseFloat(item.price);

                  if (!isNaN(itemPrice)) {
                      const itemInfo = document.createElement('div');
                      itemInfo.textContent = `${itemName} - ₱${itemPrice.toFixed(2)}`;
                      selectedItemsList.appendChild(itemInfo);
                      totalAmount += itemPrice;
                  }
              });
          }
      });

      totalAmountElement.textContent = `Total: ₱${totalAmount.toFixed(2)}`;
  }
});


function convertToUppercase(inputElement) {
    inputElement.value = inputElement.value.toUpperCase();
}

document.addEventListener("DOMContentLoaded", function() {
    const philippinesTimezoneOffset = 8 * 60; // PHST offset in minutes (UTC+8)
    
    // Get the current date and time in the Philippines time zone
    const currentDate = new Date(Date.now() + philippinesTimezoneOffset * 60000);
    const currentDateString = currentDate.toISOString().substr(0, 10); // Format: yyyy-mm-dd
    const currentTimeString = currentDate.toISOString().substr(11, 5); // Format: hh:mm
    
    // Set default values for the input fields using defaultValue
    document.getElementById('visit-date').defaultValue = currentDateString;
    document.getElementById('visit-time').defaultValue = currentTimeString;
});


document.addEventListener("DOMContentLoaded", function() {
    const philippinesTimezoneOffset = 8 * 60; // PHST offset in minutes (UTC+8)
    
    // Get the current date and time in the Philippines time zone
    const currentDate = new Date(Date.now() + philippinesTimezoneOffset * 60000);
    const currentDateString = currentDate.toISOString().substr(0, 10); // Format: yyyy-mm-dd
    const currentTimeString = currentDate.toISOString().substr(11, 5); // Format: hh:mm
    
    // Set default values for the input fields
    document.getElementById('visit-date').value = currentDateString;
    document.getElementById('visit-time').value = currentTimeString;
    
});


// Sample list of medicine names (you can replace this with data from your database)


let timeoutId;

function calculateAge() {
    clearTimeout(timeoutId);

    timeoutId = setTimeout(function() {
        // Get the selected date from the birthday input field
        const birthdayInput = document.getElementById('birthday');

        // Check if the birthday input has a valid value
        if (!birthdayInput.value) {
            return;
        }

        const selectedDate = new Date(birthdayInput.value);

        // Calculate the current date
        const currentDate = new Date();

        // Calculate the age
        const age = currentDate.getFullYear() - selectedDate.getFullYear();

        // Fill in the age input field
        const ageInput = document.getElementById('age');
        ageInput.value = age;

        // Check if the age is within the desired range (18 to 35)
        if (age < 18 || age > 35) {
            // Display the error message on the form
            const errorMessageElement = document.getElementById('error-message');
            errorMessageElement.textContent = "Age must be between 18 and 35 years old.";

            // Optionally, clear the birthday input field
            birthdayInput.value = "";

            // Optionally, reset the age input field as well
            ageInput.value = "";
        } else {
            // Clear the error message if age is within the desired range
            const errorMessageElement = document.getElementById('error-message');
            errorMessageElement.textContent = "";
        }
    }, 500); // Adjust the delay (in milliseconds) as needed
}
  



document.addEventListener("DOMContentLoaded", function () {
    const countdownElement = document.getElementById("countdown");
    const resendButton = document.getElementById("resend-otp");
    const otpInput = document.getElementById("otp");
    const verifyButton = document.getElementById("verify-button");

    let countdown = 30; // Initial countdown time in seconds

    function updateCountdown() {
        countdown--;
        countdownElement.textContent = `${countdown}s`;

        if (countdown <= 0) {
            clearInterval(countdownInterval);
            resendButton.removeAttribute("disabled"); // Enable the button after 30 seconds
        }
    }

    // Initialize the countdown
    updateCountdown();

    // Attach an input event listener to the OTP input field
    otpInput.addEventListener("input", function () {
        if (otpInput.value.length === 4) {
            verifyButton.removeAttribute("disabled");
        } else {
            verifyButton.setAttribute("disabled", true);
        }
    });

    // Start the countdown interval to update it every second
    let countdownInterval = setInterval(updateCountdown, 1000);
});



// Function to validate appointment time (7 AM to 5 PM)
// Function to validate appointment date (Monday to Friday)
function validateAppointmentDate() {
    var selectedDate = new Date(document.getElementById('appointment_date').value);
    var selectedDay = selectedDate.getDay(); // 0 for Sunday, 1 for Monday, and so on

    if (selectedDay < 1 || selectedDay > 5) { // Not a Monday to Friday
        document.getElementById('date_error').textContent = 'Please select a date between Monday and Friday.';
        document.getElementById('appointment_date').value = '';
    } else {
        document.getElementById('date_error').textContent = '';
    }
}

function validateAppointmentTime() {
    var selectedDateInput = document.getElementById('appointment_date');
    var selectedTimeInput = document.getElementById('appointment_time');
    var selectedDate = new Date(selectedDateInput.value);
    var currentDate = new Date();
    var selectedDay = selectedDate.getDay(); // 0 (Sunday) to 6 (Saturday)
    var selectedTime = selectedTimeInput.value;
    var selectedHour = parseInt(selectedTime.split(':')[0], 10);

    var isWeekend = selectedDay === 0 || selectedDay === 6; // Saturday (6) or Sunday (0)
    var isPastTime = selectedDate < currentDate || 
                     (selectedDate.toDateString() === currentDate.toDateString() && selectedHour < currentDate.getHours());
    var isOutsideHours = selectedHour < 7 || selectedHour >= 17; // Before 7 AM or after 5 PM

    var errorOccurred = false; // Initialize the error flag

    if (isWeekend) {
        document.getElementById('date_error').textContent = 'Please select a date on a weekday (Monday to Friday).';
        selectedDateInput.value = '';
        errorOccurred = true; // Set the error flag to true
    } else {
        document.getElementById('date_error').textContent = '';
    }

    if (isOutsideHours) {
        document.getElementById('time_error').textContent = 'Please select a time between 7 AM to 5 PM.';
        selectedTimeInput.value = '';
        errorOccurred = true; // Set the error flag to true
    } else {
        document.getElementById('time_error').textContent = '';
    }

    if (selectedDate.toDateString() === currentDate.toDateString() && selectedHour < currentDate.getHours()) {
        document.getElementById('time_error1').textContent = 'Please select a time not in the past.';
        selectedTimeInput.value = '';
        errorOccurred = true; // Set the error flag to true
    } else {
        document.getElementById('time_error1').textContent = '';
    }

    // Check the error flag and clear the input field only if an error occurred
    if (errorOccurred) {
        selectedTimeInput.value = '';
    }
}

// Attach event listeners to the date and time inputs
document.getElementById('appointment_date').addEventListener('change', validateAppointmentTime);
document.getElementById('appointment_time').addEventListener('change', validateAppointmentTime);



// Get the date input elements
const visitDateInput = document.getElementById('visit-date');
const lmpDateInput = document.getElementById('lmp');
const aogInput = document.getElementById('aog'); // Add Age of Gestation field
const edcInput = document.getElementById('edc'); // Add Estimated Due Date field
const lmpError = document.getElementById('lmp-error');

// Calculate the maximum date (yesterday)
const maxDate = new Date();
maxDate.setDate(maxDate.getDate() - 1);
const maxDateFormatted = maxDate.toISOString().slice(0, 10);

// Calculate the minimum date (9 months ago)
const minDate = new Date();
minDate.setMonth(minDate.getMonth() - 9);

// Function to validate selected date for "LMP"
function validateLMP() {
    const selectedDate = new Date(lmpDateInput.value);

    if (selectedDate < minDate || selectedDate > maxDate) {
        lmpError.innerHTML = '<small class="text-danger">Please select a valid date between yesterday and 9 months ago for Last Menstrual Period (LMP).</small>';
        lmpDateInput.value = ''; // Clear the "LMP" field
        aogInput.value = ''; // Clear the "Age of Gestation" field
        edcInput.value = ''; // Clear the "Estimated Due Date" field
    } else {
        lmpError.innerHTML = '';
    }
}

// Attach the validateLMP function to the "LMP" input's change event
lmpDateInput.addEventListener('change', validateLMP);

// Initialize the validation when the user interacts with the "LMP" input
lmpDateInput.addEventListener('blur', validateLMP);
 


document.addEventListener("DOMContentLoaded", function() {
    const philippinesTimezoneOffset = 8 * 60; // PHST offset in minutes (UTC+8)
    
    // Get the current date in the Philippines time zone
    const currentDate = new Date(Date.now() + philippinesTimezoneOffset * 60000);
    const currentDateString = currentDate.toISOString().substr(0, 10); // Format: yyyy-mm-dd
    
    // Set the default value for the "Date of Admission" field
    document.getElementById('admission-date').defaultValue = currentDateString;
});


