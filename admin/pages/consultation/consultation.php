<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../style.css" />

    <!----===== Icons CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Consultation</title>
</head>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
if (isset($_SESSION['loggedAdmin']) && $_SESSION['loggedAdmin'] == true) {


?>

<body>
    <?php

        include($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/admin/assets/headerA.php");
        ?>
    <!--
      here import side bar
    -->
    <section class="dashboard">
        <!--
        here import top bar
      -->

        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="fa-solid fa-list"></i>
                    <span class="text">List Of Consultations</span>
                </div>

                <div class="activity-data">
                    <div class="data">
                        <span class="data-title">Type</span>
                        <?php
                            $sql = "SELECT consultation.type, consultation.prix, consultationclient.consultationDate, client.nomP, client.prenomP
                FROM consultation
                JOIN consultationclient ON consultation.idC = consultationclient.idCon
                JOIN client ON consultationclient.idCli = client.idP";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['type']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Price</span>
                        <?php
                            $sql = "SELECT consultation.type, consultation.prix, consultationclient.consultationDate, client.nomP,client.prenomP 
                FROM consultation
                JOIN consultationclient ON consultation.idC = consultationclient.idCon
                JOIN client ON consultationclient.idCli = client.idP";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {

                            ?>

                        <span class="data-list"><?php echo $row['prix']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Date</span>

                        <?php
                            $sql = "SELECT consultation.type, consultation.prix, consultationclient.consultationDate, client.nomP,client.prenomP 
                FROM consultation
                
                JOIN consultationclient ON consultation.idC = consultationclient.idCon
                JOIN client ON consultationclient.idCli = client.idP";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['consultationDate']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Status</span>
                        <?php
                            $sql = "SELECT consultation.type, isDone, consultation.prix, consultationclient.consultationDate, client.nomP,client.prenomP 
                FROM consultation
                JOIN consultationclient ON consultation.idC = consultationclient.idCon
                JOIN client ON consultationclient.idCli = client.idP";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {

                            ?>
                        <span class="data-list">
                            <?php
                                    if ($row['isDone'] != 0) {
                                        echo "Done";
                                    } else {
                                        echo 'In progress';
                                    } ?>
                        </span>


                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Client</span>
                        <?php
                            $sql = "SELECT consultation.type, consultation.prix, consultationclient.consultationDate, client.nomP,client.prenomP 
                FROM consultation
                JOIN consultationclient ON consultation.idC = consultationclient.idCon
                JOIN client ON consultationclient.idCli = client.idP";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['nomP'] . " " . $row['prenomP']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Actions</span>
                        <?php
                            $sql = "SELECT consultationclient.idCon,consultationclient.idCli, consultation.prix, consultationclient.consultationDate, client.nomP,client.prenomP 
                FROM consultation
                JOIN consultationclient ON consultation.idC = consultationclient.idCon
                JOIN client ON consultationclient.idCli = client.idP";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {

                            ?>
                        <span class="data-list">
                            <a href="https://localhost/lawyerProject/admin/pages/consultation/update.php?idcon=<?php echo $row['idCon']; ?>&idcli=<?php echo $row['idCli']; ?>"
                                class="update-btn">
                                Update
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="https://localhost/lawyerProject/admin/pages/consultation/consultation.php?idcon=<?php echo $row['idCon']; ?>&idcli=<?php echo $row['idCli']; ?>"
                                class="delete-btn">
                                Delete
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </span>
                        <?php
                            }
                            ?>
                        <?php
                            if (isset($_GET['idcon']) && isset($_GET['idcli'])) {
                                $idcon = $_GET['idcon'];
                                $idcli = $_GET['idcli'];
                                $query = "DELETE FROM `consultationclient` WHERE idCon=$idcon and idCli=$idcli";
                                if ($conn->query($query)) {

                            ?>
                        <script>
                        window.location.href =
                            "https://localhost/lawyerProject/admin/pages/user/user.php";
                        </script>
                        <?php
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../script.js"></script>
</body>
<?php
} else {
    header("location:https://localhost/lawyerProject/admin/login.php");
}
?>

</html>