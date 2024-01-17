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
    <title><?php echo $fetch_info['name'] ?> | CSLearn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

/* Google Fonts*/
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

/* Frontpage*/

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
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

.text-box {
    width: 90%;
    color: #fff;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.text-box h1 {
    font-size: 62px;
}

.text-box p {
    margin: 10px 0 40px;
    font-size: 14px;
    color: #fff;
}

.hero-btn {
    display: inline-block;
    text-decoration: none;
    color: #fff;
    border: 1px solid #fff;
    padding: 12px 34px;
    font-size: 13px;
    background: transparent;
    position: relative;
    cursor: pointer;
}

.hero-btn:hover {
    border: 1px solid #f44336;
    background: #f44336;
    transition: 1s;
}

nav .fa-solid {
    display: none;
}

@media(max-width: 700px) {
    .text-box h1 {
        font-size: 20px;
    }

    .nav-links ul li {
        display: block;
    }

    .nav-links {
        position: absolute;
        background: #f44336;
        height: 100vh;
        width: 200px;
        top: 0;
        right: -200px;
        text-align: left;
        z-index: 2;
        transition: 1s;
    }

    nav .fa-solid {
        display: block;
        color: #fff;
        margin: 10px;
        font-size: 22px;
        cursor: pointer;
    }

    .nav-links ul {
        padding: 30px;
    }
}

/* Course */

.course {
    width: 80%;
    margin: auto;
    text-align: center;
    padding-top: 100px;
}

.course-col p {
    list-style: none;
    position: relative;
}

.course-col p a {
    color: #1C2321;
    text-decoration: none;
    font-size: 15px;
}

.course-col p::after {
    content: '';
    width: 0%;
    height: 2px;
    background: #f44336;
    display: block;
    margin: auto;
    transition: 0.5s;
}

.course-col p:hover::after {
    width: 100%;
}

.course-col {
    flex-basis: content;
    background: #fff3f3;
    border-radius: 10px;
    margin-bottom: 5%;
    padding: 20px 12px;
    box-sizing: border-box;
}

h2 {
    text-align: center;
    font-weight: 600;
    margin: 10px 0;
}

.course-col:hover {
    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);

}

@media(max-width: 700px) {
    .row {
        flex-direction: column;
    }
}

.program {
    width: 80%;
    margin: auto;
    text-align: center;
    padding-top: 100px;
}

.program-col {
    flex-basis: 32%;
    background: #fff3f3;
    border-radius: 10px;
    margin-bottom: 30px;
    padding: 20px 12px;
    box-sizing: border-box;
    position: relative;
    overflow: hidden;
}

.program-col p {
    list-style: none;
    text-align: center;
    color: #1C2321;
    text-decoration: none;
    font-size: 15px;
    margin-top: 6%;
}

.layer {
    background: transparent;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    transition: 0.5s;
}

.layer:hover {
    background: rgba(182, 0, 0, 0.4);
}

h1 {
    font-size: 36px;
    font-weight: 600;
}

p {
    color: #1C2321;
    font-size: 14px;
    font-weight: 300;
    line-height: 22px;
    padding: 10px;
}

.row {
    margin-top: 5%;
    display: flex;
    justify-content: space-between;
}

body {
    background-color: #fff;
    color: #232836;
    font-family: Arial, sans-serif;
}

/* Testimonials */
.testimonials {
    width: 80%;
    margin: auto;
    padding-top: 100px;
    text-align: center;
}

.testimonial-col {
    flex-basis: 44%;
    border-radius: 10px;
    margin-bottom: 5%;
    text-align: left;
    background: #fff3f3;
    padding: 25px;
    cursor: pointer;
    display: flex;
}

.testimonial-col img {
    height: 40px;
    margin-left: 5px;
    margin-right: 30px;
    border-radius: 50%;
}

.testimonial-col p {
    padding: 0;
}

.testimonial-col h2 {
    margin-top: 15px;
    text-align: left;
}

.testimonial-col .fa-solid,
.fa-regular {
    color: #f44336;
}

@media(max-width: 700px) {
    .testimonial-col img {
        margin-left: 0px;
        margin-right: 15px;
    }
}

/* Call to Action*/
.cta {
    margin: 100px auto;
    width: 80%;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(/images/Group.jpg);
    background-position: center;
    background-size: cover;
    border-radius: 10px;
    text-align: center;
    padding: 100px 0;
}

.cta h1 {
    color: #fff;
    margin-bottom: 40px;
    padding: 0;
}

