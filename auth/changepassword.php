<?php 
include("../path.php"); 
include(ROOT_PATH.'/app/controllers/auth/chPassword.php');

#if session not login send header to homepage
if(!isset($_SESSION['id'])){
    $_SESSION['messages'] = "You're need to login.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location: '.BASE_URL.'/index.php');
    exit(0);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel | Change Password Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Change Password</title>
    <?php include(ROOT_PATH.'/app/includes/auth-css.php');?>
</head>
<body>
    <div class="card-fgp">
        <div class="card card-pd-fgp h-auto">
            <div class="logo-content-fgp">
                <?php 
                    $settings_query = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
                ?>
                <?php while($setting = mysqli_fetch_assoc($settings_query)):?>
                <img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadLogo/'?><?php echo htmlentities($setting['logo'])?>" alt="Logo" width="40px" height="40px">
                <?php endwhile;?>
                <h2 class="txt-fgp">Travel</h2>
            </div>
            <div class="card-body card-body-fgp">
                <div class="card-content-fgp">
                    <h3 class="card-title card-title-fgp">Change password</h3>
                    <p class="card-text card-text-fgp mb-2"><span class="text-warning">Note:</span>Password must at least contain 8 characters</p>
                </div>
                <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                <div class="row gy-4">
                    <form action="changepassword.php" method="post" autocomplete="on" class="form-fgp" enctype="application/x-www-form-urlencoded">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id)?>">
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password" for="password">New password</label><br>
                            <input type="password" class="input-fgp password" id="password" name="password" minlength="8" placeholder="Enter new password"><br>
                            <i class='bx bx-low-vision eye-icon toggle-password'></i><br>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password" for="cfpassword">Re-enter password</label><br>
                            <input type="password" class="input-fgp rtPassword" id="cfpassword" name="cfpassword" minlength="8" placeholder="Re-enter new password"><br>
                            <i class='bx bx-low-vision eye-icon togglePassword'></i><br>
                        </div>
                        <p class="card-text"><a href="<?php echo BASE_URL_LINKS.'/forgetpassword.php'?>" class="text-decoration-none text-success">Forgot Password</a></p>
                        <div class="col-xxl-8 col-md-8">
                            <button type="submit" id="submit-fgp" name="chPassword"><i class='bx bx-envelope icon'></i>Change password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="line-break-fgp"></div>
            <div class="card-body link-fgp">
                <p class="link-fgp-acc">Forget it, <a href="<?php echo BASE_URL.'/index.php'?>" target="_self" class="card-link-fgp">send me back</a> to the Home page screen.</p>
            </div>
        </div>
    </div>
    <script src="<?php echo BASE_URL.'/asset/js/togglePassword.js'?>"></script>
</body>
</html>