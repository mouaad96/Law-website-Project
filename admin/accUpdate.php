<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");

if (isset($_POST['submit'])) {
    if (isset($_POST['psw']) && isset($_POST['cpsw']) && $_POST['psw'] == $_POST['cpsw']) {
        $query = "UPDATE `agenceinfo` SET 
             `mail`='" . $_POST['email'] . "',`password`='" . $_POST['psw'] . "',`nomAd`='" . $_POST['name'] . "',`gender`='" . $_POST['gender'] . "'
             WHERE 1";

        if ($conn->query($query)) {
            $_SESSION['adminName'] = $_POST['name'];
            header("location:https://localhost/lawyerProject/admin/index.php");
        }
    } else {
        header("location:https://localhost/lawyerProject/admin/account.php");
    }
}
