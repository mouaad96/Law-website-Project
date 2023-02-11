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
    <title>Update Lawyer</title>
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
                    <span class="text">Update A Lawyer</span>
                </div>
                <form
                    action="https://localhost/lawyerProject/admin/pages/lawyer/update.php?lawyer=<?php echo $_GET['lawyer']; ?>"
                    method="post" class="form">
                    <?php
                        if (isset($_GET['lawyer'])) {
                            $idAvocat = $_GET['lawyer'];
                            $query = "SELECT * FROM `avocat` where idA=$idAvocat";
                            $result = $conn->query($query);
                            $res = $result->fetch_assoc();
                        ?>
                    <label for="fullname">First Name</label>

                    <input type="text" name="prenom" id="fullname" value="<?php echo $res['prenomA']; ?>" />

                    <label for="fullname">Last Name</label>

                    <input type="text" name="nom" id="fullname" value="<?php echo $res['nomA']; ?>" />

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res['mail']; ?>" />

                    <label for="tel">Speciality</label>

                    <input type="text" name="specialite" id="email" value="<?php echo $res['specialite']; ?>" />

                    <label for="address">Linkedin</label>
                    <input type="text" name="linkedin" id="address" value="<?php echo $res['linkedin']; ?>" />


                    <div class="radio-grp">

                        <input type="radio" id="male" name="gender" value="male"
                            <?php if ($res['gender'] == "male") echo "checked"; ?> />
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female"
                            <?php if ($res['gender'] == "female") echo "checked"; ?> />
                        <label for="female">Female</label>
                    </div>
                    <?php
                        }
                        ?>
                    <button type="submit" name="submit">
                        Save Changes
                        <i class="fa-solid fa-floppy-disk"></i>
                    </button>

                </form>
                <?php
                    if (isset($_POST["submit"])) {
                        $nomA = $_POST["nom"];
                        $prenomA = $_POST["prenom"];
                        $specialite = $_POST["specialite"];
                        $linkedin = $_POST["linkedin"];
                        $mail = $_POST["email"];
                        $gender = $_POST["gender"];
                        $id = $_GET['lawyer'];

                        $sql = "UPDATE avocat SET nomA='$nomA', prenomA='$prenomA', specialite='$specialite', linkedin='$linkedin', mail='$mail', gender='$gender' WHERE idA=$id";

                        if ($conn->query($sql) === TRUE) {
                    ?>
                <script>
                window.location.href = "https://localhost/lawyerProject/admin/pages/lawyer/lawyer.php";
                </script>
                <?php
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                    ?>
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