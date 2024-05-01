<?php 
include("path.php");
include(ROOT_PATH."/app/config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel | Home Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel</title>

    <!--Customized CSS Section-->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/css/skin.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/css/index.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/css/main.css'?>">

     <!--favicon logo-->
     <link rel="shortcut icon" href="<?php echo BASE_URL.'/asset/img/logo/travel.png'?>" type="image/x-icon">

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
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/vendor/Pagination/pagination.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/vendor/Pagination/pagination.less'?>">

</head>

<body>
    <!--Header here-->
    <?php include (ROOT_PATH . "/app/includes/header.php");?>
    <main>
        <!--=============== HOME ===============-->
        <section class="container section section__height" id="home">

            <!--Alert Message Success-->
            <?php include(ROOT_PATH."/app/helpers/messageAlert.php");?>
            <!--End of alert -->

            <div class="page-wrapper mx-auto h-100 w-100">
                <!--========= Post Slider Title =================-->
                <div class="container mx-auto my-3 py-3 h-100 post-slider">
                    <h3 class="card-title text-center">Trends Blog</h3>
                    <i class='bx bxs-left-arrow prev'></i>
                    <i class='bx bxs-right-arrow next'></i>

                    <!--================= Post Wrapper ====================-->
                    <div class="post-wrapper h-100">

                        <!--======= Post Content Card ==================-->

                        <div class="card card-content">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhKkw4-fakWFEGyhNp6BDcpB7mMtDR25wW2tisWYnCpY94h2zla9hpx4mJ_J9esSGIZVPmefrf_0cO9sGX97x0j4MvE64-6lFAZhV35dDMLh2PS6aikW2WxtmlRU0PMHJSd1GRYf7Y-HPI/s1600/mt-pinagbanderahan-bantakay-falls-05.jpg"
                             name="post-Thumbnail" alt="post-image" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title" style="text-align: justify;"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h6>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="./asset/img/logo/travel.png" alt="User_profile" class="rounded-circle border"
                                        width="32" height="32">
                                    </div>
                                    <h6 class="card-subtitle text-success flex-grow-1 ms-2">Saito Hiragi</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted">
                                    <i class='bx bx-calendar card-text'>March 24, 2024</i>
                                    &nbsp;  
                                    <i class='bx bx-show-alt card-text'>54</i>
                                </div>
                            </div>
                        </div>

                        <div class="card card-content">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Quezon_Provincial_Capitol_right_side_view_(Quezon_Avenue,_Lucena,_Quezon;_10-09-2022).jpg"
                             name="post-Thumbnail" alt="post-image" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title" style="text-align: justify;"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h6>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="./asset/img/logo/travel.png" alt="User_profile" class="rounded-circle border"
                                        width="32" height="32">
                                    </div>
                                    <h6 class="card-subtitle text-success flex-grow-1 ms-2">Saito Hiragi</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted">
                                    <i class='bx bx-calendar card-text'>March 24, 2024</i>
                                    &nbsp;  
                                    <i class='bx bx-show-alt card-text'>54</i>
                                </div>
                            </div>
                        </div>

                        <div class="card card-content">
                            <img src="https://img.freepik.com/premium-photo/cyber-security-concept-with-hacker-working-computer_438099-32878.jpg?size=626&ext=jpg"
                             name="post-Thumbnail" alt="post-image" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title" style="text-align: justify;"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h6>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="./asset/img/logo/travel.png" alt="User_profile" class="rounded-circle border"
                                        width="32" height="32">
                                    </div>
                                    <h6 class="card-subtitle text-success flex-grow-1 ms-2">Saito Hiragi</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted">
                                    <i class='bx bx-calendar card-text'>March 24, 2024</i>
                                    &nbsp;  
                                    <i class='bx bx-show-alt card-text'>54</i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card card-content">
                            <img src="https://media.istockphoto.com/id/1284549418/photo/hiker-on-top-of-the-mountain-enjoying-sunset.jpg?s=612x612&w=0&k=20&c=fPyABeBn3AbYbZptu60KrVFSmVNTLbr7pngvoSOyPiA=" 
                            name="post-Thumbnail" alt="post-image" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title" style="text-align: justify;"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h6>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="./asset/img/logo/travel.png" alt="User_profile" class="rounded-circle border"
                                        width="32" height="32">
                                    </div>
                                    <h6 class="card-subtitle text-success flex-grow-1 ms-2">Saito Hiragi</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted">
                                    <i class='bx bx-calendar card-text'>March 24, 2024</i>
                                    &nbsp;  
                                    <i class='bx bx-show-alt card-text'>54</i>
                                </div>
                            </div>
                        </div>

                        <div class="card card-content">
                            <img src="https://www.travelandleisure.com/thmb/S5TowscUMSg-hcN6O8BlJFOvF4c=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/inside-japan-tours-07-TOUROPWB22-271115ce12f8447892f2d8094f7edefe.jpg" 
                            name="post-Thumbnail" alt="post-image" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title" style="text-align: justify;"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h6>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="./asset/img/logo/travel.png" alt="User_profile" class="rounded-circle border"
                                        width="32" height="32">
                                    </div>
                                    <h6 class="card-subtitle text-success flex-grow-1 ms-2">Saito Hiragi</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted">
                                    <i class='bx bx-calendar card-text'>March 24, 2024</i>
                                    &nbsp;  
                                    <i class='bx bx-show-alt card-text'>54</i>
                                </div>
                            </div>
                        </div>
                        <!--============= End of Post Content Card ===================-->
                    </div>
                </div>

                <!--=============== Start Of main Content ==============================-->
                <div class="container-fluid clearfix">
                    
                    <!--=========== Main Post container ===================-->
                    <div class="row mt-5">
                        <!--============ Start of Main content ================-->
                        <div class="col-md-8 col-sm-8 col-xl-8 col-xxl-8">
                            <h4 class="card-title">-Recent Blog Post</h4>
                            
                            <!--========= Post Content Start Here =================-->
                            <div class="card-group d-block pagination paginationjs paginationjs-theme-green paginationjs-small " id="pagination">
                                <!--======= Card Content =============-->
                                <div class="card clearfix w-100 h-auto mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Quezon_Provincial_Capitol_right_side_view_(Quezon_Avenue,_Lucena,_Quezon;_10-09-2022).jpg" 
                                            alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header d-inline-flex w-100 align-self-center">
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="24">
                                                <h6 class="card-text ms-2">Saito Hiragi</h6>
                                                <p class="card-text flex-grow-1 ms-2"><small class="text-body-secondary"><i class='bx bx-calendar'>March 24, 2024</i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h5>
                                                <p class="card-text mb-2" name="postDescriptions" style="text-align: justify;">The content here tackle about the basic SQL. Things for only begginners to understand the basic fundamental of SQL. 
                                                    The modules here provide a table content of what you learn and some documents that easy to understand for begginners only.
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL.'/single-page.php'?>" class="btn read-more">Read more</a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card clearfix w-100 h-auto mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhKkw4-fakWFEGyhNp6BDcpB7mMtDR25wW2tisWYnCpY94h2zla9hpx4mJ_J9esSGIZVPmefrf_0cO9sGX97x0j4MvE64-6lFAZhV35dDMLh2PS6aikW2WxtmlRU0PMHJSd1GRYf7Y-HPI/s1600/mt-pinagbanderahan-bantakay-falls-05.jpg" 
                                            alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header d-inline-flex w-100 align-self-center">
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="24">
                                                <h6 class="card-text ms-2">Saito Hiragi</h6>
                                                <p class="card-text flex-grow-1 ms-2"><small class="text-body-secondary"><i class='bx bx-calendar'>March 24, 2024</i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h5>
                                                <p class="card-text mb-2" name="postDescriptions" style="text-align: justify;">The content here tackle about the basic SQL. Things for only begginners to understand the basic fundamental of SQL. 
                                                    The modules here provide a table content of what you learn and some documents that easy to understand for begginners only.
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL.'/single-page.php'?>" class="btn read-more">Read more</a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card clearfix w-100 h-auto mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="https://jangotshome.files.wordpress.com/2018/11/cuasay.jpg?w=1100" 
                                            alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header d-inline-flex w-100 align-self-center">
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="24">
                                                <h6 class="card-text ms-2">Saito Hiragi</h6>
                                                <p class="card-text flex-grow-1 ms-2"><small class="text-body-secondary"><i class='bx bx-calendar'>March 24, 2024</i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h5>
                                                <p class="card-text mb-2" name="postDescriptions" style="text-align: justify;">The content here tackle about the basic SQL. Things for only begginners to understand the basic fundamental of SQL. 
                                                    The modules here provide a table content of what you learn and some documents that easy to understand for begginners only.
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL.'/single-page.php'?>" class="btn read-more">Read more</a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card clearfix w-100 h-auto mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="https://i0.wp.com/touristjourney.com/wp-content/uploads/2021/04/Punta-Laguna-Nature-Reserve-Travel.jpg?fit=2500,1872&ssl=1" 
                                            alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header d-inline-flex w-100 align-self-center">
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="24">
                                                <h6 class="card-text ms-2">Saito Hiragi</h6>
                                                <p class="card-text flex-grow-1 ms-2"><small class="text-body-secondary"><i class='bx bx-calendar'>March 24, 2024</i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h5>
                                                <p class="card-text mb-2" name="postDescriptions" style="text-align: justify;">The content here tackle about the basic SQL. Things for only begginners to understand the basic fundamental of SQL. 
                                                    The modules here provide a table content of what you learn and some documents that easy to understand for begginners only.
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL.'/single-page.php'?>" class="btn read-more">Read more</a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card clearfix w-100 h-auto mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="https://gttp.imgix.net/320664/x/0/tourist-stands-on-kalanggaman-island-s-sandbar.jpg?auto=compress,format&ch=Width,DPR&dpr=1&ixlib=php-3.3.0&auto=format,compress&fit=crop&h=undefined" 
                                            alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header d-inline-flex w-100 align-self-center">
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="24">
                                                <h6 class="card-text ms-2">Saito Hiragi</h6>
                                                <p class="card-text flex-grow-1 ms-2"><small class="text-body-secondary"><i class='bx bx-calendar'>March 24, 2024</i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h5>
                                                <p class="card-text mb-2" name="postDescriptions" style="text-align: justify;">The content here tackle about the basic SQL. Things for only begginners to understand the basic fundamental of SQL. 
                                                    The modules here provide a table content of what you learn and some documents that easy to understand for begginners only.
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL.'/single-page.php'?>" class="btn read-more">Read more</a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card clearfix w-100 h-auto mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="https://www.tutorialspoint.com/cplusplus/images/cpp-mini-logo.jpg" 
                                            alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header d-inline-flex w-100 align-self-center">
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="24">
                                                <h6 class="card-text ms-2">Saito Hiragi</h6>
                                                <p class="card-text flex-grow-1 ms-2"><small class="text-body-secondary"><i class='bx bx-calendar'>March 24, 2024</i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h5>
                                                <p class="card-text mb-2" name="postDescriptions" style="text-align: justify;">The content here tackle about the basic SQL. Things for only begginners to understand the basic fundamental of SQL. 
                                                    The modules here provide a table content of what you learn and some documents that easy to understand for begginners only.
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL.'/single-page.php'?>" class="btn read-more">Read more</a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card clearfix w-100 h-auto mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="https://t3.ftcdn.net/jpg/04/72/70/84/360_F_472708496_jWIQVKy4u5hbXCfph6uJcEZ7h2fWzwnk.jpg" 
                                            alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header d-inline-flex w-100 align-self-center">
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="24">
                                                <h6 class="card-text ms-2">Saito Hiragi</h6>
                                                <p class="card-text flex-grow-1 ms-2"><small class="text-body-secondary"><i class='bx bx-calendar'>March 24, 2024</i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h5>
                                                <p class="card-text mb-2" name="postDescriptions" style="text-align: justify;">The content here tackle about the basic SQL. Things for only begginners to understand the basic fundamental of SQL. 
                                                    The modules here provide a table content of what you learn and some documents that easy to understand for begginners only.
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL.'/single-page.php'?>" class="btn read-more">Read more</a>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--========= End of Card Content =================-->
                            </div>
                            <!--========= End of Post Content ===========-->
                        </div>
                        <!--========== End of Main Content =================-->

                        <!--=========== Start of Sidebar Content ===============-->
                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4 mt-5" id="category">
                            <!--Search sidebar Section start here-->
                            <div class="card border-success">
                                <h4 class="card-header text-success">Search</h4>
                                <div class="card-body">
                                    <form action="#" method="post" name="search" class="row gx-2 gy-2">
                                        <div class="mb-1 col-md-7 col-sm-9 col-xl-9 col-xxl-9 col-lg-9 form-group">
                                            <input type="search" name="search" class="form-control border-success-subtle" aria-label="search" placeholder="Search..."/>
                                        </div>
                                        <div class="mb-1 col-md-3 col-sm-3 col-xl-3 col-xxl-3 col-lg-3 form-group ">
                                            <button type="submit" name="submitSearch" class="btn read-more">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--Search sidebar Section End here-->

                            <!--Categories sidebar section start here-->
                            <div class="card mt-3 border-success">
                                <h4 class="card-header bg-transparent text-success">Categories</h4>
                                <div class="card-body border-success">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-group-flush"><a href="#">Agdangan</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Atimonan</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Candelaria</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Dolores</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Lucban</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Luciana</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Padre Borgos</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Pagbilao</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Sariaya</a></li>
                                        <li class="list-group-item list-group-flush"><a href="#">Tayabas</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=========== End of Main Post Container ====================-->
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