<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/homeStyle.css" />
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include('./connection/connexion.php');
    include('./assets/header.php');
    ?>
    <div class="container">
        <div class="cover">
            <div class="front">
                <div class="text">
                    <img src="./images/lawHands.jpg" alt="law">
                </div>
            </div>
        </div>
        <div class="forms" id="form1">
            <?php

            if (isset($_POST['submit']) && isset($_POST['mail']) && isset($_POST['psw'])) {

                $mail = $conn->real_escape_string($_POST['mail']);
                $password = $conn->real_escape_string($_POST['psw']);
                $query = "SELECT * FROM client WHERE email = '$mail' AND password = '$password'";
                $result = $conn->query($query);
                $_SESSION['isLogged'] = false;
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION['idC'] = $row['idP'];
                    $_SESSION['nom'] = $row['nomP'];
                    $_SESSION['prenom'] = $row['prenomP'];
                    $_SESSION['adresse'] = $row['adresse'];
                    $_SESSION['cni'] = $row['CNI'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['passwordClient'] = $row['password'];
                    $_SESSION['tel'] = $row['tel'];
                    $_SESSION['isLogged'] = true;
                    $_SESSION['genderClient'] = $row['gender'];
                    $_SESSION['photoClient'] = $row['photo'];
                    header("location:index.php");
                } else {

            ?>
                    <script>
                        let form = document.getElementById('form1');
                        let span = document.createElement('span');
                        span.innerText = "Email or password does not match our data";
                        span.style.color = "red";
                        span.style.marginLeft = "1rem"
                        span.id = "handleError"
                        form.appendChild(span);
                        setTimeout(function() {
                            $('#handleError').fadeOut('slow');
                        }, 2000);
                    </script>
            <?php
                }
            }
            ?>
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="login.php" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="mail" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="psw" placeholder="Enter your password" required>
                            </div>
                            <div class="text"><a href="signup.php">Forget password?</a></div>
                            <div class="button input-box">
                                <input type="submit" name="submit" value="Login">
                            </div>
                            <div class="text sign-up-text">Dont have account? <label> <a href="signup.php">Signup
                                        now.</a> </label></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>