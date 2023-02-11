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
    <title>Update Consultation</title>
</head>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
if (isset($_SESSION['loggedAdmin']) && $_SESSION['loggedAdmin'] == true) {


?>

    <body>
        <?php

        include($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/admin/assets/headerA.php");
        ?>
        <section class="dashboard">
            <div class="dash-content">
                <div class="activity">
                    <div class="title">
                        <i class="fa-solid fa-pen"></i>
                        <span class="text">Update A Consultation</span>
                    </div>
                    <?php
                    if (isset($_GET['idcon']) && isset($_GET['idcli'])) {
                        $idcon = $_GET['idcon'];
                        $idcli = $_GET['idcli'];
                    }
                    ?>
                    <form action="https://localhost/lawyerProject/admin/pages/consultation/updateInfo.php?idcon=<?php echo $idcon; ?>&idcli=<?php echo $idcli; ?>" method="post" class="form">
                        <label>Consultation Type</label>
                        <select name="type" id="type">
                            <?php
                            $query = "select * from consultation where idC=$idcon";
                            $res = $conn->query($query);
                            $row = $res->fetch_assoc();
                            ?>
                            <option value="<?php echo $row['idC']; ?>"><?php echo $row['type']; ?></option>
                            <?php
                            $query = "select * from consultation";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {


                            ?>
                                <option value="<?php echo $row['idC']; ?>"><?php echo $row['type']; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <label>Lawyer</label>
                        <select name="lawyer" id="law">
                            <?php
                            $queryLawy = "SELECT  avocat.* 
                        FROM consultation
                        JOIN consultationclient ON consultation.idC = consultationclient.idCon 
                        JOIN consultationavocat ON consultation.idC = consultationavocat.idConA 
                        JOIN avocat ON avocat.idA = consultationavocat.idAv 
                        WHERE consultationavocat.idConA = " . $idcon . " 
                        ";
                            $resLaw = $conn->query($queryLawy);
                            if ($resLaw->num_rows > 0) {
                                $rowL = $resLaw->fetch_assoc();
                            ?>
                                <option value="<?php echo $rowL['idA']; ?>">
                                    <?php echo  $rowL['nomA'] . " " . $rowL['prenomA']; ?>
                                </option>
                            <?php
                            } else {
                            ?>
                                <option value="">Choose one..</option>
                            <?php
                            }
                            ?>

                            <?php
                            $query = "select * from avocat";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>

                                <option value="<?php echo $row['idA']; ?>"><?php echo $row['nomA'] . " " . $row['prenomA']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <label>Client</label>
                        <?php
                        $query = "select * from client where idP=$idcli";
                        $res = $conn->query($query);
                        $row = $res->fetch_assoc()

                        ?>
                        <input type="text" name="userName" id="name" value="<?php echo $row['nomP'] . " " . $row['prenomP']; ?>" readonly />

                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" readonly />
                        <script>
                            var typeSelect = document.getElementById("type");
                            var priceSelect = document.getElementById("price");
                            window.addEventListener("load", () => {
                                var id = typeSelect.value;
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "https://localhost/lawyerProject/php/getPrice.php?id=" + id);
                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        var price = JSON.parse(xhr.responseText);
                                        priceSelect.value = price;
                                    }
                                };
                                xhr.send();
                            });
                            typeSelect.addEventListener("change", function() {
                                var id = typeSelect.value;
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "https://localhost/lawyerProject/php/getPrice.php?id=" + id);
                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        var price = JSON.parse(xhr.responseText);
                                        priceSelect.value = price;
                                    }
                                };
                                xhr.send();
                            });
                        </script>
                        <label for="date">Consultation Date</label>
                        <?php
                        $sql = "SELECT consultationclient.consultationDate 
                                FROM consultation
                                JOIN consultationclient ON consultation.idC = consultationclient.idCon
                                JOIN client ON consultationclient.idCli = client.idP 
                                where idCon=$idcon and idCli=$idcli
                                ";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $dt = date_create($row['consultationDate']);
                        ?>
                        <input type="date" name="date" id="date" value="<?php echo $dt->format('Y-m-d'); ?>" />
                        <label for="time">Consultation Time</label>

                        <select name="time" id="time">

                            <?php
                            $sql = "SELECT consultationclient.time 
                                FROM consultationclient
                                JOIN consultation ON consultationclient.idCon=consultation.idC 
                                JOIN client ON consultationclient.idCli = client.idP 
                                where idCon=$idcon and idCli=$idcli
                                ";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>

                            <option value="<?php echo $row['time']; ?>"><?php echo $row['time']; ?></option>
                            <option value="08:00 AM - 10:00 AM">08:00 AM - 10:00 AM</option>
                            <option value="10:00 AM - 12:00 AM">10:00 AM - 12:00 AM</option>
                            <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                            <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                        </select>

                        <div class="radio-grp">
                            <?php
                            $sql = "SELECT consultationclient.isDone 
                                FROM consultationclient
                                JOIN consultation ON consultationclient.idCon=consultation.idC 
                                JOIN client ON consultationclient.idCli = client.idP 
                                where idCon=$idcon and idCli=$idcli
                                ";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <input type="radio" id="done" name="status" value="1" <?php if ($row['isDone'] != 0) echo "checked"; ?> />
                            <label for="done">Done</label>
                            <input type="radio" id="inpro" name="status" value="0" <?php if ($row['isDone'] == 0) echo "checked"; ?> />
                            <label for="inpro">In Process</label>
                        </div>
                        <button type="submit" name="submit">
                            Save Changes
                            <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                    </form>
                </div>
            </div>
        </section>

    </body>
<?php
} else {
    header("location:https://localhost/lawyerProject/admin/login.php");
}
?>

</html>