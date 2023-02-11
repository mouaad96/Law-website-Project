var typeSelect = document.getElementById("type");
var priceSelect = document.getElementById("price");
var totalPrice = document.getElementById("totalPrice");
typeSelect.addEventListener("change", function () {
  var id = typeSelect.value;
  var xhr = new XMLHttpRequest();

  xhr.open(
    "GET",
    "https://localhost/lawyerProject/php/getPrice.php?id=" + id,
    "Access-Control-Allow-Origin:*"
  );
  xhr.onload = function () {
    if (xhr.status === 200) {
      var price = JSON.parse(xhr.responseText);
      priceSelect.value = price;
      totalPrice.textContent = price;
    }
  };
  xhr.send();
});
