<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form class="login" action="login.php" method="post">
        <div id="log"></div>
        <input type="text" name="mail" placeholder="Admin Mail">
        <input type="password" name="psw" placeholder="Password">

        <input type="submit" name="submit" value="Login">
    </form>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
    if (isset($_POST['submit']) && isset($_POST['mail']) && isset($_POST['psw'])) {
        $mail = $_POST['mail'];
        $psw = $_POST['psw'];
        $query = "SELECT * FROM `agenceinfo` where mail = '$mail' and password = '$psw'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['loggedAdmin'] = true;
            $_SESSION['isLawyer'] = false;
            $_SESSION['adminName'] = $row['nomAd'];
            header("location:index.php");
        }
        $query = "SELECT * FROM `avocat` where mail = '$mail' and password = '$psw'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['adminName'] = $row['nomA'] . " " . $row['prenomA'];
            $_SESSION['isLawyer'] = true;
            $_SESSION['loggedAdmin'] = true;
            header("location:index.php");
        } else {
    ?>
    <script defer src="./js/login.js"></script>
    <?php
        }
    }
    ?>
</body>

</html>