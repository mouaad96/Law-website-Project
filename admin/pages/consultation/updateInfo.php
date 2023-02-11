<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
if (isset($_POST['submit']) && isset($_GET['idcon']) && isset($_GET['idcli'])) {
    $idcon = $_GET['idcon'];
    $idcli = $_GET['idcli'];
    $conQuery = "UPDATE `consultationclient` SET `idCon`='" . $_POST['type'] . "',`isDone`='" . $_POST['status'] . "',`time`='" . $_POST['time'] . "',`consultationDate`='" . $_POST['date'] . "' WHERE idCon=$idcon and idCli=$idcli";
    if (isset($_POST['type']) && isset($_POST['lawyer']) && !empty($_POST['lawyer'])) {
        $lawyerQuery = "INSERT INTO `consultationavocat`(`idConA`, `idAv`) VALUES ('" . $_POST['type'] . "','" . $_POST['lawyer'] . "')";
        $conn->query($lawyerQuery);
    }

    if ($conn->query($conQuery) === true) {
        header("location:https://localhost/lawyerProject/admin/pages/consultation/consultation.php");
    }
}
