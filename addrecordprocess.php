<?php
// checking user loggged in
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
    <title>eRevive - Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="d-flex flex-column" style="min-height: 100vh">

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
                <!-- user welcome message -->
                <?php echo "Welcome, " . $_SESSION['userFname'] . ". &nbsp <a href='logout.php'>Logout</a> "; ?>
            </div>
        </div>
    </div>

    <main class=" flex-fill d-flex align-items-center justify-content-center">
        <div class="set-width">








            <div class="container d-flex align-items-center justify-content-center ">
                <h1>Admin Home</h1>
            </div>
            <div class="clip-container">
                <div class="clip__div"></div>
            </div>
            <div class="addrecord-container d-flex align-items-center justify-content-center pb-5">


                <div class="container form-container">
                    <form action="addrecordprocess.php" method="POST" enctype="multipart/form-data">



                        <div class="mb-4 col-md-12 add-input">
                            <label for="product" class="form-label mb-1">Product Name</label>

                            <input type="text" class="form-control add-form" id="product" name="product" required>

                        </div>

                        <div class="mb-4 col-md-12 add-input">
                            <label for="brand" class="form-label mb-1">Brand</label>

                            <input type="text" class="form-control add-form" id="brand" name="brand" required>
                        </div>

                        <div class="mb-4 col-md-12 add-input">
                            <label for="condition" class="form-label mb-1">Condition</label>

                            <select class="form-control add-form" id="condition" name="condition" required>
                                <option value="Brand new">Brand new</option>
                                <option value="Like New">Like New</option>
                                <option value="Used - Excellent">Used - Excellent</option>
                                <option value="Used - Good">Used - Good</option>
                                <option value="Used - Fair">Used - Fair</option>
                            </select>

                        </div>

                        <div class="mb-4 col-md-12 add-input">
                            <label for="cost" class="form-label mb-1">Cost</label>
                            <input type="number" step=".01" class="form-control add-form" id="cost" name="cost"
                                required>
                        </div>

                        <div class="mb-4 col-md-12 add-input">
                            <label for="description" class="form-label mb-1">Description</label>
                            <textarea class="form-control add-form" id="description" name="description" rows="4"
                                required></textarea>
                        </div>

                        <div class="mb-4 col-md-12 add-input">
                            <input name="uploaded" class="form-control-file add-form" type="file" id="uploaded">
                        </div>


                        <div class="mt-3 col-md-12 d-flex justify-content-center">
                            <div class="px-2">
                                <input type="submit" class="btn btn-primary btn-lg cancelBtn hvr-grow" value="Cancel"
                                    id="cancel">
                            </div>
                            <div class="px-2">
                                <input type="submit" class="btn btn-primary btn-lg addBtn hvr-grow" value="Submit"
                                    id="submitrecord-button">
                            </div>
                        </div>



                    </form>

                    <?php

// creating footer function to avoid repeating code

function footer()
{
    $string = " </div>
    </div>
</div>
</main>

<footer>
<div class='container'>
    <div class='row'>
        <div class='col'>
            <div class='d-flex justify-content-center justify-content-md-start'>
                <a class='navbar-brand' href='index.php'><img src='images/logo.png'></a>
            </div>
            <div class='d-flex justify-content-center justify-content-md-start pt-3'>
                <p>Copyright © eRevive 2022, Inc. All rights reserved </p>
            </div>
        </div>
        <div class='col'>
            <div class='d-flex justify-content-center justify-content-md-end'>
                <nav class='navbar navbar-expand-lg navbar-light'>

                    <div>


                        <ul class='navbar-nav ms-auto mb-2 mb-lg-0 '>

                            <li class='nav-item px-2'>
                                <a class='nav-link' href='#'>ABOUT</a>
                            </li>

                            <li class='nav-item px-2'>
                                <a class='nav-link' href='#'>CONTACT</a>
                            </li>

                            <li class='nav-item px-2'>
                            <a class='nav-link' href='admin.php'>MY ACCOUNT</a>
                            </li>


                        </ul>
                    </div>

                </nav>

            </div>
            <div class='d-flex justify-content-center justify-content-md-end'>
                <a class='px-2 footer-icon hvr-grow' href='#facebook'><img src='images/icons/facebook.png'></a>
                <a class='px-2 footer-icon hvr-grow' href='#twitter'><img src='images/icons/twitter.png'></a>
                <a class='px-2 footer-icon hvr-grow' href='#instagram'><img src='images/icons/insta.png'></a>
            </div>
        </div>


    </div>
</div>
</footer>
<script src='js/app.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'
integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'>
</script>
</body>

</html>";

    return $string;
}

include 'includes/error-chk.php';



// checking forms have data entered

if (isset($_POST['product']) && isset($_POST['brand']) && isset($_POST['cost']) && isset($_POST['description']) && isset($_POST['condition'])) {

    // cleaning form data

    $product = strip_tags($_POST['product']);
    $product = htmlspecialchars($product);

    $brand = strip_tags($_POST['brand']);
    $brand = htmlspecialchars($brand);

    $condition = ($_POST['condition']);

    $cost = strip_tags($_POST['cost']);
    $cost = htmlspecialchars($cost);

    $description = strip_tags($_POST['description']);
    $description = htmlspecialchars($description);

    $target_dir = "images/prod-images/"; //target directory for images

    $target_file = $target_dir . basename($_FILES['uploaded']['name']);

    $uploadOk = 1;

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // if statements to check image file ok

    $check = getimagesize($_FILES['uploaded']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        exit(footer());
    }

    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = 0;
        exit(footer());
    }

    if ($_FILES['uploaded']['size'] > 1000000) {
        echo "The file exceeds 1000Kb. Please upload a smaller filesize.";
        $uploadOk = 0;
        exit(footer());
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        exit(footer());
    }

    if ($uploadOk == 0) {
        echo " <p>Your file was not uploaded.</p>";
        exit(footer());
       
    } else {
        if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file)) {

            $target_file; 

        }
        // comments go here - fully document this conditional statement
        else {
            echo "There was an error uploading your file.";
            exit(footer());
        }
    }

    // connect to db

    include 'includes/dbconx.php';



   




} else {
    // exit if any data missing
    echo "Please check all fields entered and try again.";
    exit(footer());
}

 


// prepared statement to add data to db
$sql = "INSERT INTO products (item_name, brand, item_condition, cost, item_description, item_image, user) VALUES (?, ?, ?, ?, ?, ?, ?)";



$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $product, $brand, $condition, $cost, $description, $target_file, $user);
$stmt->execute();




echo "<div class='d-flex justify-content-center pt-2'>";
echo "<p>Item succesfully added</p>";
echo "</div>";
echo footer();


$stmt->close();
$conn->close();

?>

