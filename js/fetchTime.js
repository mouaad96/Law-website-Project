var date = document.getElementById("date");
var time = document.getElementById("time");
date.addEventListener("change", function() {
    var dateSelected = date.value;
    console.log(
        "https://localhost/lawyerProject/php/getTime.php?date=" + dateSelected
    );
    var xhrT = new XMLHttpRequest();
    xhrT.open(
        "GET",
        "https://localhost/lawyerProject/php/getTime.php?date=" + dateSelected
    );
    xhrT.onload = function() {
        if (xhrT.status === 200) {
            console.log("hi");
            var result = JSON.parse(xhrT.responseText);

            for (let i = 0; i < result.length; i++) {
                // $("#time option[value='" + result[i] + "']").remove();
            }
        }
    };
    xhrT.send();
});