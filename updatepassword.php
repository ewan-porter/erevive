<?php
session_start();

$user = $_SESSION['userLogged'];

if (!isset($_SESSION['userLogged'])) {
    header('Location:signin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eRevive - Update Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="d-flex flex-column" style="min-height: 100vh">


<!-- navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:#fff; font-size:28px;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">


                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-content">

                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>

                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>

                    <li class="nav-item px-2">
                        <a class="nav-link active" href="admin.php">MY ACCOUNT</a>
                    </li>


                </ul>
            </div>

        </nav>
    </div>

    <div class="container py-3">
        <div class="row justify-content-between">
            <div class="col back-button">
                <a href="admin.php"><button type="button" class="btn btn-primary hvr-grow"><i
                            class="fas fa-undo-alt"></i> Go back</button></a>
            </div>
            <div class="col text-end">
                <?php echo "Welcome, " . $_SESSION['userFname'] . ". &nbsp <a href='logout.php'>Logout</a> "; ?>
            </div>
        </div>
    </div>


    <main class="flex-fill d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center pt-5">
                <h1>Update Password</h1>
            </div>
            <div class="container register-container">
                <!-- update password form -->
                <form action="updatepasswordprocess.php" method="POST" name="form_process" id="form_process">



                    <div class="mb-4 col-md-12">
                        <label for="currentPassword" class="form-label mb-1">Current Password</label>
                        <div class="input-icons">
                            <i class="fa fa-key fa-2x icon">
                            </i>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                        </div>
                    </div>


                    <div class="mb-4 col-md-12">
                        <label for="newPassword" class="form-label">New Password</label>

                        <div class="input-icons">
                            <i class="fa fa-key fa-2x icon"></i>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" onkeyup='check();' required>

                        </div>




                    </div>

                    
                    <div class="mb-4 col-md-12">
                        <label for="confirmNewPassword" class="form-label">Confirm New Password</label>

                        <div class="input-icons">
                            <i class="fa fa-key fa-2x icon"></i>
                            <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" onkeyup='check();' required>

                        </div>

                    </div>

                    <input class="pwd-checkbox" type="checkbox" onclick="checkPwd()"> Toggle Password Visibility
                    <div id="message"></div>


                    <div class="mt-3 col-md-12 d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary btn-lg registerBtn hvr-grow" value="Update Password"
                            id="updatePasswordBtn">
                    </div>


                </form>



            </div>
        </div>
    </main>

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center justify-content-md-start">
                        <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
                    </div>
                    <div class="d-flex justify-content-center justify-content-md-start pt-3">
                        <p>Copyright ?? eRevive 2022, Inc. All rights reserved </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center justify-content-md-end">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <div>


                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">

                                    <li class="nav-item px-2">
                                        <a class="nav-link" href="#">ABOUT</a>
                                    </li>

                                    <li class="nav-item px-2">
                                        <a class="nav-link" href="#">CONTACT</a>
                                    </li>

                                    <li class="nav-item px-2">
                                        <a class="nav-link" href="signin.php">SIGN IN / REGISTER</a>
                                    </li>


                                </ul>
                            </div>

                        </nav>

                    </div>
                    <div class="d-flex justify-content-center justify-content-md-end">
                        <a class="px-2 footer-icon hvr-grow" href="#facebook"><img src="images/icons/facebook.png"></a>
                        <a class="px-2 footer-icon hvr-grow" href="#twitter"><img src="images/icons/twitter.png"></a>
                        <a class="px-2 footer-icon hvr-grow" href="#instagram"><img src="images/icons/insta.png"></a>
                    </div>
                </div>


            </div>
        </div>
    </footer>
    <script src="js/updatePass.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>