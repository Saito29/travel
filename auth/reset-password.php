<?php 
include("../path.php");
include(ROOT_PATH.'/app/config/db.php');

    $token = $_GET['token'];

    $token_hash = hash('sha256', $token);

    $sql = "SELECT * FROM users
    WHERE reset_token_hash = ? ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $token_hash);

    $stmt->execute();

    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    if($user === null) {
        die("Token could not found");
    }

    if (strtotime($user['reset_token_expires_at']) <= time()){
        die("Token has expired!");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel | Reset Password Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Reset Password</title>
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
                    <h3 class="card-title card-title-fgp">Reset password</h3>
                    <p class="card-text card-text-fgp mb-2"><span class="text-warning">Note:</span>Password must be at least minimum of 8 characters,
                    ['one letter', 'one number']</p>
                </div>
                <div class="row gy-4">
                    <form action="process-reset-password.php" method="post" autocomplete="on" class="form-fgp" enctype="application/x-www-form-urlencoded">
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token)?>">
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password" for="password">New password</label><br>
                            <input type="password" class="input-fgp password" id="password" name="password" minlength="8" placeholder="Enter new password" ><br>
                            <i class='bx bx-low-vision eye-icon toggle-password'></i><br>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password" for="cfpassword">Re-enter password</label><br>
                            <input type="password" class="input-fgp rtPassword" id="cfpassword" name="cfpassword" minlength="8" placeholder="Re-enter new password" ><br>
                            <i class='bx bx-low-vision eye-icon togglePassword'></i><br>
                        </div>
                        <div class="col-xxl-8 col-md-8">
                            <button type="submit" id="submit-fgp" name="rsPassword"><i class='bx bx-envelope icon'></i>Change password</button>
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