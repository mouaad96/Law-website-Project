<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/homeStyle.css" />
    <link rel="stylesheet" href="./css/profileStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Profile</title>
</head>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
if (isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true) {

?>

    <body>

        <?php
        include('./assets/header.php');
        ?>


        <div class="profile-container">
            <div class="profile-container_left">
                <div class="profile-image">
                    <img src=<?php echo $_SESSION['photoClient']; ?> alt="" />
                    <input type="file" id="img" name="img" accept="image/*" />

                    <h2>welcome <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></h2>
                </div>

                <ul class="profile-buttons" id="profileButtons">
                    <li id="Account" class="active">
                        <i class="fa-solid fa-address-card"></i>
                        Account
                    </li>
                    <li id="Password">
                        <i class="fa-solid fa-lock"></i>
                        Password
                    </li>
                </ul>
            </div>
            <div class="profile-container_right">
                <h1>Account Settings</h1>

                <?php
                if (isset($_POST['submit'])) {
                    $stmt = $conn->prepare("UPDATE `client` SET `nomP` = ?, `prenomP` = ?, `gender` = ?, `adresse` = ?, `CNI` = ?, `email` = ?, `tel` = ?  WHERE `idP` = ?");
                    $stmt->bind_param("sssssssi", $_POST['lastName'], $_POST['firstName'], $_POST['gender'], $_POST['adresse'], $_POST['cni'], $_POST['email'], $_POST['tel'], $_SESSION['idC']);
                    if ($stmt->execute()) {

                        $_SESSION['nom'] =  $_POST['lastName'];
                        $_SESSION['prenom'] = $_POST['firstName'];
                        $_SESSION['adresse'] = $_POST['adresse'];
                        $_SESSION['cni'] = $_POST['cni'];
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['tel'] = $_POST['tel'];
                        echo '<div style="color:green; text-align:center; margin-top:30px;">Your informations has been updated.</div>';
                    } else {
                        echo "Error executing query: " . $stmt->error;
                    }
                }

                ?>
                <form action="profile.php" method="post" class="account-form">
                    <label for="cni">CNI</label>
                    <input type="text" name="cni" id="fullname" value="<?php echo $_SESSION['cni']; ?>" />
                    <label for="fullname">First Name</label>
                    <input type="text" name="firstName" id="fullname" value="<?php echo $_SESSION['nom']; ?>" />
                    <label for="fullname">Last Name</label>
                    <input type="text" name="lastName" id="fullname" value="<?php echo $_SESSION['prenom']; ?> " />
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" />
                    <label for="address">Address</label>

                    <input type="text" name="addresse" id="address" value="<?php echo $_SESSION['adresse']; ?>" />
                    <label for="tel">Phone Number</label>
                    <input type="tel" name="tel" id="tel" value="<?php echo $_SESSION['tel']; ?>" />
                    <div class="radio-grp">
                        <input type="radio" id="male" name="gender" value="male" <?php if ($_SESSION['genderClient'] == "male") echo "checked"; ?> />
                        <label for="male">Male</label><br />
                        <input type="radio" id="female" name="gender" value="female" <?php if ($_SESSION['genderClient'] == "female") echo "checked"; ?> />
                        <label for="female">Female</label><br />
                    </div>
                    <input type="submit" name="submit" value="Save Changes">
                </form>
                <!--
            ? password Form
        -->
                <?php
                if (isset($_POST['submitPsw'])) {
                    if (isset($_POST['psw']) && isset($_POST['cpsw']) && $_POST['psw'] == $_POST['cpsw']) {
                        $stmt = $conn->prepare("UPDATE `client` SET `password` = ? WHERE `idP` = ?");
                        $stmt->bind_param("si", $_POST['psw'], $_SESSION['idC']);
                        if ($stmt->execute()) {
                            $_SESSION['passwordClient'] = $_POST['psw'];
                        } else {
                            echo  $stmt->error;
                        }
                    } else {
                        echo '<div style="color:red; text-align:center;" id="pswError">Error: Passwords do not match.</div>';
                ?>
                        <script>
                            // document.querySelector('#profileButtons li.active').classList.remove('active');
                            // var password = document.getElementById('Password');
                            // password.className = 'active';
                            setTimeout(function() {
                                $('#pswError').fadeOut('slow');
                            }, 4000);
                        </script>
                <?php
                    }
                }

                ?>
                <form action="profile.php" method="post" class="password-form toggle">
                    <label for="user">Current Password</label>
                    <input type="password" name="user" id="user" value=<?php echo $_SESSION['passwordClient']; ?> />
                    <label for="psw">New Password</label>
                    <input type="password" name="psw" id="psw" />
                    <label for="cpsw">Confirm Password</label>
                    <input type="password" name="cpsw" id="cpsw" />
                    <input type="submit" name="submitPsw" value="Save Changes">
                </form>

            </div>
        </div>
        <script src="./js/profileScript.js"></script>
    </body>
<?php
} else {
    header("location:login.php");
}
?>

</html>