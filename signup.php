<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./css/homeStyle.css" />
    <link rel="stylesheet" href="./css/signup.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script difer src="./js/signup.js"></script>
</head>

<body>
    <?php
    include('./connection/connexion.php');
    include('./assets/header.php');
    ?>
    <div class="container">
        <div class="title">Inscription</div>
        <div class="content">
            <form action="./php/signupUser.php" method="post" id="form1">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" id="nom" name="nom" placeholder="Entrer votre nom" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" id="nomUtilisateur" name="prenom"
                            placeholder="Entrer votre nom d'utilisateur" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" id="email" name="mail" placeholder="Entrer votre email" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Phone</span>
                        <input type="text" id="numero" name="phone" placeholder="Entrer votre N° de téléphone"
                            required />
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" id="psw" name="psw" placeholder="Entrer votre mot de passe" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id="pswConfirm" placeholder="Confirmer votre mot de passe" required />
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="male" id="dot-1" />
                    <input type="radio" name="female" id="dot-2" />
                    <input type="radio" name="none" id="dot-3" />

                </div>
                <div class="button">
                    <input type="submit" onclick="validMail(); validPhone(); validPsw();" value="SignUp" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>