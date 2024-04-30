<?php include("../path.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel | Signin Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Signin Page</title>

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
    <div class="card-signin">
        <div class="card card-pd-signin h-auto">
            <div class="logo-content-signin">
                <img src="../asset/img/logo/travel.png" alt="travel_Logo">
                <h2 class="txt-signin">Travel</span>
            </div>
            <div class="card-body card-body-signin">
                <h3 class="card-title card-title-signin">Login to your account</h3>
                <div class="row gy-3">
                    <form action="#" method="post" autocomplete="on" class="form-signin" enctype="application/x-www-form-urlencoded">
                        <div class="col-xxl-6 col-md-6">
                            <label for="username" class="signin">Username<span class="colon">*</span></label>
                            <input type="email" class="input-signin" id="username" name="username" placeholder="Username | Email address" required><br>
                        </div>
                        <div class="col-xxl-6 col-md-6">
                            <label for="password" class="signin">Password <span class="colon">*</span></label>
                            <input type="password" name="password" minlength="8" class="input-signin password" placeholder="Enter your password" required>
                            <i class='bx bx-low-vision field-icon toggle-password'></i><br>
                        </div>
                        <div class="col-xxl-8 col-md-8">
                            <button type="button" id="submit-signin" name="button-fgp">Login</button>
                        </div>
                    </form>
                </div>
            </div>  
            <div class="line-break-signin"></div>
            <div class="card-body link-signin">
                <p class="link-signin-acc">Don't have a account?, <a href="<?php echo BASE_URL_LINKS.'/signup.php'?>" target="_self" class="card-link-signin">Register here.</a></p>
                <p class="link-signin-acc">Forget your password, <a href="<?php echo BASE_URL_LINKS.'/forgetpassword.php'?>" target="_self" class="card-link-signin">click here.</a></p>
                <p class="link-signin-acc">Take me back to<a href="<?php echo BASE_URL.'/index.php'?>" target="_self" class="card-link-signin"> Homepage.</a></p>

            </div>
        </div>
    </div>
    <!--Customized Js-->
    <script src="../asset/js/togglePassword.js"></script>
</body>
</html>