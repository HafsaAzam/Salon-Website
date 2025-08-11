// DASHBOARD
function dashboard() {
    const mainContent = document.querySelector(".mainContent");
    const dashboard = document.getElementById("dashboard");
    const userTable = document.getElementById("userTable");
    const appointmentTable = document.getElementById("appointmentTable");
    const service = document.getElementById("service");
    const gallery = document.getElementById("gallery");
    
    userTable.style.display = "none";
    appointmentTable.style.display = "none";
    service.style.display = "none";
    gallery.style.display = "none";
    dashboard.style.display = "flex";

}

// USERS
function users() {
    const mainContent = document.querySelector(".mainContent");
    const dashboard = document.getElementById("dashboard");
    const userTable = document.getElementById("userTable");
    const appointmentTable = document.getElementById("appointmentTable");
    const service = document.getElementById("service");
    const gallery = document.getElementById("gallery");
    
    dashboard.style.display = "none";
    userTable.style.display = "flex";
    appointmentTable.style.display = "none";
    service.style.display = "none";
    gallery.style.display = "none";
}

// APPOINTMENTS
function appointments() {
    const mainContent = document.querySelector(".mainContent");
    const dashboard = document.getElementById("dashboard");
    const userTable = document.getElementById("userTable");
    const appointmentTable = document.getElementById("appointmentTable");
    const service = document.getElementById("service");
    const gallery = document.getElementById("gallery");
    gallery.style.display = "none";
    
    dashboard.style.display = "none";
    userTable.style.display = "none";
    appointmentTable.style.display = "flex";
    service.style.display = "none";
    gallery.style.display = "none";
}

function addService() {
    const mainContent = document.querySelector(".mainContent");
    const dashboard = document.getElementById("dashboard");
    const userTable = document.getElementById("userTable");
    const appointmentTable = document.getElementById("appointmentTable");
    const service = document.getElementById("service");
    const gallery = document.getElementById("gallery");
    gallery.style.display = "none";
    
    dashboard.style.display = "none";
    userTable.style.display = "none";
    appointmentTable.style.display = "none";
    service.style.display = "flex";
    gallery.style.display = "none";
}

function addGallery() {
    const mainContent = document.querySelector(".mainContent");
    const dashboard = document.getElementById("dashboard");
    const userTable = document.getElementById("userTable");
    const appointmentTable = document.getElementById("appointmentTable");
    const service = document.getElementById("service");
    const gallery = document.getElementById("gallery");
    
    dashboard.style.display = "none";
    userTable.style.display = "none";
    appointmentTable.style.display = "none";
    service.style.display = "none";
    gallery.style.display = "flex";
}

  function logout(url) {
    window.location.href = url; 
  }
