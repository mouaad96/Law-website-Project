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
    <title>Users</title>
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
        here import top bar
      -->

        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="fa-solid fa-list"></i>
                    <span class="text">List Of Users</span>
                </div>

                <div class="activity-data">
                    <div class="data">
                        <span class="data-title">Name</span>
                        <?php
                            $query = "SELECT * FROM `client` ORDER BY signupDate DESC";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['nomP'] . " " . $row['prenomP']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Email</span>
                        <?php
                            $query = "SELECT * FROM `client` ORDER BY signupDate DESC";
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
                            $query = "SELECT * FROM `client` ORDER BY signupDate DESC";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['signupDate']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Actions</span>
                        <?php
                            $query = "SELECT * FROM `client` ORDER BY signupDate DESC";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list">

                            <a href="https://localhost/lawyerProject/admin/pages/user/user.php?rmuser=<?php echo $row['idP'];?>"
                                class="delete-btn">
                                Delete
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </span>
                        <?php
                            }
                            ?>
                        <?php
                                    if (isset($_GET['rmuser'])) {
                                        $userId = $_GET['rmuser'];
                                        $query = "DELETE FROM `client` WHERE idP=$userId";
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