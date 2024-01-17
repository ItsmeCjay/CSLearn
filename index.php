<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
</head>
<style>
    html,
    body {
        background-image: linear-gradient(rgba(83, 90, 117, 0.7), rgba(4, 9, 30, 0.7)), url(/images/Banner.jpg);
        min-height: 100vh;
        width: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
        font-family: 'Poppins', sans-serif;
    }
</style>

<?php 
include('connection.php');
if(isset($_REQUEST['login']))
{
    $email = $_REQUEST['email'];
    $pwd = md5($_REQUEST['pwd']);
    $select_query = mysqli_query($connection, "SELECT * FROM usertable where email='$email' and password='$pwd'");
    $result = mysqli_num_rows($select_query);
    if($result>0)
    {?>
        <script>
            alert("Login success");
        </script>
    <?php }
    else {
        ?>
        <script>
            alert("Invalid login credentials");
        </script>
        <?php
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="index.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="pwd" id="pwd" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Leka1MpAAAAALAr9U3KvCdMG5nu_QVHR5ZnjyzW"></div>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" id="login" name="login" value="login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
$(document).ready(function() {
    $(document).on('click', '#login', function() {
        var response = grecaptcha.getResponse();

        if (response.length === 0) {
            alert("Please verify you are not a robot");
            return false;
        } else {
            // Perform login action here
            // This is a placeholder, replace it with your actual login logic
            alert("Login successful!");
            // Redirect or perform other actions after successful login
        }
    });
});
</script>
