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
    <title>Document</title>
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
                    <span class="text">List Of Lawyers</span>
                </div>
                <a href="../../pages/lawyer/add.php" class="add-btn">
                    Add A Lawyer
                    <i class="fa-solid fa-plus"></i>
                </a>
                <div class="activity-data">
                    <div class="data">
                        <span class="data-title">Name</span>
                        <?php
                            $query = "SELECT * FROM `avocat` ORDER BY nomA";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['prenomA'] . " " . $row['nomA']; ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Email</span>
                        <?php
                            $query = "SELECT * FROM `avocat` ORDER BY nomA";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['mail'] ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Speciality</span>
                        <?php
                            $query = "SELECT * FROM `avocat` ORDER BY nomA";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list"><?php echo $row['specialite'] ?></span>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="data">
                        <span class="data-title">Actions</span>
                        <?php
                            $query = "SELECT * FROM `avocat` ORDER BY nomA";
                            $res = $conn->query($query);
                            while ($row = $res->fetch_assoc()) {

                            ?>
                        <span class="data-list">

                            <a href="https://localhost/lawyerProject/admin/pages/lawyer/update.php?lawyer=<?php echo $row['idA']; ?>"
                                class="update-btn">
                                Update
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="https://localhost/lawyerProject/admin/pages/lawyer/lawyer.php?rmlawyer=<?php echo $row['idA']; ?>"
                                class="delete-btn">
                                Delete
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <?php
                                    if (isset($_GET['rmlawyer'])) {
                                        $lawyerId = $_GET['rmlawyer'];
                                        $query = "DELETE FROM `avocat` WHERE idA=$lawyerId";
                                        if ($conn->query($query)) {

                                    ?>
                            <script>
                            window.location.href =
                                "https://localhost/lawyerProject/admin/pages/lawyer/lawyer.php";
                            </script>
                            <?php
                                        }
                                    }
                                    ?>
                        </span>
                        <?php
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