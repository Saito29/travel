<?php 
include("../path.php"); 
include(ROOT_PATH.'/app/controllers/auth/chPassword.php');

#query the user id
$sql = "SELECT * from users WHERE id = ?";
$stmt = $conn->prepare($sql); //prepare the query
$stmt->bind_param("i", $_GET['SNID']); // bind the user session id in the url
$stmt->execute(); //execute the query
$result = $stmt->get_result(); // get the result
if($result->num_rows === 1){ // if the user id found
    $row = $result->fetch_assoc(); // fetch the user session id
    $user_id = $row['id']; // id in the table row
    $username = $row['username']; // username in the table row
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Change Password | Travel">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | Travel</title>
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
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_id)?>">
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password" for="password">New password</label><br>
                            <input type="password" class="input-fgp password" id="password" name="password" id="password" value="<?php echo htmlspecialchars($password)?>" placeholder="Enter new password"><br>
                            <i class='bx bx-low-vision eye-icon toggle-password'></i><br>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password" for="cfpassword">Re-enter password</label><br>
                            <input type="password" class="input-fgp rtPassword" id="cfpassword" name="cfpassword" id="cfpassword" value="<?php echo htmlspecialchars($cfpassword)?>" placeholder="Re-enter new password"><br>
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