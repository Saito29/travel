<?php 
include("../path.php"); 
include(ROOT_PATH.'/app/controllers/auth/get-email.php');

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
    <meta name="description" content="Email activation | Travel">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email activation | Travel</title>
    <?php include(ROOT_PATH.'/app/includes/auth-css.php');?>
</head>
<body>
    <div class="card-signin">
        <div class="card card-pd-signin h-auto mx-auto w-75">
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
                <h3 class="card-title card-title-signin">Email Activation</h3>
                <p class="card-text"><span class="text-warning">Note:</span> Only email account registered must input in the form field, Thank you.</p>
                <!--Alert-->
                <?php include(ROOT_PATH."/app/helpers/formAlert.php");?>
                <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
                <!--End of Alert-->
                <div class="row gy-2    ">
                    <form action="emailActivation.php" method="post" autocomplete="on" class="form-signin" enctype="application/x-www-form-urlencoded">
                        <div class="col-xxl-8 col-md-8 mb-4">
                            <label for="email" class="signin form-label">Email<span class="colon">*</span></label>
                            <input type="email" class="input-signin" id="email" name="email" value="<?php echo htmlspecialchars($email)?>" placeholder="Email address" autocomplete="on"><br>
                        </div>
                        <div class="col-xxl-8 col-md-8">
                            <button type="submit" id="submit-signin" name="email-btn" class="btn">Verify email</button>
                        </div>
                    </form>
                </div>
            </div>  
            <div class="line-break-signin"></div>
            <div class="card-body link-signin">
                <p class="link-signin-acc">Don't have a account?, <a href="<?php echo BASE_URL_LINKS.'/signup.php'?>" target="_self" class="card-link-signin">Register here.</a></p>
                <p class="link-signin-acc">Forget your password, <a href="<?php echo BASE_URL_LINKS.'/forgetpassword.php'?>" target="_self" class="card-link-signin">click here.</a></p>
                <p class="link-signin-acc">Take me back to<a href="<?php echo BASE_URL_LINKS.'/signin.php'?>" target="_self" class="card-link-signin"> signin page.</a></p>
            </div>
        </div>
    </div>
</body>
</html>