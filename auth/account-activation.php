<?php 
include("../path.php"); 
include(ROOT_PATH.'/app/controllers/user.php');

#query
$sql = "SELECT * FROM users WHERE account_activation_hash = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param('s', $_GET['token']);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if(empty($user)) {
    # Missing activation token
    array_push($errors, "Token has not found");
}

#If user click the activation link update the user information
$sql = "UPDATE users SET account_activation_hash = NULL 
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user['id']);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Account activated | Travel">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account activated | Travel</title>
    <?php include(ROOT_PATH.'/app/includes/auth-css.php');?>
</head>
<body>
    <div class="card-signin">
        <div class="card card-pd-signin h-auto mx-auto w-50">
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
                <h3 class="card-title card-title-signin">Verified Email Account</h3>
                <br />
                <div class="col-md-12 mb-2">
                    <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                </div>
                <p class="card-text">Your email account has been activated. You can now either go to sign in page now 
                    or close this page if you don't want to sign in yet, Thank you.
                </p>
            </div>  
            <div class="line-break-signin"></div>
            <div class="card-body link-signin">
                <p class="link-signin-acc">Create a new one?, <a href="<?php echo BASE_URL_LINKS.'/signup.php'?>" target="_self" class="card-link-signin">click here.</a></p>
                <p class="link-signin-acc">Forget your password?, <a href="<?php echo BASE_URL_LINKS.'/forgetpassword.php'?>" target="_self" class="card-link-signin">click here.</a></p>
                <p class="link-signin-acc">Take me to <a href="<?php echo BASE_URL_LINKS.'/signin.php'?>" target="_self" class="card-link-signin">sign in</a> page.</p>
            </div>
        </div>
    </div>
</body>
</html>