@media(max-width: 700px) {
    .cta h1 {
        font-size: 24px;
    }
}

/* footer*/
.footer {
    width: 100%;
    text-align: center;
    padding: 30px 0;
}

.footer h4 {
    margin-bottom: 25px;
    margin-top: 20px;
    font-weight: 600;
}

.icons .fa-brands {
    color: #f44336;
    margin: 0 13px;
    cursor: pointer;
    padding: 18px 0;

}

/* About Us Page*/
.sub-header {
    height: 50vh;
    width: 100%;
    background-image: linear-gradient(rgba(4, 9, 30, 0.7), rgba(4, 9, 30, 0.7)), url(/images/Banner.jpg);
    background-position: center;
    background-size: cover;
    text-align: center;
    color: #fff;
}

.sub-header h1 {
    margin-top: 100px;
}

.about-us {
    width: 80%;
    margin: auto;
    padding-top: 80px;
    padding-bottom: 50px;
}

.about-col {
    flex-basis: 48%;
    padding: 30px 2px;
}

.about-col img {
    width: 100%;
}

.about-col h1 {
    padding-top: 0;
}

.about-col p {
    padding: 15px 0 25px;
}

.red-btn {
    border: 1px solid #f44336;
    background: transparent;
    color: #f44336;
}

.red-btn:hover {
    color: #fff;
}



/* Log in Sign in*/
.container {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: 30px;
}

.form {
    position: absolute;
    max-width: 430px;
    width: 100%;
    padding: 30px;
    border-radius: 6px;
    background: #fff;
}

.form.signup {
    opacity: 0;
    pointer-events: none;
}

.forms.show-signup .form.signup {
    opacity: 1;
    pointer-events: auto;
}

.forms.show-signup .form.login {
    opacity: 0;
    pointer-events: none;
}

header {
    font-size: 28px;
    font-weight: 600;
    color: #232836;
    text-align: center;
}

form {
    margin-top: 30px;
}

.form .field {
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
    border-radius: 6px;
}

.field input,
.field button {
    height: 100%;
    width: 100%;
    border: none;
    padding: 0 15px;
    font-size: 16px;
    border-radius: 6px;
}

.field input {
    outline: none;
    border: 1px solid #CACACA;
    font-weight: 400;
}

.field input:focus {
    border-bottom-width: 2px;
}

.eye-icon {
    top: 50%;
    right: 10px;
    font-size: 18px;
    color: #8b8b8b;
    position: absolute;
    transform: translateY(-50%);
    cursor: pointer;
    padding: 5px;
}

.field button {
    background-color: #0171d3;
    color: #fff;
    transition: all 0.3 ease;
    cursor: pointer;
}

.field button:hover {
    background-color: #016dcb;
}

.form-link {
    text-align: center;
    margin-top: 10px;
}

.form-link span,
.form-link a {
    font-size: 14px;
    font-weight: 400;
    color: #232836;
}

.form a {
    text-decoration: none;
    color: #0171d3;
}

.form-content a :hover {
    text-decoration: underline;
}

.line {
    height: 1px;
    width: 100%;
    position: relative;
    background-color: #8b8b8b;
    margin: 36px 0;
}

.line::before {
    content: 'Or';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    color: #232836;
    padding: 0 15px;
}

.media-options a {
    display: flex;
    justify-content: center;
    align-items: center;
}

a.facebook {
    background-color: #4267b2;
    color: #fff;
}

