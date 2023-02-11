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
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="text">Add A Lawyer</span>
                </div>
                <form action="https://localhost/lawyerProject/admin/pages/lawyer/add.php" method="post" class="form">
                    <label for="fullname">First Name</label>

                    <input type="text" name="prenom" id="fullname" />

                    <label for="fullname">Last Name</label>

                    <input type="text" name="nom" id="fullname" />

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />

                    <label for="tel">Speciality</label>

                    <input type="text" name="specialite" id="email" />

                    <label for="address">Linkedin</label>
                    <input type="text" name="linkedin" id="address" />

                    <div class="radio-grp">
                        <input type="radio" id="male" name="gender" value="male" />
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" />
                        <label for="female">Female</label>
                    </div>
                    <button type="submit" name="submit">
                        Add
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </form>
                <?php

                    if (isset($_POST['submit'])) {
                        $prenom = $_POST['prenom'];
                        $nom = $_POST['nom'];
                        $email = $_POST['email'];
                        $specialite = $_POST['specialite'];
                        $linkedin = $_POST['linkedin'];
                        $gender = $_POST['gender'];

                        $query = "INSERT INTO avocat (nomA, prenomA, specialite, mail, linkedin, gender) VALUES ('$nom', '$prenom', '$specialite', '$email', '$linkedin', '$gender')";
                        if ($conn->query($query) === TRUE) {
                    ?>
                <script>
                window.location.href = "https://localhost/lawyerProject/admin/pages/lawyer/lawyer.php";
                </script>
                <?php
                        } else {
                            echo "Error: " . $query . "<br>" . $conn->error;
                        }

                        $conn->close();
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