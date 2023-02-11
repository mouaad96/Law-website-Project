<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/fontawesome.min.css" />
    <script defer src="./js/homeScript.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
</head>

<body>
    <nav class="navbar_container">
        <a href="index.php" class="navbar_logo">
            <span>LAWYERUP</span>
            <i class="fa-solid fa-gavel"></i>
        </a>
        <div id="sidebar" class="navbar">
            <div class="itemsList">
                <ul class="list1">
                    <li>
                        <a href="#Header">Home</a>
                    </li>
                    <li>
                        <a href="#About">About</a>
                    </li>
                    <li>
                        <a href="#Services">Services</a>
                    </li>
                    <?php
                    if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
                    ?>
                    <div class="buttons_container">
                        <a class="history" href="consultationHistory.php"><button>History</button></a>
                        <a class="profileUpdate" href="profile.php"><button>Update Profile</button></a>
                        <a class="logout" href="?logout"><button>Logout</button></a>
                    </div>
                    <?php } ?>
                </ul>
            </div>


            <?php
            if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
            ?>
            <ul class="profile">
                <li><img src=<?php echo $_SESSION['photoClient']; ?> alt="profile pic"></li>
                <li class="profileName"><a id="name" href=""><?php echo $_SESSION['nom']; ?> </a>
                    <ul id="itemsMenu">
                        <li class="sub-item">
                            <span class="material-icons-outlined">
                                format_list_bulleted
                            </span>
                            <p><a href="consultationHistory.php">History</a></p>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined"> manage_accounts </span>
                            <p><a href="profile.php">Update Profile</a></p>
                        </li>
                        <li class="sub-item">
                            <span class="material-icons-outlined"> logout </span>
                            <p><a href="?logout">Logout</a></p>
                            <?php
                                if (isset($_GET['logout'])) {
                                    session_unset();
                                    header("location:index.php");
                                }
                                ?>
                        </li>
                    </ul>
                </li>

            </ul>

            <?php
            } else {
            ?>
            <div class="sign_container">
                <a class="login" href="login.php"><button>Login</button></a>
                <a class="signup" href="signup.php"><button>signup</button></a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="phone-menu" id="toggle"></div>
    </nav>
</body>

</html>