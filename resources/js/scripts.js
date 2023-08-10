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

  function calculateEDC() {
    const lmpInput = document.getElementById('lmp');
    const aogInput = document.getElementById('aog');
    const edcInput = document.getElementById('edc');
  
    // Check if the required input elements exist
    if (lmpInput && aogInput && edcInput) {
      const lmpValue = lmpInput.value;
  
      // Validate the input date
      const lmpDate = new Date(lmpValue);
      if (isNaN(lmpDate)) {
        console.error('Invalid date format for Last Menstrual Period (LMP)');
        return;
      }
  
      const edcDate = new Date(lmpDate);
      edcDate.setDate(edcDate.getDate() + 280);
  
      const edcFormatted = edcDate.toISOString().slice(0, 10);
      edcInput.value = edcFormatted;
  
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
  }
  
  document.addEventListener("DOMContentLoaded", calculateEDC);
  
  
  

  function printMaternalRecord() {
    // Open the print preview in a new window
    const printWindow = window.open("{{ route('printMaternalRecord', ['id' => $patient->id]) }}", "_blank");

    // Wait for the window to finish loading before triggering the print
    printWindow.onload = function () {
        printWindow.print();
    };
}
//add medicine
document.getElementById("add-medicine").addEventListener("click", function () {
  const medicineSection = document.getElementById("medicine-section");
  const newMedicineRecord = document.querySelector(".medicine-record").cloneNode(true);
  medicineSection.appendChild(newMedicineRecord);
});