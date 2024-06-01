<?php 
include("../path.php"); 
include(ROOT_PATH."/app/controllers/auth/forgot-password.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Forget Password | Travel">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password | Travel</title>
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
                    <h3 class="card-title card-title-fgp">Forget password</h3>
                    <p class="card-text card-text-fgp"><span class="text-warning">NOTE:</span> Enter your email adress, your password will be reset and link will be emailed to you.</p>
                </div>
                <br>
                <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                <div class="row gy-4">
                    <form action="forgetpassword.php" method="post" autocomplete="on" class="form-fgp" enctype="application/x-www-form-urlencoded">
                        <div class="col-xxl-4 col-md-6">
                            <label for="email" class="forget-password">Email address</label><br>
                            <input type="email" class="input-fgp" name="email" id="email" placeholder="Enter Email address" autocomplete="on"><br>
                        </div>
                        <div class="col-xxl-8 col-md-8">
                            <button type="submit" id="submit-fgp" name="forget-btn"><i class='bx bx-envelope icon'></i>Forgot Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="line-break-fgp"></div>
            <div class="card-body link-fgp">
                <p class="link-fgp-acc">Forget it, <a href="<?php echo BASE_URL.'/auth/signin.php'?>" target="_self" class="card-link-fgp">send me back</a> to the sign in screen.</p>
            </div>
        </div>
    </div>
    <script src="<?php echo BASE_URL.'/asset/js/togglePassword.js'?>"></script>
</body>
</html>