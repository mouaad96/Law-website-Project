<?php
include($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <title>Document</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo">
                <i class="fa-solid fa-gavel"></i>
            </div>

            <span class="logo_name">Logo</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li>
                    <a href="https://localhost/lawyerProject/admin/index.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="link-name">Home</span>
                    </a>
                </li>
                <li>
                    <a href="https://localhost/lawyerProject/admin/pages/lawyer/lawyer.php">
                        <i class="fa-solid fa-user-tie"></i>
                        <span class="link-name">Lawyers</span>
                    </a>
                </li>
                <li>
                    <a href="https://localhost/lawyerProject/admin/pages/user/user.php">
                        <i class="fa-solid fa-users"></i>
                        <span class="link-name">Users</span>
                    </a>
                </li>
                <li>
                    <a href="https://localhost/lawyerProject/admin/pages/consultation/consultation.php">
                        <i class="fa-solid fa-file-circle-check"></i>
                        <span class="link-name">Consultations</span>
                    </a>
                </li>
            </ul>

            <ul class="logout-mode">
                <?php
                if (isset($_SESSION['isLawyer']) && $_SESSION['isLawyer'] == false) {


                ?>
                <li>
                    <a href="https://localhost/lawyerProject/admin/account.php">
                        <i class="fa-solid fa-gear"></i>
                        <span class="link-name">Account</span>
                    </a>
                </li>
                <?php
                } else if (isset($_SESSION['isLawyer']) && $_SESSION['isLawyer'] == false) {
                }
                ?>
                <li>
                    <a href="?logout=true">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="link-name">Logout</span>
                    </a>
                    <?php
                        if (isset($_GET['logout']) && $_GET['logout'] == true) {
                            session_destroy();
                            header("location:https://localhost/lawyerProject/admin/login.php");
                        }
                        ?>
                </li>

                <li class="mode">
                    <a href="#">
                        <i class="fa-solid fa-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

</body>

</html>