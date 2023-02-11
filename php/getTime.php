<?php
include('../connection/connexion.php');
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $conn->prepare("SELECT distinct time FROM consultationclient WHERE consultationDate = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $time_array[] = $row['time'];
    }

    echo json_encode($time_array);
}