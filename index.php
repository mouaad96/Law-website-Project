<?php
include('./connection/connexion.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="./css/homeStyle.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/fontawesome.min.css" />


</head>

<body>
    <!--
        ? navBar Start
    -->
    <?php
    include('./assets/header.php');
    ?>
    <!--
        ? navBar End
    -->

    <!--
        ? Header Start
    -->

    <header id="Header" class="header-container">

        <div class="header-content">
            <h1>The Best Law Expert In the Area</h1>

            <p>
                We specialise in corporate law, litigation, commercial and residential property.
            </p>
            <?php
            if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {
            ?>
            <button onclick="window.location.href = 'https://localhost/lawyerProject/consultation.php'">Consult
                Now!</button>
            <?php
            } else {
            ?>
            <button onclick="window.location.href = 'login.php'">Consult Now!</button>
            <?php
            }
            ?>
        </div>
    </header>

    <!--
        ? Header End
    -->

    <!--
      ? first section  EXPERTISE start
    -->

    <div id="Services" class="expertise__section-container">
        <h1 class="section-header">
            FIELDS OF EXPERTISE
            <i class="fa-sharp fa-solid fa-certificate"></i>
        </h1>

        <div class="expertise-container">
            <?php

            $sql = "select * from expertise";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            ?>
            <div class="expertise-box">
                <div class="expertise-image">
                    <img src=<?php echo $row["photo"]; ?> alt="" />
                    <div class="expertise-sign">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                </div>
                <div class="expertise-infos">
                    <h1><?php echo $row["nomE"]; ?></h1>
                    <p>
                        <?php echo $row["description"]; ?>
                    </p>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>

    <!--
      ? first section  EXPERTISE end
    -->

    <!--
      ? second section  about start
    -->
    <div id="About" class="about__section-container">
        <h1 class="section-header">
            About Us
            <i class="fa-solid fa-circle-info"></i>
        </h1>
        <div class="about-container">
            <div class="about__left">
                <p>
                    Business law firm which renders advice on a full range of law matters
                </p>

                <div class="about__left-content">
                    <!--
              ? first left about 
            -->
                    <div class="first__left-about">
                        <i class="fa-solid fa-suitcase"></i>

                        <div class="about__left-infos">
                            <h1>ATTORNEYS AT LAW</h1>
                            <p>
                                Collaboratively administrate empowered markets via plug-and-play networks.
                            </p>
                        </div>
                    </div>

                    <!--
              ? second left about 
            -->
                    <div class="first__left-about">
                        <i class="fa-solid fa-book"></i>

                        <div class="about__left-infos">
                            <h1>AND JUSTICE FOR ALL</h1>
                            <p>
                                Dramatically visualize customer directed convergence without revolutionary ROI.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about__right">
                <div class="top__divs">
                    <div class="first__div">
                        <i class="fa-sharp fa-solid fa-ribbon"></i>
                        <p>25</p>
                        <p>STAFF MEMBERS</p>
                    </div>
                    <div class="second__div">
                        <i class="fa-solid fa-gavel"></i>
                        <p>655</p>
                        <p>CASES SOLVED</p>
                    </div>
                </div>
                <div class="bottom__divs">
                    <div class="third__div">
                        <i class="fa-solid fa-building-columns"></i>
                        <p>40</p>
                        <p>TRUSTED PARTNERS</p>
                    </div>
                    <div class="fourth__div">
                        <i class="fa-sharp fa-solid fa-trophy"></i>
                        <p>15</p>
                        <p>TOP 10 LAW FIRMS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
      ? second section  about end
    -->

    <!--
      ? third section  members start
    -->
    <div class="members__container-section">
        <h1 class="section-header">
            Members
            <i class="fa-solid fa-people-group"></i>
        </h1>
        <div class="members__container">
            <h1>
                At <span>WEBSITENAME</span>, we are driven by<br /> the shared vision of
                <span>success, not fees.</span>
            </h1>
            <div class="members">
                <!--? first member -->
                <?php
                $sqlAvocat = "select * from avocat";
                $resA = $conn->query($sqlAvocat);
                while ($row = $resA->fetch_assoc()) {
                ?>
                <div class="member-card">
                    <div class="member-image">
                        <img width="200px" src=<?php echo $row["photo"]; ?> alt="" />
                        <div class="member-sign">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>
                    </div>
                    <div class="member-infos">
                        <h1><?php echo $row["prenomA"] . " " . $row["nomA"]; ?></h1>
                        <p><?php echo $row["specialite"]; ?></p>
                        <div class="socials">
                            <a href=<?php echo $row["linkedin"]; ?>>
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href=>
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href=<?php echo "mailto:" . $row["mail"]; ?>>
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!--
      ? third section  members end
    -->

    <!--
      ? fourth section  CONTACT start
    -->
    <div class="contact__container-section">
        <h1 class="section-header">
            Contact Us
            <i class="fa-solid fa-location-dot"></i>
        </h1>
        <div class="contact__container">
            <div class="contact_container-form">
                <i class="fa-solid fa-file-pen"></i>
                <h1 class="form-title">Submit your form for more details</h1>
                <form action="">
                    <div class="form-grp">

                        <input type="text" name="" id="" placeholder="Full Name*" />
                        <input type="email" name="" id="" placeholder="Email*" />
                    </div>
                    <input type="text" name="" id="" placeholder="Telephone*" />
                    <Select>
                        <option value="">---</option>
                        <option value="">Option1</option>
                        <option value="">Option2</option>
                        <option value="">Option3</option>
                    </Select>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Details*"></textarea>
                    <button>Submit</button>
                </form>
            </div>
            <div class="contact_container-infos">
                <h1>Contact Information</h1>
                <p>We are here for you <br />
                    24h a day, 7 days a week</p>
                <div class="infos">
                    <div class="infos-left">
                        <div class="phone">
                            <i class="fa-solid fa-phone"></i>
                            <div class="phone-info">
                                <h3>PHONE:</h3>
                                <p>1 800 643 43006</p>
                            </div>
                        </div>
                        <div class="address">
                            <i class="fa-solid fa-house"></i>
                            <div class="adr-info">
                                <h3>ADDRESS:</h3>
                                <p>49 Russell, London</p>
                            </div>
                        </div>
                    </div>
                    <div class="infos-right">
                        <div class="email">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="email-info">
                                <h3>EMAIL:</h3>
                                <p>info@goldenblatt.co.uk</p>
                            </div>
                        </div>
                        <div class="hours">
                            <i class="fa-solid fa-clock"></i>
                            <div class="hours-info">
                                <h3>HOURS:</h3>
                                <p>Mon-Sun: 8am – 8pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
      ? fourth section  CONTACT end
    -->

    <!--
      ? Footer section start
    -->

    <?php
    include('./assets/footer.php');
    ?>

    <!--
      ? Footer section end
    -->

</body>

</html>