<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eRevive - Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

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
                        <a class="nav-link" href="signin.php">SIGN IN / REGISTER</a>
                    </li>


                </ul>
            </div>

        </nav>
    </div>
    
    <main>
        <div class="container d-flex align-items-center justify-content-center pt-5">
            <h1>Register</h1>
        </div>

        <!-- register form -->
        <div class="container form-container">
            <form action="register.php" method="POST" name="form_process" id="form_process">



                <div class="mb-4 col-md-12">
                    <label for="username" class="form-label mb-1">Username</label>
                    <div class="input-icons">
                        <i class="fa fa-user fa-2x icon">
                        </i>
                        <input type="text" class="form-control" id="user" name="user" required>
                    </div>
                </div>

                <div class="mb-4 col-md-12">
                    <label for="email" class="form-label mb-1">Email address</label>
                    <div class="input-icons">
                        <i class="fa fa-envelope fa-2x icon">
                        </i>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="mb-4 col-md-12">
                            <label for="fname" class="form-label mb-1">First Name</label>
                            <div class="input-icons">
                                <i class="fa fa-id-card fa-2x icon">
                                </i>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-4 col-md-12">
                            <label for="lname" class="form-label mb-1">First Name</label>
                            <div class="input-icons">
                                <i class="fa fa-id-card fa-2x icon">
                                </i>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mb-4 col-md-12">
                    <label for="pwd" class="form-label">Password</label>

                    <div class="input-icons">
                        <i class="fa fa-key fa-2x icon"></i>
                        <input type="password" class="form-control" id="pwd" name="pwd" onkeyup='check();' required" pattern=".{8,}" 
                        title="Password must contain eight or more characters.">

                    </div>


                    <label for="confirmPwd" class="form-label">Confirm Password</label>

                    <div class="input-icons">
                        <i class="fa fa-key fa-2x icon"></i>
                        <input type="password" class="form-control" id="confirmPwd" onkeyup='check();' name="confirmPwd"
                            required pattern=".{8,}" title="Password must contain eight or more characters.">
                    </div>


                    <input class="pwd-checkbox" type="checkbox" onclick="checkPwd()"> Toggle Password Visibility
                    <div id="message"></div>

                </div>
                
  <?php 

// include error check
include 'includes/error-chk.php';


// check all data entered
if ( isset ($_POST['user']) && isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['pwd'])) {
   

//    clean data
    $user = trim($_POST['user']);
    $user = strip_tags($user);
    $user = htmlspecialchars($user);
    


    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $fname = trim($_POST['fname']);
    $fname = strip_tags($fname);
    $fname = htmlspecialchars($fname);

    $lname = trim($_POST['lname']);
    $lname = strip_tags($lname);
    $lname = htmlspecialchars($lname);



    $pwd = $_POST['pwd'];


    $pwdhash = md5($pwd);

    

    



    
    
    
    

//    connect to db

    include 'includes/dbconx.php';
    
  

   

} else {
    exit ("No data recieved");
}

// check username not already present in db

$checkUser = "SELECT * FROM users WHERE username = ?";

$stmt = $conn->prepare($checkUser);
$stmt->bind_param("s", $user);
$stmt->execute();


$result = $stmt->get_result();

if($result->num_rows >0) {
  
    echo "<div class='d-flex justify-content-center text-danger'>";
    echo "<p>This username is already taken, please try another.</p>";
    echo "</div>";
} else {



// check email not already present in db
    $checkUser = "SELECT * FROM users WHERE email = ?";

    $stmt = $conn->prepare($checkUser);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    
    $result = $stmt->get_result();


    if($result->num_rows >0) {
        
        echo "<div class='d-flex justify-content-center text-danger'>";
        echo "<p>This email address is already taken. Do you already have an account?</p>";
        echo "</div>";

} else {



// insert user data into db
$sql = "INSERT INTO users (username, email, fname, lname, pwd) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $user, $email, $fname, $lname, $pwdhash);
$stmt->execute();

echo "<div class='d-flex justify-content-center'>";
        echo "<p>Registration successful. <a href='signin.html'>Click here to sign in.</a></p>";
        echo "</div>";



$stmt->close();
$conn->close();

}}


?>
<div class="mt-3 col-md-12 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary btn-lg registerBtn hvr-grow" value="Register"
                        id="register-button">
                </div>


            </form>
            <div class="d-flex justify-content-center pt-3">
                <h2>Already have an account? <a href="signin.html">Log In</a></h2>
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
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>