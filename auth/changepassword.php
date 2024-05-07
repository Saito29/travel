<?php 
include("../path.php");
include(ROOT_PATH.'/app/config/db.php'); 

#if session not login send header to homepage
if(!isset($_SESSION['id'])){
    header('location: '.BASE_URL.'/index.php');
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

    <!--Customized CSS-->
    <link rel="stylesheet" href="../asset/css/auth.css">

    <!--Favicon-->
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
    <div class="card-fgp">
        <div class="card card-pd-fgp">
            <div class="logo-content-fgp">
                <img src="../asset/img/logo/travel.png" alt="travel_logo">
                <h2 class="txt-fgp">Travel</h2>
            </div>
            <div class="card-body card-body-fgp">
                <div class="card-content-fgp">
                    <h3 class="card-title card-title-fgp">Change password</h3>
                    <p class="card-text card-text-fgp">Enter your email adress or Username to update password, password must at least minimum of 8 characters</p>
                </div>
                <div class="row gy-4">
                    <form action="/#" method="post" autocomplete="off" class="form-fgp" enctype="application/x-www-form-urlencoded">
                        <div class="col-xxl-4 col-md-6">
                            <label for="email-fgp" class="forget-password">Usename | Email</label><br>
                            <input type="email" class="input-fgp" name="Username" id="email-fgp" placeholder="Enter Username | Email" required><br>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password">New password</label><br>
                            <input type="password" class="input-fgp password" name="password" minlength="8" placeholder="Enter new password" required><br>
                            <i class='bx bx-low-vision eye-icon toggle-password'></i><br>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <label class="forget-password">Re-enter password</label><br>
                            <input type="password" class="input-fgp rtPassword" name="password" minlength="8" placeholder="Re-enter new password" required><br>
                            <i class='bx bx-low-vision eye-icon togglePassword'></i><br>
                        </div>
                        <div class="col-xxl-8 col-md-8">
                            <button type="submit" id="submit-fgp" name="button-fgp"><i class='bx bx-envelope icon'></i>Update password</button>
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
    <script src="../asset/js/togglePassword.js"></script>
</body>
</html>