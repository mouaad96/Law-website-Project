<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/consultation.css" />
    <link rel="stylesheet" href="./css/homeStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script defer src="./js/consultation.js"></script>
    <script defer src="./js/fetchPrice.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="./js/fetchTime.js"></script>
    <title>Consultation</title>
</head>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/lawyerProject/connection/connexion.php");
?>

<body>
    <?php
        include('./assets/header.php');
        ?>
    <div class="container">
        <h1>Consultation <i class="fa-solid fa-handshake"></i></h1>
        <div class="consultation-sections">
            <div class="left-section">
                <?php
                    if (isset($_POST['submit']) && isset($_POST['type']) && isset($_POST['detail']) && isset($_POST['date']) && isset($_POST['time'])) {
                        $idCon = $_POST['type'];
                        $detail = $_POST['detail'];

                        $query = "INSERT INTO `consultationclient`(`idCon`, `idCli`, `isDone`, `detail`, `time`, `consultationDate`) VALUES (" . $idCon . "," . $_SESSION['idC'] . ",0,'" . $detail . "','" . $_POST['time'] . "','" . $_POST['date'] . "')";
                        if (!$conn->query($query)) {
                            echo '<div style="color:red; text-align:center;">Error: Data cant be inserted.</div>';
                        } else {
                            header('location:consultationHistory.php');
                        }
                    }
                    ?>
                <form action="consultation.php" method="post" class="form">
                    <h1 class="text-center">Form <i class="fa-solid fa-pen"></i></h1>
                    <!-- Progress bar -->
                    <div class="progressbar">
                        <div class="progress" id="progress"></div>
                        <div class="progress-step progress-step-active" data-title="Case"></div>
                        <div class="progress-step" data-title="Details"></div>
                        <div class="progress-step" data-title="Appointment"></div>
                    </div>

                    <!-- Step 1 -->
                    <div class="form-step form-step-active">

                        <div class="input-group">
                            <label for="phone">Case Type:</label>
                            <select name="type" id="type">
                                <option value="">---</option>
                                <?php
                                    $sql = 'SELECT * FROM `consultation`';
                                    $res = $conn->query($sql);
                                    while ($row = $res->fetch_assoc()) {
                                    ?>
                                <option value=<?php echo $row['idC']; ?>><?php echo $row['type']; ?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="price">Price:</label>
                            <input type="text" name="price" id="price" readonly value="">
                        </div>

                        <div class="btns-group">
                            <a href="#" class="btn btn-prev">Previous</a>
                            <a href="#" class="btn btn-next">Next</a>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="form-step">
                        <div class="input-group">
                            <label for="detail">Details About The Case:</label>
                            <textarea name="detail" id="detail" rows="15"></textarea>
                        </div>

                        <div class="btns-group">
                            <a href="#" class="btn btn-prev">Previous</a>
                            <a href="#" class="btn btn-next">Next</a>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="form-step">
                        <div class="input-group">
                            <label for="date">Date of Appointment:</label>
                            <input type="date" name="date" id="date" min=<?php echo date("Y-m-d"); ?> />
                            <script>
                            $(document).ready(function() {
                                var today = new Date();
                                var dd = String(today.getDate()).padStart(2, '0');
                                var mm = String(today.getMonth() + 1).padStart(2, '0');
                                var yyyy = today.getFullYear();
                                today = yyyy + '-' + mm + '-' + dd;
                                document.getElementById("date").value = today;
                            });
                            </script>
                        </div>
                        <div class="input-group">
                            <label for="time">Appointment Time:</label>
                            <select name="time" id="time">
                                <option value="08:00 AM - 10:00 AM">08:00 AM - 10:00 AM</option>
                                <option value="10:00 AM - 12:00 AM">10:00 AM - 12:00 AM</option>
                                <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                                <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                            </select>
                        </div>
                        <div class="price-duration">
                            <div class="price">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <span id="totalPrice">--</span>
                                <span>DH</span>
                            </div>
                            <div class="duration">
                                <i class="fa-solid fa-clock"></i>
                                <span>2 hours</span>
                            </div>
                        </div>
                        <div class="btns-group">
                            <a href="#" class="btn btn-prev">Previous</a>
                            <input type="submit" name="submit" value="Submit" class="btn" />
                        </div>
                    </div>
                </form>

            </div>
            <!-- 
            ?right
        -->
            <div class="right-section">
                <div class="faq">
                    <h2>
                        FAQ
                        <i class="fa-solid fa-question"></i>
                    </h2>
                    <!--faq1-->
                    <div class="accordion">
                        <div class="accordion-header">
                            Faq-1
                            <div class="close">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="accordion-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since .
                            </p>
                        </div>
                    </div>

                    <!--faq2-->
                    <div class="accordion">
                        <div class="accordion-header">
                            Faq-2
                            <div class="close">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="accordion-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since .
                            </p>
                        </div>
                    </div>

                    <!--faq3-->
                    <div class="accordion">
                        <div class="accordion-header">
                            Faq-3
                            <div class="close">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="accordion-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since .
                            </p>
                        </div>
                    </div>

                    <!--faq4-->
                    <div class="accordion">
                        <div class="accordion-header">
                            Faq-4
                            <div class="close">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="accordion-body">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since .
                            </p>
                        </div>
                    </div>
                    <!--faq end-->
                </div>
            </div>
        </div>
    </div>

    <?php
        include('./assets/footer.php');
        ?>

</body>


</html>