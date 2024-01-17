<?php 
require_once "controllerUserData.php";

$email = $_SESSION['email'];

if($email != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($connection, $sql);

    if($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
        $profile_image = $fetch_info['profile_image'];
        $bio = $fetch_info['bio'];
        // Add more fields as needed

        // Check if the logout parameter is set
        if (isset($_GET['logout'])) {
            // Unset all session variables
            session_unset();

            // Destroy the session
            session_destroy();

            // Redirect to the login page
            header('Location: index.php');
            exit;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $name ?> | Profile | CSLearn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add any additional styles if needed -->
    <style>
        /* Global Styles */
        body {
            background-color: #fff;
            color: #232836;
            font-family: Arial, sans-serif;
        }
        /* Profile Page Styles */
        .profile-btn {
            width: 45%; /* Adjust the width as needed */
            margin: 10px; /* Adjust the margin as needed */
        }   

        .btn-container {
            display: flex;
            justify-content: space-between;
        }
        /* Profile Page Styles */
        .profile {
            padding: 50px 0;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f44336;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .card-body {
            text-align: center;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Logout Button Styles */
        .logout-btn {
            margin-top: 20px;
        }

        .header {
            min-height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(83, 90, 117, 0.7), rgba(4, 9, 30, 0.7)), url(/images/Banner.jpg);
            background-position: center;
            background-size: cover;
            position: relative;
        }

        nav {
            display: flex;
            padding: 2% 6%;
            justify-content: space-between;
            align-items: center;
        }

        nav img {
            width: 150px;
        }

        .nav-links {
            flex: 1;
            text-align: right;
        }

        .nav-links ul li {
            list-style: none;
            display: inline-block;
            padding: 8px 12px;
            position: relative;
        }

        .nav-links ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }

        .nav-links ul li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #f44336;
            display: block;
            margin: auto;
            transition: 0.5s;
        }

        .nav-links ul li:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>
<!-- Header -->
<section class="header">
    <nav>
        <a href="home.php"><img src="images/Logo.png" alt=""></a>
        <div class="nav-links" id="navLinks">
            <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="courses.php">COURSE</a></li>
                <li><a href="logout-user.php">LOGOUT</a></li>
            </ul>
        </div>
        <i class="fa-solid fa-bars" onclick="showMenu()"></i>
    </nav>

<!-- Profile Section -->
<section class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2><?php echo $name ?>'s Profile</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Name: </strong><?php echo $name ?></p>
                        <p><strong>Email: </strong><?php echo $email ?></p>
                        <p><strong>Bio: </strong><?php echo $bio ?></p>
                        <!-- Add more profile fields here -->
                        <!-- Edit Profile and Logout buttons -->
                        <div class="btn-container">
                            <a href="edit_profile.php" class="btn btn-primary profile-btn">Edit Profile</a>
                            <a href="?logout=true" class="btn btn-danger profile-btn">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
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

<!-- Add any additional scripts if needed -->
</body>
</html>
<?php
    } else {
        echo "Error fetching user information.";
    }
} else {
    header('Location: index.php');
}
?>
