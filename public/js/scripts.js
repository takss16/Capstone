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
