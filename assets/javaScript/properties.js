const priceInput = document.getElementById("price");

const priceOutput = document.getElementById("price-output");

priceInput.addEventListener("input", function() {
  const priceValue = this.value;
  priceOutput.textContent = `0 - ${priceValue}`;
  priceOutput.style.color = "darkblue";
  priceInput.style.background = "darkblue";
});
priceOutput.textContent = `0 - ${priceInput.max}`;
priceInput.value = priceInput.max;

document.getElementById("sortBy-price").addEventListener("change", function() {
  document.getElementById("sort-form").submit();
});

document.getElementById("sortBy-date").addEventListener("change", function() {
  document.getElementById("sort-form").submit();
});
document.getElementById("sortBy-price").addEventListener("change", function() {

  var selectedValue = this.value;
  
 
  window.location.href = window.location.pathname + '?price=' + encodeURIComponent(selectedValue) + '&date=' + encodeURIComponent(document.getElementById('sortBy-date').value);
});

document.getElementById("sortBy-date").addEventListener("change", function() {
  
  var selectedValue = this.value;
  
 
  window.location.href = window.location.pathname + '?price=' + encodeURIComponent(document.getElementById('sortBy-price').value) + '&date=' + encodeURIComponent(selectedValue);
});


var urlParams = new URLSearchParams(window.location.search);
var priceValue = urlParams.get('price');
var dateValue = urlParams.get('date');
if (priceValue) {
  document.getElementById('sortBy-price').value = priceValue;
}
if (dateValue) {
  document.getElementById('sortBy-date').value = dateValue;
}

var myForm = document.getElementById("myForm");


myForm.addEventListener("submit", function() {

  var formData = {
    "submitType": myForm.elements["submitType"].value,
    "county": myForm.elements["county"].value,
    "bedroom": myForm.elements["bedroom"].value,
    "areaSize": myForm.elements["areaSize"].value,
    "bathroom": myForm.elements["bathroom"].value,
    "kitchen": myForm.elements["kitchen"].value,
    "propertyType": myForm.elements["propertyType"].value,
    "price": myForm.elements["price"].value
  };
  

  localStorage.setItem("formData", JSON.stringify(formData));
});


var savedFormData = localStorage.getItem("formData");
if (savedFormData) {
 
  var formData = JSON.parse(savedFormData);

  myForm.elements["submitType"].value = formData.submitType;
  myForm.elements["county"].value = formData.county;
  myForm.elements["bedroom"].value = formData.bedroom;
  myForm.elements["areaSize"].value = formData.areaSize;
  myForm.elements["bathroom"].value = formData.bathroom;
  myForm.elements["kitchen"].value = formData.kitchen;
  myForm.elements["propertyType"].value = formData.propertyType;
  myForm.elements["price"].value = formData.price;
}


localStorage.removeItem("formData");
