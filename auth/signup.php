<?php include("../path.php"); ?>
<?php include(ROOT_PATH."/app/controllers/user.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel | Register Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Signup Page</title>

    <!--Customized CSS-->
    <link rel="stylesheet" href="../asset/css/auth.css">

    <!--favicon logo-->
    <link rel="shortcut icon" href="../asset/img/logo/travel.png" type="image/x-icon">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Box Icon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--Bootsrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <div class="card-signup">
        <div class="card card-pd-signup h-auto">
            <div class="logo-content-signup">
                <img src="../asset/img/logo/travel.png" alt="Travel_Logo">
                <h2 class="txt-signup">Travel</h2>
            </div>
            <div class="card-body card-body-signup">
                <h3 class="card-title card-title-signup">Create an account</h3>
                <p class="text-info-emphasis" style="text-align: justify"><span class="text-warning">Note:</span> Submit your username and email address before submitting the other information of you to validate
                    your account.</p>
                </p>
                <div class="row gy-4 gx-3">
                    <form action="signup.php" method="post" autocomplete="on" class="form-signup h-auto" enctype="multipart/form-data">
                        <!--Alert-->
                        <?php include(ROOT_PATH."/app/helpers/formAlert.php");?>
                        <!--End of Alert-->
                        <div class="col-md-6 col-sm-6">
                            <label for="firstName" class="signup">First Name <span class="colon">*</span></label><br>
                            <input type="text" class="input-signup" id="fname" name="firstName" value="<?php echo $firstName?>" placeholder="Enter your first name" ><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="lastName" class="signup">Last Name <span class="colon">*</span></label><br>
                            <input type="text" class="input-signup" id="lname" name="lastName" value="<?php echo $lastName?>" placeholder="Enter your last name"><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="username" class="signup">Username <span class="colon">*</span></label><br>
                            <input type="text" class="input-signup" id="username" name="username" value="<?php echo $username?>" placeholder="Enter username" ><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="email" class="signup">Email address <span class="colon">*</span></label><br>
                            <input type="email" class="input-signup" id="email" name="email" value="<?php echo $email?>" placeholder="Enter email address" ><br>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="password" class="signup">Password <span class="colon">*</span></label><br>
                            <input type="password" class="input-signup password" minlength="8" name="password" value="<?php echo $password?>" placeholder="Enter password" ><br>
                            <i class='bx bx-low-vision toggle-icon toggle-password'></i><br>
                            <p class="signup-ps">Password must be at least minimum of 8 characters.</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label for="profileImage" class="form-label">Profile Image:</label>
                            <img src="<?php echo BASE_URL.'/asset/img/profile/placeholder.webp'?>" onclick="imgClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" width="70">
                            <input type="file" class="d-none" name="profileImage" onchange="displayImg(this)" id="profileImage" on value="<?php echo $profileImage?>">
                            <p class="signup-ps">Profile Image should at least 10mb</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <select name="" class="form-select form-select-sm">
                                <option selected>Choose type of user</option>
                                <option name="role" value="3">Editor User</option>
                                <option name="role" value="0">Guest User</option>
                            </select>
                            <input type="hidden" class="input-signup" id="role" name="role" value="<?php echo $role?>"><br>
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
    <script src="../asset/js/togglePassword.js"></script>
    <script src="../asset/js/cgImage.js"></script>
</body>
</html>