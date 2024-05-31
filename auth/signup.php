<?php include("../path.php"); ?>
<?php include(ROOT_PATH."/app/controllers/user.php");

#if session already login can't access the signup page again
if(isset($_SESSION['id'])){
    $_SESSION['messages'] = "You're already created an account.";
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
    <meta name="description" content="Signup | Travel">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Travel</title>
    <?php include(ROOT_PATH.'/app/includes/auth-css.php');?>
</head>
<body>
    <div class="card-signup">
        <div class="card card-pd-signup h-auto">
            <div class="logo-content-signup">
                <?php 
                    $settings_query = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
                ?>
                <?php while($setting = mysqli_fetch_assoc($settings_query)):?>
                <img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadLogo/'?><?php echo htmlentities($setting['logo'])?>" alt="Logo" width="40px" height="40px">
                <?php endwhile;?>
                <h2 class="txt-signup">Travel</h2>
            </div>
            <div class="card-body card-body-signup">
                <h3 class="card-title card-title-signup">Create an account</h3>
                <p class="text-info-emphasis" style="text-align: justify"><span class="text-warning">Note:</span> Submit your username and email address before submitting the other information of you to validate
                    your account.</p>
                </p>
                <div class="row gy-4 gx-3">
                    <form action="signup.php" method="post"  autocomplete="on" class="form-signup h-auto" enctype="multipart/form-data">
                        <!--Alert-->
                        <?php include(ROOT_PATH."/app/helpers/formAlert.php");?>
                        <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
                        <!--End of Alert-->
                        <div class="col-md-6 col-sm-6">
                            <label for="firstName" class="signup">First Name <span class="colon">*</span></label><br>
                            <input type="text" class="input-signup" id="fname" name="firstName" value="<?php echo htmlspecialchars($firstName)?>" placeholder="First Name"><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="lastName" class="signup">Last Name <span class="colon">*</span></label><br>
                            <input type="text" class="input-signup" id="lname" name="lastName" value="<?php echo htmlspecialchars($lastName)?>" placeholder="Last Name"><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="username" class="signup">Username <span class="colon">*</span></label><br>
                            <input type="text" class="input-signup" id="username" name="username" value="<?php echo htmlspecialchars($username)?>" placeholder="Username"><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="email" class="signup">Email address <span class="colon">*</span></label><br>
                            <input type="email" class="input-signup" id="email" name="email" value="<?php echo htmlspecialchars($email)?>" placeholder="Email Address"><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="password" class="signup">Password <span class="colon">*</span></label><br>
                            <input type="password" class="input-signup password" name="password" value="<?php echo htmlspecialchars($password)?>" placeholder="Password"><br>
                            <i class='bx bx-low-vision toggle-icon toggle-password'></i><br>
                            <p class="signup-ps">Password must be at least minimum of 8 characters,
                                 ['one letter', 'one number'].</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="profileImage" class="form-label">Profile Image:</label>
                            <img src="<?php echo BASE_URL.'/asset/img/profile/placeholder.webp'?>" onclick="imgClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" height="70" width="70">
                            <input type="file" class="d-none" name="profileImage" onchange="displayImg(this)" id="profileImage" on value="<?php echo $profileImage?>">
                            <p class="signup-ps">Profile Image should at least 10mb</p>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                            <label class="form-label">Select user type:</label>
                            <select name="role" class="form-select form-select-sm">
                                <?php if(!isset($_POST['role'])):?>
                                <option value="<?php echo htmlspecialchars($role);?>" selected>Choose type of user</option>
                                <?php else:?>
                                <option value="<?php echo htmlspecialchars($role);?>" selected>User type: <?php echo htmlspecialchars($role);?></option>
                                <?php endif;?>
                                <option value="editor">Editor User</option>
                                <option value="user">Guest User</option>
                            </select>
                        </div>
                        <div class="mb-1 col-sm-5 mb-3 px-2">
                            <label for="created_at" class="form-label">Date Created:</label>
                            <input type="datetime-local" class="form-control form-control-sm" name="created_at" value="<?php echo htmlspecialchars($created_at)?>">
                        </div>
                        <div class="col-md-8 col-md-8">
                            <button type="submit" name="register-btn" id="submit-signup" class="submit-signup">Create account</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="line-break-signup"></div>
            <div class="card-body acc-details-signup">
                <p class="acc-links-signup">Already have an account?, <a href="<?php echo BASE_URL_LINKS.'/signin.php'?>" target="_self" class="link-acc-signup">Sign in here.</a></p>
            </div>
        </div>
    </div>
    <!--Customized JS-->
    <script src="<?php echo BASE_URL.'/asset/js/togglePassword.js'?>"></script>
    <script src="<?php echo BASE_URL.'/asset/js/cgImage.js'?>"></script>
</body>
</html>