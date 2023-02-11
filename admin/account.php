<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./style.css" />

    <!----===== Icons CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Update Admin</title>
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
                <?php
                $sql = "SELECT * FROM `agenceinfo`;";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
                ?>
                <div class="activity">
                    <div class="title">
                        <i class="fa-solid fa-user"></i>
                        <span class="text">Update Admin</span>
                    </div>
                    <form action="https://localhost/lawyerProject/admin/accUpdate.php" method="post" class="form">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="name" id="fullname" value="<?php echo $row['nomAd']; ?>" />
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $row['mail']; ?>" />

                        <label for="psw">Password</label>
                        <input type="password" name="psw" id="psw" value="<?php echo $row['password']; ?>" />
                        <label for="cpsw">Confirm Password</label>
                        <input type="password" name="cpsw" id="cpsw" />
                        <div class="radio-grp">
                            <input type="radio" id="male" name="gender" value="male" <?php if ($row['gender'] == "male") echo "checked"; ?> />
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female" <?php if ($row['gender'] == "female") echo "checked"; ?> />
                            <label for="female">Female</label>
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
    header("location:login.php");
}
?>

</html>