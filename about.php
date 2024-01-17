<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($connection, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fetch_info['name'] ?> | CSLearn</title>

    <!-- CSS-->
    <link rel="stylesheet" href="style.css">

    <!-- Boxicons CSS-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://kit.fontawesome.com/a153a049c2.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Header -->
    <section class="sub-header">
        <nav>
            <a href="home.php"><img src="images/Logo.png" alt=""></a>
            <div class="nav-links" id="navLinks">
                <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="courses.php">COURSE</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>About Us</h1>
    </section>
    <!-- About us COntent-->
    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h1>Join us in exploring the world of computer science effortlessly!</h1>
                <p>
                    CSLearn is your partner in the world of learning, offering simplicity in every lesson.
                    Discover our user-friendly platform designed for all skill levels. Let's learn together with ease
                    and fun!
                </p>
                <a href="courses.php" class="hero-btn red-btn">EXPLORE NOW</a>
            </div>
            <div class="about-col">
                <img src="images/team.jpg">
            </div>
        </div>
    </section>

    <!-- Footer-->
    <section class="footer">
        <h4>About Us</h4>
        <p>
            CSLearn: Your go-to destination for simplified computer science education.
        </p>
        <div class="icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-github"></i>
        </div>
    </section>

    <!-- Javascript toggle menu-->
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>
</body>

</html>