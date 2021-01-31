<?php
session_start();
include("config.php");
?>
<?php
if(isset($_POST["submit"]))
{
    global $con;

    $uname= $_POST["uname"];
    $upass= $_POST["upass"];
    $query = $con->prepare("SELECT * FROM users WHERE uname = :username and upass = :userpass");
    $query-> bindParam(':username', $uname, PDO::PARAM_STR);
    $query-> bindParam(':userpass', $upass, PDO::PARAM_STR);
    $query-> execute();
    if( $results = $query -> fetch(PDO::FETCH_ASSOC) ){
        $_SESSION["uid"]=$results["uid"];
        $_SESSION["uname"]=$results["uname"];
        header("location:dashboard.php");
    }else{
        echo "<script>alert('Invalid Detail');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="assets/images/privacy.svg"/>
    <title>MOODLE</title>

    <meta name="description" content="Search the web for sites and images.">
    <meta name="keywords" content="Search engine, doodle, websites">
    <meta name="author" content="Reece Kenney">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper indexPage container">

        <div class="mainSection">

            <div class="logoContainer">
                <img src="assets/images/moodleLogo.png" title="Private and Anonymous Search Engine" alt="Logo">
            </div>

            <div class="searchContainer" style="text-align: center;width: 420px;">
                <h2>Login Portal</h2> <br>
                <form action="/" method="POST" autocomplete="off">
                    <input type="text" class="searchBox" placeholder="Enter Name" name="uname"><br>
                    <input type="password" class="searchBox" placeholder="Enter Password" name="upass">
                    <input class="searchButton" type="submit" name="submit" value="Log In">
                </form>

            </div>

            <div class="privacyContainer">
                <div class="image">
                    <img src="assets/images/privacy.svg" title="Private and Anonymous Search Engine" alt="Logo">
                </div>
                <div class="description">
                    <small>This is a</small><h1>Anonymous Window</h1>
                    <p>
                        Moodle doesn't remember what you do in a Private Window.
                        Sites you visit won't show up in your history, and cookies vanish when you're done.
                        Private Windows don't make you completely anonymous online, though.
                        <a href="#">Learn more</a>
                    </p>
                </div>
            </div>

        </div>

    </div>

</body>

</html>