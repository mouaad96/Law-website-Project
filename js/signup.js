/*fonction pour valider le Mail*/
function validMail() {
    let email = document.getElementById("email").value;
    let mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(mailFormat)) {
        alert("SVP entrer un Mail valid!");
        document.getElementById("email").style.borderColor = "red";
        email = "";
    } else document.getElementById("email").style.borderColor = "#ccc";
}
/*fonction pour valider le numero*/
function validPhone() {
    let numero = document.getElementById("numero").value;
    let phoneFormat = /^(\+212|00212|0)(6|7)[0-9]{8}$/g;
    if (!numero.match(phoneFormat)) {
        alert("SVP entrer un numero valid!");
        document.getElementById("numero").style.borderColor = "red";
        numero = "";
    } else document.getElementById("numero").style.borderColor = "#ccc";
}

function validPsw() {
    let psw = document.getElementById("psw").value;
    let pswConfirm = document.getElementById("pswConfirm").value;
    if (psw === pswConfirm) {
        document.getElementById("pswConfirm").style.borderColor = "red";
        pswConfirm = "";
    } else document.getElementById("pswConfirm").style.borderColor = "#ccc";
}