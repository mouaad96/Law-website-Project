<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css" />

    <!----===== Icons CSS ===== -->


    <title>Admin Dashboard Panel</title>
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
        <!--
        top bar (must be in all the other pages) 
      -->
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>
            <?php
                $sql = "SELECT * FROM `agenceinfo`;";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
                ?>
            <div class="avatar">
                <p><?php echo $_SESSION['adminName']; ?></p>
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
        <!--
        top bar ends
      -->

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span class="text">Overview</span>
                </div>

                <div class="boxes">
                    <?php
                        $lawyerquery = "SELECT COUNT('idA') as nbA  FROM `avocat`";
                        $res = $conn->query($lawyerquery);
                        $lawyerNb = $res->fetch_assoc();
                        ?>
                    <div class="box box1">
                        <i class="fa-solid fa-user-tie"></i>
                        <span class="text">Total Lawyers</span>
                        <span class="number" data-counttarget="<?php echo $lawyerNb['nbA']; ?>"></span>
                    </div>

                    <?php
                        $clientquery = "SELECT COUNT('idP') as nbC FROM client";
                        $res = $conn->query($clientquery);
                        $clientNb = $res->fetch_assoc();
                        ?>

                    <div class="box box2">
                        <i class="fa-solid fa-people-group"></i>
                        <span class="text">Total Clients</span>
                        <span class="number" data-counttarget="<?php echo $clientNb['nbC']; ?>"></span>
                    </div>

                    <?php
                        $consultquery = "SELECT COUNT('idCon') as nbCon FROM `consultationclient`";
                        $res = $conn->query($consultquery);
                        $consultNb = $res->fetch_assoc();
                        ?>

                    <div class="box box3">
                        <i class="fa-solid fa-scale-balanced"></i>
                        <span class="text">Total Consultations</span>
                        <span class="number" data-counttarget="<?php echo $consultNb['nbCon']; ?>"></span>
                    </div>
                    <script>
                    const counters = document.querySelectorAll('.number');
                    counters.forEach(counter => {
                        let count = 0;
                        const updateCounter = () => {
                            const countTarget = parseInt(counter.getAttribute('data-counttarget'));
                            count++;
                            if (count < countTarget) {
                                counter.innerHTML = count;
                                setTimeout(updateCounter, 120);
                            } else {
                                counter.innerHTML = countTarget;
                            }
                        };
                        updateCounter();
                    });
                    </script>
                </div>
            </div>


            <div class="activity">
                <div class="title">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span class="text">Recent Sign Up</span>
                </div>

                <div class="activity-data">
                    <div class="data">
                        <span class="data-title">Name</span>
                        <?php
                            $query = "SELECT * FROM `client` ORDER BY signupDate DESC LIMIT 10";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['prenomP'] . " " . $row['nomP']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Email</span>
                        <?php
                            $query = "SELECT * FROM `client` ORDER BY signupDate DESC LIMIT 10";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['email']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Joined</span>
                        <?php
                            $query = "SELECT * FROM `client` ORDER BY signupDate DESC LIMIT 10";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['signupDate']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
<?php
} else {
    header("location:login.php");
}
?>

</html>