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
        <h1>Courses</h1>
    </section>

    <!-- Course -->
    <section class="course">
        <h1>
            Courses We Offer to Watch
        </h1>
        <p>
            Navigate your academic journey seamlessly from the first year to the fourth year with watching courses
            tutorials.
        </p>

        <div class="row">
            <div class="course-col">
                <h2>1st Year Courses</h2>
                <p>
                    <a href="">
                        Mathematics in the Modern World
                    </a>
                </p>
                <p>
                    <a href="">
                        Purposive Communication
                    </a>
                </p>
                <p>
                    <a href="">
                        Introduction to Computing
                    </a>
                </p>
                <p>
                    <a href="">
                        Fundamentals of Programming
                    </a>
                </p>
                <p>
                    <a href="">
                        Gender and Society
                    </a>
                </p>
                <p>
                    <a href="">
                        Discrete Structures 1
                    </a>
                </p>
                <p>
                    <a href="">
                        Intermediate Programming
                    </a>
                </p>
                <p>
                    <a href="">
                        Readings in Philippine History
                    </a>
                </p>
                <p>
                    <a href="">
                        Understanding the Self
                    </a>
                </p>
            </div>

            <div class="course-col">
                <h2>2nd Year Courses</h2>
                <p>
                    <a href="">
                        Discrete Structures 2
                    </a>
                </p>
                <p>
                    <a href="">
                        Object-Oriented Programming
                    </a>
                </p>
                <p>
                    <a href="">
                        Data Structures and Algorithms
                    </a>
                </p>
                <p>
                    <a href="">
                        Calculus with Analytic Geometry
                    </a>
                </p>
                <p>
                    <a href="">
                        Algorithms and Complexity
                    </a>
                </p>
                <p>
                    <a href="">
                        Information Management
                    </a>
                </p>
                <p>
                    <a href="">
                        Statistical Methods for Data Analysis and Inference
                    </a>
                </p>
                <p>
                    <a href="">
                        Data Preparation and Analysis
                    </a>
                </p>
            </div>

            <div class="course-col">
                <h2>3rd Year Courses</h2>
                <p>
                    <a href="">
                        Information Assurance and Security
                    </a>
                </p>
                <p>
                    <a href="">
                        Automata Theory and Formal Languages
                    </a>
                </p>
                <p>
                    <a href="">
                        Data Mining Applications
                    </a>
                </p>
                <p>
                    <a href="">
                        Data Mining Techniques and Tools
                    </a>
                </p>
                <p>
                    <a href="">
                        Architecture and Organization
                    </a>
                </p>
                <p>
                    <a href="">
                        Software Engineering 1
                    </a>
                </p>
                <p>
                    <a href="">
                        Software Engineering 2
                    </a>
                </p>
                <p>
                    <a href="">
                        Application Development and Emerging Technologies
                    </a>
                </p>
                <p>
                    <a href="">
                        Programming Languages
                    </a>
                </p>
                <p>
                    <a href="">
                        Algorithms for Data Mining
                    </a>
                </p>
                <p>
                    <a href="">
                        Data Mining Methodology
                    </a>
                </p>
                <p>
                    <a href="">
                        Leadership and Management in the Profession
                    </a>
                </p>
            </div>

            <div class="course-col">
                <h2>4th Year Courses</h2>
                <p>
                    <a href="">
                        Human-Computer Interaction
                    </a>
                </p>
                <p>
                    <a href="">
                        Networks and Communications
                    </a>
                </p>
                <p>
                    <a href="">
                        Operating Systems
                    </a>
                </p>
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