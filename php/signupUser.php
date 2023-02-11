<?php
    include("../connection/connexion.php");
    $nom = $conn->real_escape_string($_POST['nom']);
    $prenom = $conn->real_escape_string($_POST['prenom']);
    $password = $conn->real_escape_string($_POST['psw']);
    $mail = $conn->real_escape_string($_POST['mail']);
    $phone= $conn->real_escape_string($_POST['phone']);

    $query = "INSERT INTO client (nomP,prenomP, password, email,tel) VALUES ('$nom','$prenom', '$password', '$mail','$phone')";

    $result = $conn->query($query);

    if ($result) {
         header("location:index.php");
    } else {
        echo('<h3>Signup error</h3>');
    }

    $conn->close();

?>