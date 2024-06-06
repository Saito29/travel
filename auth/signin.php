<?php 
include("../path.php"); 
include(ROOT_PATH.'/app/controllers/user.php');

#if session already login can't access the login page again
if(isset($_SESSION['id'])){
    $_SESSION['messages'] = "You're already login.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location: '.BASE_URL.'/index.php?SNID='.$_SESSION['id']);
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Signin | Travel">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin | Travel</title>
    <?php include(ROOT_PATH.'/app/includes/auth-css.php');?>
</head>
<body>
    <div class="card-signin">
        <div class="card card-pd-signin h-auto">
            <div class="logo-content-signin">
                <?php 
                    $settings_query = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
                ?>
                <?php while($setting = mysqli_fetch_assoc($settings_query)):?>
                <img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadLogo/'?><?php echo htmlentities($setting['logo'])?>" alt="Logo" width="40px" height="40px">
                <?php endwhile;?>
                <h2 class="txt-signin">Travel</span>
            </div>
            <div class="card-body card-body-signin">
                <h3 class="card-title card-title-signin">Login to your account</h3>
                <div class="row gy-3">
                    <form action="signin.php" method="post" autocomplete="on" class="form-signin" enctype="application/x-www-form-urlencoded">
                        <!--Alert-->
                        <?php include(ROOT_PATH."/app/helpers/formAlert.php");?>
                        <!--End of Alert-->
                        <div class="col-xxl-8 col-md-8">
                            <label for="email" class="signin form-label">Email<span class="colon">*</span></label>
                            <input type="text" class="input-signin" id="email" name="email" value="<?php echo htmlspecialchars($email)?>" placeholder="Email address" autocomplete="on"><br>
                        </div>
                        <div class="col-xxl-8 col-md-8">
                            <label for="password" class="signin form-label">Password <span class="colon">*</span></label>
                            <input type="password" name="password" id="password" minlength="8" class="input-signin password" value="<?php echo htmlspecialchars($password)?>" placeholder="Password" autocomplete="on">
                            <i class='bx bx-low-vision field-icon toggle-password'></i><br>
                        </div>
                        <div class="col-xxl-8 col-md-8">
                            <button type="submit" id="submit-signin" name="signin-btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>  
            <div class="line-break-signin"></div>
            <div class="card-body link-signin">
                <p class="link-signin-acc">Don't have a account?, <a href="<?php echo BASE_URL_LINKS.'/signup.php'?>" target="_self" class="card-link-signin">Register here.</a></p>
                <p class="link-signin-acc">Forget your password, <a href="<?php echo BASE_URL_LINKS.'/forgetpassword.php'?>" target="_self" class="card-link-signin">click here.</a></p>
                <p class="link-signin-acc">Not verified email account yet?, <a href="<?php echo BASE_URL_LINKS.'/emailActivation.php'?>" target="_self" class="card-link-signin">click here.</a></p>
                <p class="link-signin-acc">Take me back to<a href="<?php echo BASE_URL.'/index.php'?>" target="_self" class="card-link-signin"> Homepage.</a></p>
            </div>
        </div>
    </div>
    <!--Customized Js-->
    <script src="<?php echo BASE_URL.'/asset/js/togglePassword.js'?>"></script>
</body>
</html>