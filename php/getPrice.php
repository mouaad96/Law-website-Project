<?php
include('../connection/connexion.php');
// Get the selected type's ID
if (isset($_GET["id"])) {
    $id = $_GET["id"];


    $stmt = $conn->prepare("SELECT prix FROM consultation WHERE idC = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode($row['prix']);
}