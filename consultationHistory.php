<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/homeStyle.css" />
    <link rel="stylesheet" href="./css/consHistStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Document</title>
</head>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
?>

<body>
    <?php
    include('./assets/header.php');
    ?>
    <div class="container">
        <h1>
            History Of Consultation

            <i class="fa-solid fa-clock-rotate-left"></i>
        </h1>
        <div class="consultation-list">
            <button class="print-btn" onclick="print()">
                print
                <i class="fa-solid fa-print"></i>
            </button>
            <!--
            ? first consultation
        -->
            <?php
            $query = "SELECT consultation.*, consultationclient.* 
            FROM consultation
            JOIN consultationclient ON consultation.idC = consultationclient.idCon 
            JOIN client ON client.idP = consultationclient.idCli 
            WHERE client.idP = " . $_SESSION['idC'] . " 
            ORDER BY consultationDate desc
            ";
            $queryLawy = "SELECT consultation.*, avocat.*, consultationclient.* 
            FROM consultation
            JOIN consultationclient ON consultation.idC = consultationclient.idCon 
            JOIN consultationavocat ON consultation.idC = consultationavocat.idConA 
            JOIN avocat ON avocat.idA = consultationavocat.idAv 
            JOIN client ON client.idP = consultationclient.idCli 
            WHERE client.idP = " . $_SESSION['idC'] . " 
            ORDER BY consultationDate desc
            ";
            $res = $conn->query($query);
            $resLaw = $conn->query($queryLawy);
            while ($row = $res->fetch_assoc()) {
            ?>
                <div class="consultation-container">

                    <div class="consultation">
                        <div class="left-section">
                            <?php

                            if ($resLaw->num_rows > 0) {
                                while ($rowLaw = $resLaw->fetch_assoc()) {

                            ?>
                                    <div class="lawyer-infos">
                                        <h2>lawyer</h2>
                                        <div class="name">
                                            <span>Name: </span>
                                            <p><?php echo $rowLaw['nomA'] . ' ' . $rowLaw['prenomA']; ?></p>
                                        </div>
                                        <div class="prof">
                                            <span>profession:</span>
                                            <p><?php echo $rowLaw['specialite']; ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="lawyer-infos">
                                    <h2>lawyer</h2>
                                    <div class="name">
                                        <span>Name: </span>
                                        <p>Pending..</p>
                                    </div>
                                    <div class="prof">
                                        <span>profession:</span>
                                        <p>Pending..</p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="case-infos">
                                <h2>Type</h2>
                                <div class="case">
                                    <span>Type: </span>
                                    <p>
                                        <?php echo $row['type']; ?>.
                                    </p>
                                </div>
                                <div class="prof">
                                    <span>Detail:</span>
                                    <p>
                                        <?php echo $row['detail']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="right-section">
                            <div class="rest-infos">
                                <h2>rdv:</h2>
                                <div class="full-infos">
                                    <div class="price">
                                        <span>Price:</span>
                                        <p><?php echo $row['prix']; ?> DH</p>
                                    </div>
                                    <div class="date">
                                        <span>Date:</span>
                                        <p><?php echo $row['consultationDate']; ?></p>
                                    </div>
                                    <div class="duration">
                                        <span>Duration:</span>
                                        <p><?php echo $row['time']; ?></p>
                                    </div>
                                    <div class="status">
                                        <span>Status:</span>
                                        <div class="status-icon">
                                            <?php
                                            if ($row['isDone'] == false) {
                                            ?>
                                                <p>In Process</p>
                                                <i class="fa-solid fa-arrows-rotate" style="font-size: 1.3rem;color: rgb(187, 50, 50);"></i>
                                            <?php
                                            } else {
                                            ?>
                                                <p style="color:rgb(25, 135, 84);">Done</p>
                                                <i class="fa-solid fa-check" style="font-size: 1.3rem;color: rgb(25, 135, 84) ;"></i>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!--
            ? second consultation
        -->

            <!--
          ....  consultation
        -->
        </div>
    </div>
    <?php
    include('./assets/footer.php');
    ?>
</body>
<?php

?>

</html>