<?php include("path.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel | Terms & Conditions Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Terms & Conditions</title>

    <!--Customized CSS Section-->
    <link rel="stylesheet" href="./asset/css/skin.css">
    <link rel="stylesheet" href="./asset/css/index.css">
    <link rel="stylesheet" href="./asset/css/main.css">

     <!--favicon logo-->
     <link rel="shortcut icon" href="./asset/img/logo/travel.png" type="image/x-icon">

     <!--Google Fonts-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 
     <!--Box Icon-->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 
     <!--Bootsrap 5 exception-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--Pagination JS-->
    <link rel="stylesheet" href="./asset/vendor/Pagination/pagination.css">
    <link rel="stylesheet" href="./asset/vendor/Pagination/pagination.less">

</head>

<body>
    <!--Header-->
    <?php
        include (ROOT_PATH . "/app/includes/nav2.php");
    ?>

    <main>
        <!--=============== HOME ===============-->
        <section class="container section section__height" id="home">
            <!--============ Page Wrapper =============-->
            <div class="d-flex justify-content-between fs-6 mx-3 py-4" aria-label="breadcrumb">                
                <ol class="breadcrumb p-0 m-0 ">
                    <li class="breadcrumb-item text-primary"><a href="<?php echo BASE_URL.'/index.php'?>">Home</a></li>
                    <li class="breadcrumb-item active text-primary-emphasis" aria-current="page">Terms & Conditions</li>
                </ol>
            </div>
            <div class="card my-3 py-2 px-2 mx-auto border-0">
                <h4 class="card-header bg-transparent border-success-subtle">Terms & Conditions</h4>
                <div class="card-body">
                    <div class="card-text" name="aboutUs-details" align="justify">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Vitae cum voluptatibus porro quibusdam accusantium tempora impedit atque id laudantium consequatur, debitis, repudiandae corrupti maxime delectus provident animi. 
                        Laudantium, vero autem?</p>
                        <h5>Session Data</h5>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Laboriosam, aspernatur dolore accusantium sint rerum voluptates culpa molestiae at soluta. 
                        Dolor, quae modi reprehenderit rerum itaque aliquam! Dignissimos recusandae nemo quisquam.</p>
                        <h5>Privacy Policy</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Cum voluptate eos tenetur suscipit mollitia laudantium id nam velit, tempore saepe voluptatem perspiciatis quod nemo dignissimos. 
                        Temporibus est quasi quis aliquam.</p>
                        <h5>Account Security</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Labore, ullam temporibus ut corrupti incidunt unde quaerat quo mollitia nihil. 
                        Corporis voluptatum non ullam dolor fuga dignissimos, eos soluta in repellat.</p>
                    </div>
                </div>
            </div>
        </section>

      <!--Footer here-->
    <?php
        include (ROOT_PATH . "/app/includes/footer.php");
     ?>
     
</main>

  <!--=============== MAIN JS ===============-->
  <script src="./asset/js/main.js"></script>

<!--================= JQuery Min js =================-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!--=============== Pagination JS ================-->
<script src="./asset/vendor/Pagination/pagination.js"></script>
<script src="./asset/vendor/Pagination/pagination.min.js"></script>

<!--=============== Slick JS jquery ===============-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--============== Customized JS ======================-->
<script src="./asset/js/script.js"></script>

</body>
</html>