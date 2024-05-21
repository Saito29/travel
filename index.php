<?php 
include("path.php");
include(ROOT_PATH."/app/controllers/category.php");

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

    <?php include(ROOT_PATH.'/app/includes/css.php')?>

</head>

<body>
    <!--Header here-->
    <?php include (ROOT_PATH."/app/includes/header.php");?>
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
                                <h6 class="card-title fs-6" style="text-align: justify;"><a href="<?php echo BASE_URL.'/single-page.php'?>">Basic Fundamentals of SQL Tutorial Tagalog Full course with source code and full documentation for begginners</a></h6>
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
                                                <img src="./asset/img/logo/travel.png" alt="author-profile" class="rounded-circle img-fluid" width="32" height="32">
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
                                    <?php 
                                        $category_query = mysqli_query($conn, 'SELECT * FROM category WHERE Is_Active = 1 ORDER BY categName ASC');  
                                    ?>
                                    <?php while($categories = mysqli_fetch_array($category_query)):?>
                                        <li class="list-group-item list-group-flush"><a href="#"><?php echo htmlentities($categories['categName']);?></a></li>
                                    <?php endwhile;?>
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
<?php include(ROOT_PATH.'/app/includes/scripts.php');?>
</body>
</html>