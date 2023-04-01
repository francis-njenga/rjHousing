function showLoginForm() {
  document.getElementById("loginForm").style.display = "block";
  document.getElementById("overlay").style.display="block";
}

function showRegisterForm(){
  document.getElementById("register").style.display="block";
  document.getElementById("overlay").style.display="block";
}


function hideLoginForm() {
  document.getElementById("loginForm").style.display = "none";
  document.getElementById("overlay").style.display="none";
}

function hideRegisterForm(){
  document.getElementById("register").style.display="none";
  document.getElementById("overlay").style.display="none";
}


 overlay = document.querySelector('#overlay');
  closeRegister = document.querySelector('#register .close');
 closelogin = document.querySelector('#loginForm .close');


closelogin.addEventListener('click', () => {
  document.getElementById("loginForm").style.display = 'none';
  overlay.style.display = 'none';
});
closeRegister.addEventListener('click', () => {
  document.getElementById("register").style.display = 'none';
  overlay.style.display = 'none';
});

document.addEventListener("click", function(event) {
  const dropdown = document.querySelector(".dropdown-menu");
  if (!dropdown.contains(event.target) && dropdown.style.display === "block") {
    dropdown.style.display = "none";
  }
});

function submitForm(link) {
  document.getElementById('myForm').submit();
}
