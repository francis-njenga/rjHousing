

function deleteDetails(pid) {
  var confirmModal = document.getElementById("confirm-modal");
  var overlay=document.getElementById("modal-overlay")
  confirmModal.style.display = "block";
  overlay.style.display="block";
  var confirmYes = document.getElementById("confirm-yes");
  var confirmNo = document.getElementById("confirm-no");
  confirmYes.onclick = function() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      
      if (this.readyState == 4 && this.status == 200) {
        var messageDiv = document.getElementById("modal-overlay");
        messageDiv.innerHTML = this.responseText;
        messageDiv.style.display = "block";
        setTimeout(function() {
          messageDiv.style.display = "none";
        }, 3000);
        location.reload();
      }
    };
    xmlhttp.open("GET", "agent.php?delete=" + pid, true);
    xmlhttp.send();
    confirmModal.style.display = "none";
  };
  confirmNo.onclick = function() {
    confirmModal.style.display = "none";
    overlay.style.display="none";
  };
}
function deleteMessage(bookingID) {
  var confirmModal = document.getElementById("confirm-modal");
  var overlay=document.getElementById("modal-overlay")
  confirmModal.style.display = "block";
  overlay.style.display="block";
  var confirmYes = document.getElementById("confirm-yes");
  var confirmNo = document.getElementById("confirm-no");
  confirmYes.onclick = function() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      console.log(this.readyState, this.status);
      if (this.readyState == 4 && this.status == 200) {
        var messageDiv = document.getElementById("modal-overlay");
        messageDiv.innerHTML = this.responseText;
        messageDiv.style.display = "block";
        setTimeout(function() {
          messageDiv.style.display = "none";
        }, 3000);
        location.reload();
      }
    };
    xmlhttp.open("GET", "agent.php?deleteMessage=" + bookingID, true);
    xmlhttp.send();
    confirmModal.style.display = "none";
  };
  confirmNo.onclick = function() {
    confirmModal.style.display = "none";
    overlay.style.display="none";
  };
}



var editIcons = document.querySelectorAll('.edit-icon');
for (var i = 0; i < editIcons.length; i++) {
  editIcons[i].addEventListener('click', function() {
    var input = this.parentElement.querySelector('input[type="file"]');
    input.click();
  });
}

// JavaScript code
var imageInputs = document.querySelectorAll('input[type="file"]');
for (var i = 0; i < imageInputs.length; i++) {
  imageInputs[i].addEventListener('change', function() {
    var imageBox = this.parentElement;
    var img = imageBox.querySelector('img');
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function() {
      img.src = reader.result;
    };
    reader.readAsDataURL(file);
  });
}
