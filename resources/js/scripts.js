/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
function showSpouse() {
    var forms = document.getElementById("Forms").value;

    if (forms == "child") {
      document.getElementById("babyfield").style.display = "block";
    } 
    else{
      document.getElementById("babyfield").style.display = "none";
    }
    if(forms == "maternal"){
      document.getElementById("maternalfield").style.display = "block";
    }
    else{
      document.getElementById("maternalfield").style.display = "none";
    }
    if(forms == "checkup"){
      document.getElementById("checkupfield").style.display = "block";
    }else{
      document.getElementById("checkupfield").style.display = "none";
    }
    if(forms == "admit"){
      document.getElementById("admitfield").style.display = "block";
    }else{
      document.getElementById("admitfield").style.display = "none";
    }


  }

  // Function to calculate EDC and AOG
  function calculateEDC() {
    // Get the value of the LMP input field
    const lmpValue = document.getElementById('lmp').value;

    // Parse the LMP date using the Date object
    const lmpDate = new Date(lmpValue);

    // Calculate the EDC by adding 280 days to the LMP date
    const edcDate = new Date(lmpDate);
    edcDate.setDate(edcDate.getDate() + 280);

    // Format the EDC date to yyyy-mm-dd format
    const edcFormatted = edcDate.toISOString().slice(0, 10);

    // Set the value of the EDC input field
    document.getElementById('edc').value = edcFormatted;

    // Function to update AOG
    function updateAOG() {
      // Calculate the Age of Gestation by subtracting LMP date from current date
      const currentDate = new Date();
      const timeDifference = currentDate - lmpDate;
      const aogInDays = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

      // Calculate the AOG in weeks (rounded down to the nearest week)
      const aogInWeeks = Math.floor(aogInDays / 7);

      // Set the value of the AOG input field with "weeks" appended
      document.getElementById('aog').value = aogInWeeks + " weeks";
    }

    // Call the updateAOG function initially to set the AOG value
    updateAOG();

    // Update AOG every 1 day (you can adjust the interval as needed)
    setInterval(updateAOG, 1000 * 60 * 60 * 24);
  }

  // Call calculateEDC when the page loads (optional)
  calculateEDC();