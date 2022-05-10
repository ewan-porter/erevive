<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eRevive</title>


    <!-- CDNs -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">


</head>

<body>

    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand"><img src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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


                        <?php
// Code to alter navbar if user is logged in or not
session_start();

if (!isset($_SESSION['userLogged'])) {
    echo "<a class='nav-link' href='signincheck.php'>SIGN IN / REGISTER</a>";
} else {
    echo "<a class='nav-link' href='admin.php'>MY ACCOUNT</a>";
}

?>


                    </li>


                </ul>
            </div>

        </nav>
    </div>


    <?php

// Welcoming user if they are logged in
if (isset($_SESSION['userLogged'])) {
    echo '<div class="container d-flex justify-content-center justify-content-md-end">';
    echo "Welcome, " . $_SESSION['userFname'] . ". &nbsp <a href='logout.php'>Logout</a> ";
    echo "</div>";
}
?>


    </div>

    <main class="flex-fill d-flex align-items-center justify-content-center">
        <div class="set-width">


            <div class="container d-flex align-items-center justify-content-center">
                <h1>Find your new...</h1>

            </div>

            <div class="container form-container">
                <form action="searchprocess.php" method="POST" name="search-records">
                    <label for="searchQuery" class="form-label search-label"></label>
                    <div class="input-icons">
                        <i class="fas fa-search fa-2x icon"></i>
                        <input type="text" class="form-control" id="searchQuery" name="searchQuery" required>
                    </div>
                    <div class="my-3 col-md-12 d-flex justify-content-center">

                        <input type="submit" class="btn btn-primary btn-lg searchBtn hvr-grow" value="Search"
                            id="homeSearch">


                    </div>
                </form>
            </div>

            <div class="clip-container">
                <div class="clip__div"></div>
            </div>
            <div class="editrecord-container form-container d-flex align-items-center justify-content-center pb-5">


                <div class="container">


                    
                    
                    <?php

//connect to database
require 'includes/dbconx.php';

//check if search button pressed to show all items by default
if (!isset($_POST['homeSearch'])) {

    $sql = "SELECT item_name, brand, item_condition, cost, item_description, item_image, id FROM products";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

}

//output results

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo '<div class="row justify-content-center">';

        echo '<div class="col resultsImg d-flex align-items-center justify-content-center">';
        echo '<img class="resultsImg" src="' . $row['item_image'] . '">';
        echo '</div>';
        echo '<div class="col-3 d-flex flex-column justify-content-evenly">';
        echo '<h3>' . $row['item_name'] . '</h3>';
        echo '<h4>' . $row['brand'] . '</h4>';
        echo '<h5>' . $row['item_condition'] . '</h5>';
        echo '<h4>£' . $row['cost'] . '</h4>';
        echo '</div>';
        echo '<div class="col-lg-5 d-flex align-items-center py-3 item-desc">';
        echo '<p class=""></p>' . $row['item_description'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<hr class="solid">';

    }
} else {
    echo "No items found.";
}
mysqli_close($conn);

?>





                </div>
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


                                    
                                        <?php
                                        
// Code to alter footer if user is logged in or not
if (!isset($_SESSION['userLogged'])) {
    echo "<a class='nav-link' href='signincheck.php'>SIGN IN / REGISTER</a>";
} else {
    echo "<a class='nav-link' href='admin.php'>MY ACCOUNT</a>";
}

?>
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