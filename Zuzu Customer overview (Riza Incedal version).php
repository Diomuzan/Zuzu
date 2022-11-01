<?php
session_start();
$firstName = "";
$lastName = "";
$emailAdress = "";
$deliveryAdress = "";
$postalCode = '';
$residencePlace = "";
$servername = "localhost";
$username = "root";
$dbname = "zuzu";

if (isset($_POST['firstName'])) {
    $firstName = $_POST['firstName'];
}
if (isset($_POST['lastName'])) {
    $lastName = $_POST['lastName'];
}
if (isset($_POST['emailAdress'])) {
    $emailAdress = $_POST['emailAdress'];
}
if (isset($_POST['deliveryAdress'])) {
    $deliveryAdress = $_POST['deliveryAdress'];
}
if (isset($_POST['postalCode'])) {
    $postalCode = $_POST['postalCode'];
}
if (isset($_POST['residencePlace'])) {
    $residencePlace = $_POST['residencePlace'];
}
try {
    if(isset($_POST["firstName"])) {
        $firstName = $_POST["firstName"];
    }
    if(isset($_POST["lastName"])) {
        $lastName = $_POST["lastName"];
    }
    if(isset($_POST["emailAdress"])) {
        $emailAdress = $_POST["emailAdress"];
    }
    if(isset($_POST['deliveryAdress'])) {
        $deliveryAdress = $_POST['deliveryAdress'];
    }
    if(isset($_POST['postalCode'])) {
        $postalCode = $_POST['postalCode'];
    }
    if(isset($_POST['residencePlace'])) {
        $residencePlace = $_POST['residencePlace'];
    }

    $database = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $st = $database->prepare("INSERT INTO customer (f_name, l_name, email, address, postal_code, city) VALUES (:firstName, :lastName, :emailAdress, :deliveryAdress, :postalCode, :residencePlace)");
    $st->bindParam(':firstName', $firstName);
    $st->bindParam(':lastName', $lastName);
    $st->bindParam(':emailAdress', $emailAdress);
    $st->bindParam(':deliveryAdress', $deliveryAdress);
    $st->bindParam(':postalCode', $postalCode);
    $st->bindParam(':residencePlace', $residencePlace);
    $st->execute();
    echo "Form submission successful!";
} catch(PDOException $error) {
    echo "Error: " . $error->getMessage();
}
$database = null;
?>

<!DOCTYPE HTML>
<head>
    <meta charset= "UTF-8">
    <title>Customer overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel= "stylesheet" href= "/Project%20Zuzu/CSS%20Documents/Zuzu%20Style%20(Riza%20Incedal%20version).css">
    <link rel= "stylesheet" href="/Project%20Zuzu/CSS%20Documents/Zuzu%20Customer%20Overview%20MQ%20Style%20(Riza%20Incedal%20version).css">
</head>
<body>

<!--Header-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar">
    <div class="container-fluid">
        <a class= "navbar-brand text-white fw-bold logo">Zuzu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarColor01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white text1" aria-current="page" href="/Project%20Zuzu/PHP%20Files/Zuzu%20Homepage%20(Riza%20Incedal%20version).php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white text2" href="/Project%20Zuzu/PHP%20Files/Zuzu%20Customer&20Details%20(Riza%20Incedal%20version.php">Order</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Main-->
<img class="w-100 image-resize"   src= "/Project%20Zuzu/Images/Sushi%20banner%20image.jpg">

        <div class="card position-relative card3">
        <div class="card-body">
          <h2>Order</h2>

            <p>Did you know that there's really a sushi restaurant called Zuzu Sushi? <br>
            It's located in Poltava, Ukraine and their address is Nezalezhnosti Square 5, 36000 Poltava <br>
            </p>
            <a href= "https://zuzusushi.com/"><button type="button" class="btn btn-dark">Their website</button></a>
        </div>
        </div>

        <div class="card card4">
            <div class="card-body">
                <h2 class="heading2">Customer details</h2>
                <p class= "ct4 position-relative"><?php echo $firstName?>
                    <?php echo $lastName ?> <br>
                    <?php echo $deliveryAdress ?> <br>
                    <?php echo $postalCode ?> <?php echo $residencePlace ?> <br>
                    <?php echo $emailAdress ?></p>
        </div>
        </div>

<!--Footer-->
<footer class="bg-dark text-center text-white footer">
    <div class="container p-4">
        <section class="">
            <form action="">
                <div class="row d-flex justify-content-center">
                </div>
            </form>
        </section>
        <section class="">
            <div class="row">
                <div class="col">
                    <p><b>Contact</b><br>
                        Zuzu <br>
                        Kalealtı Caddesi 63,<br>
                        63420 <a class= "link1" href="https://en.wikipedia.org/wiki/Birecik">Birecik</a><br>
                        zuzu.birecik@gmail.com <br>
                        +904141516151</p>
                </div>

                <div class= "col"><b>Opening hours</b> <br>
                    Monday: 09:00 - 00:00 <br>
                    Tuesday: 09:00 - 00:00 <br>
                    Wednesday: 09:00 - 00:00 <br>
                    Thursday: 09:00 - 00:00 <br>
                    Friday: 09:00 - 00:00 <br>
                    Saturday: 09:00 - 00:00 <br>
                    Sunday: 09:00 - 00:00 <br>
                </div>
            </div>
        </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <p class="text-white" > Copyright © 2022  Riza Incedal</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
