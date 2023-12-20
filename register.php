<?php
session_start();
include("connection.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register to craakit</title>
    <!--Fav icon-->
    <link href="img/exam_icon.png" rel="icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-register-img {
            background: url(img/register.jpg);
            background-position: center;
            background-size: 900px;
        }
    </style>

    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-img"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <a href="#" class="logo"><img src="craakit-white-icon1.png" alt="craakit-logo" class="img-fluid" style="max-height:60px"></a>
                                <br><br>
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-user" name="name" id="name" required="" placeholder="Enter your Name" required>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control form-control-user" name="email" id="email" required="" placeholder="Enter Email Id">
                                    </div>
                                   
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="address" id="address" required="" placeholder="Enter your Address">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" required="" placeholder="Enter Password">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" name="phone" id="phone" required="" placeholder="Enter 10 digit Phone nummber">
                                    </div>
                                    
                                </div>

                                <button type="submit" name="submit1" class="btn btn-primary btn-user btn-block">Register
                                    Account </button>

                                <div class="alert alert-success" id="success" style="margin-top:10px; display: none">
                                    <strong>Success!</strong> Account registered succesfully

                                </div>
                                <div class="alert alert-danger" id="failure" style="margin-top:10px; display: none">
                                    <strong>Already Exist!</strong> This Username Already Exists
                                </div>
                                <!-- <a href="login.php" aria-required="" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> -->
                                <hr>
                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login
                                </a>
                                <a href="facebook.com" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    if (isset($_POST["submit1"])) {
        $count = 0;
        // $Bytes = random_bytes(3);
        // $UUID = bin2hex($Bytes);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        $phonepattern = "/^[0-9]{10}$/"; // regex pattern for a 10-digit phone number

        $sql = "SELECT * FROM registration WHERE name='$name' OR email='$email' OR contact='$phone'";
        $result = mysqli_query($link, $sql);



        if (mysqli_num_rows($result) > 0) {
            // The user already exists
            // echo "User already exists";
    ?>
            <script type="text/javascript">
                document.getElementById("success").style.display = "none";
                document.getElementById("failure").style.display = "block";
                //window.location = "../subscription.php";
            </script>
        <?php
        } else {
            // Insert the user into the database
            $sql1 = "INSERT INTO `registration`(`name`, `email`, `address`, `password`, `contact`) VALUES ('$_POST[name]','$_POST[email]','$_POST[address]','$_POST[password]','$_POST[phone]')";
            mysqli_query($link, $sql1);
            // echo "User registered successfully";
        ?>
            <script type="text/javascript">
                document.getElementById("success").style.display = "block";
                document.getElementById("failure").style.display = "none";
                //window.location = "../subscription.php";
            </script>
    <?php
        }
    }

    ?>






    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>