a.facebook .facebook-icon {
    height: 28px;
    width: 28px;
    color: #0171d3;
    background-color: #fff;
    font-size: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.facebook-icon,
.img.google-img {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
}

img.google-img {
    height: 20px;
    width: 20px;
    object-fit: cover;
}

a.google {
    border: 1px solid #CACACA;
}

a.google span {
    color: #232836;
    font-weight: 500;
    opacity: 0.6;
}

@media screen and (max-width: 400px) {
    .form {
        padding: 15px;
    }

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
                    <li><a href="profile.php">PROFILE</a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>
                Computer Science Learning Platform
            </h1>
            <p>
                Welcome to CSLearn, your gateway to mastering the complexity of Computer Science!
            </p>
            <a href="about.php" class="hero-btn">Visit us to know more</a>

        </div>
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

    <!-- Program Goals -->
    <section class="program">
        <h1>Our Program Details</h1>
        <p>
            The Bachelor of Science in Computer Science (BSCS) program is a four-year undergraduate degree program that
            provides students with a solid foundation in computer science theory and practice.
        </p>

        <div class="row">
            <div class="program-col">
                <div class="layer">
                    <h2>Description</h2>
                </div>
                <p>
                    The BSCS program covers a wide range of topics, including computer programming, algorithms, data
                    structures, database management, computer architecture, software engineering, artificial
                    intelligence, and machine learning. The program aims to equip students with the technical expertise,
                    analytical skills, and problem-solving abilities necessary to succeed in the field of computer
                    science. <br>
                    <br>
                    Throughout the program, students will have the opportunity to work on individual and group projects,
                    which will help them develop their skills and gain practical experience. They will also have access
                    to state-of-the-art computer labs and other resources that will enable them to gain hands-on
                    experience in a variety of computer science-related fields. <br>
                    <br>
                    Graduates of the BSCS program can pursue careers in various sectors of the tech industry, including
                    software development, systems analysis, database administration, cybersecurity, artificial
                    intelligence, machine learning, and web development. They can also work for various organizations,
                    including corporations, government agencies, non-profit organizations, and start-ups. <br>
                    <br>
                    The BSCS program provides students with a solid foundation in computer science theory and practice,
                    enabling them to succeed in a rapidly changing field that is critical to the success of many
                    organizations in today’s digital world.
                </p>
            </div>
            <div class="program-col">
                <div class="layer">
                    <h2>BSCS Objectives</h2>
                </div>
                <p>
                    The graduates of Bachelor of Science in Computer Science program must have/be able to: <br>
                    <br>
                    1. Apply knowledge of computing fundamentals, knowledge of a computing specialization and
                    mathematics, science and domain knowledge appropriate for the computing specialization of
                    computing models from defined problems and requirements. <br>
                    <br>
                    2. Identify, analyze, formulate, research literature and solve complex computing problems
                    and requirements reaching substantiated conclusions using fundamental principles of <br>
                    mathematics, computing sciences and relevant domain disciplines. <br>
                    <br>
                    3. An ability to apply mathematical foundations, algorithmic principles and computer
                    science theory in the modeling and design of computer-based systems in a way that
                    demonstrates comprehension of the tradeoffs involved in design choices. <br>
                    <br>
                    4. Design and evaluate solutions for complex computing problems, and design and
                    evaluate systems, components, or processes that meet specified needs with appropriate <br>
                    consideration for public health and safety, cultural, societal and environmental
                    considerations.<br>
                    <br>
                    5. Create, select, adapt and apply appropriate techniques, resources and modern
                    computing tools to complex computing activities, with an understanding of the limitations
                    to accomplish a common goal. <br>
                    <br>
                    6. Function effectively as an individual and as a member or leader in diverse teams and in
                    multidisciplinary settings. <br>
                    <br>
                    7. An ability to recognize the legal, social, ethical and professional issues involved in the
                    utilization of computer technology and be guided by the adoption of appropriate <br>
                    professional,
                    ethical and legal practices. <br>
                </p>
            </div>
            <div class="program-col">
                <div class="layer">
                    <h2>VISION</h2>
                </div>
                <p>
                    <br>
                    A leading Research University in the ASEAN Region.
                </p>
                <h2>MISSION</h2>
                <p>
                    The Isabela State University is committed to develop globally competitive human, technological
                    resources and services through quality instruction, innovative research, responsive community
                    engagement and viable resource management programs for inclusive growth and sustainable development.
                </p>
            </div>
        </div>
    </section>
    <!-- Testimonials-->
    <section class="testimonials">
        <h1>What Students Says</h1>
        <p>In this area you can see the comments of students who used the system.</p>
        <div class="row">
            <div class="testimonial-col">
                <img src="images/user1.jpg">
                <div>
                    <p>
                        I really enjoy using this system! It's user-friendly, organized, and makes learning a breeze.
                        The
                        features are great, and it helps me stay on top of my assignments easily. Overall, a fantastic
                        tool
                        for students!
                    </p>
                    <h2>Harry L. Miranda</h2>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <div class="testimonial-col">
                <img src="images/user2.jpg">
                <div>
                    <p>
                        This system has truly enhanced my academic experience. Its intuitive design and seamless
                        navigation
                        have made studying more enjoyable. The interactive features foster engagement, and it's proven
                        to be
                        a valuable companion in my learning journey. Thumbs up!
                    </p>
                    <h2>Sean C. Acosta</h2>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- call to action -->
    <section class="cta">
        <h1>
            Watch For Our Various Online Courses <br>Anywhere From The World
        </h1>
        <a href="" class="hero-btn">CONTACT US</a>
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