<?php include("path.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Basic Fundamental SQL Tutorial">
    <meta name="author" content="Saito">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Fundamental SQL tutorial</title>

    <!--Customized CSS Section-->
    <link rel="stylesheet" href="./asset/css/skin.css">
    <link rel="stylesheet" href="./asset/css/main.css">
    <link rel="stylesheet" href="./asset/css/index.css">

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

    <!--Slick JQuery Min CSS exception
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    -->

    <!--Pagination JS-->
    <link rel="stylesheet" href="./asset/vendor/Pagination/pagination.css">

    <!--Summernote BS4-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

</head>
<body>
    <!--Header here-->
    <?php
        include (ROOT_PATH . "/app/includes/nav.php");
    ?>

    <main>
        <!--Body-->
        <section class="container-fluid clearfix section section__height mb-3">

            <!--Content Page Details-->
            <div class="wrapper">
                <div class="row d-flex flex-grow-1">
                    <!--Main Content-->
                    <div class="container-fluid mt-3 col-md-8 clearfix h-100 mh-100">
                        <div class="card h-100 w-100 border-0">
                            <div class="card-header d-flex gap-1">
                                <p class="text-primary">Category: Programming Related</p>
                                |
                                <p class="text-info">Sub-categories: Tutorial</p>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Basic Fundamental of MySQL</h3>
                                <p class="card-text" style="text-align: justify;">A complete Tutorial for learning a basic fundamental of SQL. This blog will help
                                    you to know the basic of sql and how to use and what is role in back end.
                                </p>
                                <div class="d-flex justify-content-between">
                                    <p class="text-muted">Posted: March 20, 2024</p>
                                    <p class="text-muted"><i class='bx bx-show-alt'></i>201</p>
                                </div>
                                <div class="card-img-top d-flex align-items-center justify-content-center mb-3">
                                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhKkw4-fakWFEGyhNp6BDcpB7mMtDR25wW2tisWYnCpY94h2zla9hpx4mJ_J9esSGIZVPmefrf_0cO9sGX97x0j4MvE64-6lFAZhV35dDMLh2PS6aikW2WxtmlRU0PMHJSd1GRYf7Y-HPI/s1600/mt-pinagbanderahan-bantakay-falls-05.jpg" alt="Thumbnail_post" class=" w-75 h-100 object-fit-md-cover">
                                </div>
                                <div class="card-text h-100 w-100">
                                    <p>This chapter we will now tackle about Basic Fundamental of MySQL</p>
                                    <p>1. What is SQL?</p>
                                    <p>2. What do i need to know about SQl</p>
                                    <p>3. Entity Relationship Diagram</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id sequi ullam, 
                                    culpa cupiditate asperiores at consequuntur minus cumque doloremque illo! Ut consequuntur voluptates fugit vitae atque? 
                                    Nam quasi assumenda reiciendis.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!--End of Main content card-->

                        <!--Start Of comments Section here-->
                        <div class="row mt-3" id="comments">
                            <div class="col-md-8 container-fluid clearfix w-100 h-100">
                                <div class="card col-md-8 col-xl-8 col-sm-8 col-xxl-8 w-100 h-100 border-0">
                                    <div class="card-header text-primary fw-bold fs-5 bg-body-tertiary">Comments</div>
                                    <div class="card-body">
                                        <!--Comments required to identify user-->
                                        <form action="#" method="post" name="Comment" class="row gx-2 gy-2 p-2" autocomplete="on" enctype="application/x-www-form-urlencoded">
                                            <div class="mb-1 col-md-4 form-group w-50">
                                                <label for="usName" class="form-label">Username:</label>
                                                <input type="text" name="usName" placeholder="Username" class="form-control" required>
                                                <p class="text-secondary">(required)</p>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group w-50">
                                                <label for="emailAdd" class="form-label">Email:</label>
                                                <input type="email" name="emailAdd" placeholder="Email:" class="form-control">
                                                <p class="text-secondary">(optional)</p>
                                            </div>
                                            <div class="mb-1 col-md-8 form-group w-100">
                                                <label for="comments" class="form-label">Comment:</label>
                                                <textarea name="comment" id="summernote" class="form-control" rows="5" required></textarea>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <button type="submit" name="submitComment" class="btn read-more">Post</button>
                                                <button type="reset" name="reset" class="btn read-more">Cancel</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!--Post comment here-->
                                    <div class="row mt-5 mb-3 my-5 py-5 px-4 col-md-8 w-100 h-100">
                                        <div class="d-flex justify-content-center">
                                            <div class="card w-100 h-100 bg-transparent border-0">
                                                <div class="card-body p-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 22 24" style="fill: rgba(0, 0, 0, 1);">
                                                        <path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 
                                                        3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z">
                                                        </path>
                                                    </svg>
                                                    <div class="card-text" style="text-align: justify;">
                                                        <h5 class="fw-bold text-primary">Saito</h5>
                                                        <p class="small text-muted">March 24, 2024</p>
                                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                        A, voluptatibus commodi repudiandae maxime nulla magnam reiciendis ratione nesciunt possimus beatae inventore doloremque 
                                                        animi minus temporibus molestiae deleniti adipisci suscipit modi!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--ENd of Main content section-->

                    <!--Sidebar popular Content-->
                    <div class="container-fluid col-md-4 mt-3 clearfix">
                        <!--Google Widgets -->
                        <div class="card mb-3 w-auto">
                            <h5 class="card-header text-secondary">Google Widgets</h5>
                            <div class="card-body">
                                <iframe src="https://www.google.com/maps/embed?pb=!4v1713517214188!6m8!1m7!1sCAoSLEFGMVFpcE44c2tibXJCRnRoeHpJdnJoY1VrSTBhbTZyemhFVzFQRUpoLW5y!2m2!1d13.99581128727167!2d121.8106086619177!3f318.0102210969411!4f6.2145195050297275!5f0.7820865974627469" width="370" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <!--End o google widgets-->
                        <!--Post content-->
                        <div class="card">
                            <h5 class="card-header">Popular Post</h5>
                            <div class="card-body">
                                <div class="card-img-top">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Quezon_Provincial_Capitol_right_side_view_(Quezon_Avenue,_Lucena,_Quezon;_10-09-2022).jpg" alt="Thumbnail_post">
                                </div>
                                <a class="card-title" href="<?php echo BASE_URL.'/single-page.php'?>"><h5>Lucena Park</h5></a>
                            </div>
                            <div class="card-body">
                                <div class="card-img-top">
                                    <img src="https://jangotshome.files.wordpress.com/2018/11/cuasay.jpg?w=1100" alt="Thumbnail_post">
                                </div>
                                <a class="card-title" href="<?php echo BASE_URL.'/single-page.php'?>"><h5>Pinagbanderahan Atimonan, Quezon</h5></a>
                            </div>
                            <div class="card-body">
                                <div class="card-img-top">
                                    <img src="https://www.tutorialspoint.com/cplusplus/images/cpp-mini-logo.jpg" alt="Thumbnail_post">
                                </div>
                                <a class="card-title" href="<?php echo BASE_URL.'/single-page.php'?>"><h5>C++ Programming Tutorials</h5></a>
                            </div>
                        </div>
                        
                        <!--============= Sidebar Category ==============-->
                        <div class="card mt-3 clearfix" id="category">
                            <h5 class="card-header">Recent Blog Post</h5>
                            <ul class="list-group list-group-flush px-2 py-3">
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">How to Create a connection for database</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">Basic Fundamentals of C++</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">Educational gaming  for kids</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">Effect of games on students learning progress</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">How to build a website using WordPress</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">Hiking in Pinagbanderahan Atimonan, Quezon</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">Beach Resort in Atimonan, Quezon</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">Lucena Municipality Capitolyo</a></li>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php'?>" class="text-success px-2">Lucena Park Atimonan, Quezon</a></li>
                            </ul>
                        </div>
                        <!--============= End of Sidebar category ================-->
                    </div>
                    <!--End of sidebar popular content section-->
                </div>
            </div>
        </section>
    <!--Footer-->
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

<!--summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
      $('#summernote').summernote({
        placeholder: 'Comment down here',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['codeview', 'help']]
        ]
      });
    </script>

<!--============== Customized JS ======================-->
<script src="./asset/js/script.js"></script>

</body>
</html>