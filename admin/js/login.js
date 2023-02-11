var form = document.getElementById("log");
var errorSpan = document.createElement("span");
errorSpan.innerText = "Mail or password doesn't match our data";
errorSpan.className = "error";
form.appendChild(errorSpan);