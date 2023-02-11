<?php
include("../connection/connexion.php");

if (isset($_POST['submit']) && isset($_POST['mail']) && isset($_POST['psw'])) {

    $mail = $conn->real_escape_string($_POST['mail']);
    $password = $conn->real_escape_string($_POST['psw']);
    $query = "SELECT * FROM client WHERE email = '$mail' AND password = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['idC'] = $row['idP'];
        $_SESSION['nom'] = $row['nomP'];
        $_SESSION['prenom'] = $row['prenomP'];
        $_SESSION['adresse'] = $row['adresse'];
        $_SESSION['cni'] = $row['CNI'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['passwordClient'] = $row['password'];
        $_SESSION['tel'] = $row['tel'];
        $_SESSION['isLogged'] = true;
        $_SESSION['photoClient'] = $row['photo'];
        $conn->close();
        header("location:../index.php");
    } else {

?>
        <script>
            let form = document.getElementById('form1');
            let span = document.createElement('span');
            span.innerText = "Email or password doesnt match our data";
            span.style = "color:red: text-align:center;";
            form.appendChild(span);
        </script>
<?php
    }
}
