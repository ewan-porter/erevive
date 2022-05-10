<?php
// checking user logged in
session_start();

$user = $_SESSION['userLogged'];

if (!isset($_SESSION['userLogged'])) {
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eRevive - Delete</title>

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


                        <a class="nav-link" href="admin.php">MY ACCOUNT</a>
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
                <!-- welcome message -->
                <?php echo "Welcome, " . $_SESSION['userFname'] . ". &nbsp <a href='logout.php'>Logout</a> "; ?>
            </div>
        </div>
    </div>

    <main class=" flex-fill d-flex align-items-center justify-content-center">
        <div class="set-width">


            <?php 
            // getting record from session
 include('includes/error-chk.php');
 $recordID  = $_GET['recordID'];
?>





            <div class="container d-flex align-items-center justify-content-center ">
                <h1>Delete a Record</h1>
            </div>
            <div class="clip-container">
                <div class="clip__div"></div>
            </div>
            <div class="admin-container d-flex align-items-center justify-content-center pb-5">


                <div class="container admin-button-container text-center">
                    <h2 class="body-header"> Are you sure you want to delete this record?</h2>

<!-- form -->
                    <form action="deleterecordprocess.php" method="POST" name="delete-records">
                        <div class="mb-4 col-md-12 add-input editProduct--hidden">


                            <input type="text" class="form-control add-form" id="recordID" name="recordID"
                                value="<?php echo $recordID ?>" required>

                        </div>
                        <div class="mt-3 col-md-12 d-flex justify-content-center">
                            <div class="px-2">
                                <a href="editrecords.php"><input
                                        class="btn btn-primary btn-lg cancelBtn hvr-grow" value="Cancel"
                                        id="cancel"></a>
                            </div>
                            <div class="px-2">
                                <input type="submit" class="btn btn-primary btn-lg addBtn hvr-grow" value="Delete"
                                    id="deleterecord-button">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>




    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center justify-content-md-start">
                        <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
                    </div>
                    <div class="d-flex justify-content-center justify-content-md-start pt-3">
                        <p>Copyright © eRevive 2022, Inc. All rights reserved </p>
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
                                    <a class="nav-link" href="admin.php">MY ACCOUNT</a>
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
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>