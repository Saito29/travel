<?php 
include("path.php");
include(ROOT_PATH."/app/config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Basic Fundamental SQL Tutorial">
    <meta name="author" content="Saito">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Fundamental SQL tutorial</title>

    <?php include(ROOT_PATH.'/app/includes/sg-css.php');?>

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
                        <div class="card h-auto w-100 border-0">
                            <div class="card-header bg-transparent border-success d-flex gap-1">
                                <p class="card-text text-primary">Category: Programming Related</p>
                                |
                                <p class="card-text text-info">Sub-categories: Tutorial</p>
                            </div>
                            <div class="card-body">
                                <div class="card border-0">
                                    <h5 class="card-title">Basic Fundamental of MySQL</h5>
                                    <div class="d-flex justify-content-between px-2">
                                            <p class="text-muted">Posted: March 20, 2024</p>
                                            <p class="text-muted"><i class='bx bx-show-alt'></i>201</p>
                                        </div>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: justify;">A complete Tutorial for learning a basic fundamental of SQL. This blog will help
                                            you to know the basic of sql and how to use and what is role in back end.
                                        </p>
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
                            </div>
                        </div>
                        
                        <!--End of Main content card-->

                        <!--Start Of comments Section here-->
                        <div class="row mt-3" id="comments">
                            <div class="col-md-8 container-fluid clearfix w-100 h-100">
                                <div class="card col-md-8 col-xl-8 col-sm-8 col-xxl-8 w-100 h-100 border-0">
                                    <div class="card-header bg-transparent border-success text-secondary fw-bold fs-5">Comments</div>
                                    <div class="card-body">
                                        <?php if(!isset($_SESSION['id'], $_SESSION['username'], $_SESSION['email'])):?>
                                        <!--Comments required to identify user-->
                                        <form action="#" method="post" name="Comment" class="row gx-2 gy-2 p-2" autocomplete="on" enctype="application/x-www-form-urlencoded">
                                            <div class="mb-1 col-md-4 form-group w-50">
                                                <label for="usName" class="form-label">Username:</label>
                                                <input type="text" name="usName" placeholder="Username" value="" class="form-control" required>
                                                <p class="text-success">(required)</p>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group w-50">
                                                <label for="emailAdd" class="form-label">Email:</label>
                                                <input type="email" name="emailAdd" placeholder="Email:" value="" class="form-control">
                                                <p class="text-warning-emphasis">(optional)</p>
                                            </div>
                                            <div class="mb-1 col-md-8 form-group w-100">
                                                <label for="comments" class="form-label">Comment:</label>
                                                <textarea name="comment" id="summernote" class="form-control" required></textarea>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <button type="submit" name="submitComment" class="btn read-more">Post Comment</button>
                                            </div>
                                            <?php else:?>
                                            <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
                                            <input type="hidden" name="email" value="<?php echo $_SESSION['email']?>">
                                            <div class="mb-3 col-md-8 form-group w-100">
                                                <label for="comments" class="form-label">Comment:</label>
                                                <textarea name="comment" id="summernote" class="form-control" required></textarea>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <button type="submit" name="submitComment" class="btn read-more">Post comment</button>
                                            </div>
                                        </form>
                                        <?php endif;?>
                                    </div>

                                    <!--Post comment here-->
                                    <?php if(isset($_SESSION['id'])):?>
                                    <div class="row mt-5 mb-3 my-3 py-2 px-4 col-md-8 w-100 h-100">
                                        <div class="d-flex justify-content-center">
                                            <div class="card w-100 h-100 bg-transparent border-0">
                                                <div class="card-body">
                                                    <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'.$_SESSION['profileImage']?>" alt="User_profile" class="rounded-circle" style="height: 44px; width: 44px;" width="44" height="44" >
                                                    <div class="card-text" style="text-align: justify;">
                                                        <h5 class="fw-bold text-secondary"><?php echo $_SESSION['username']?></h5>
                                                        <p class="small text-muted">March 24, 2024</p>
                                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                                        A, voluptatibus commodi repudiandae maxime nulla magnam reiciendis ratione nesciunt possimus beatae inventore doloremque 
                                                        animi minus temporibus molestiae deleniti adipisci suscipit modi!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    <!--End of comment here-->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--ENd of Main content section-->

                    <!--Sidebar popular Content-->
                    <div class="container-fluid col-md-4 mt-3 clearfix">
                        <!--Google Widgets -->
                        <div class="card mb-3 w-auto">
                            <h5 class="card-header bg-transparent text-secondary">Google Widgets</h5>
                            <div class="card-body">
                                <iframe src="https://www.google.com/maps/embed?pb=!4v1713517214188!6m8!1m7!1sCAoSLEFGMVFpcE44c2tibXJCRnRoeHpJdnJoY1VrSTBhbTZyemhFVzFQRUpoLW5y!2m2!1d13.99581128727167!2d121.8106086619177!3f318.0102210969411!4f6.2145195050297275!5f0.7820865974627469" width="370" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <!--End o google widgets-->
                        <!--Post content-->
                        <div class="card h-auto w-100">
                            <h5 class="card-header bg-transparent">Popular Post</h5>
                            <div class="card-body">
                                <div class="card mb-2 border-0">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Quezon_Provincial_Capitol_right_side_view_(Quezon_Avenue,_Lucena,_Quezon;_10-09-2022).jpg" class="card-img-top" alt="Thumbnail_post">
                                    <div class="card-body">
                                        <a class="card-text" href="<?php echo BASE_URL.'/single-page.php'?>"><p>Lucena Park</p></a>    
                                    </div>
                                </div>
                                <div class="card mb-2 border-0">
                                    <img src="https://jangotshome.files.wordpress.com/2018/11/cuasay.jpg?w=1100" class="card-img-top" alt="Thumbnail_post">
                                    <div class="card-body">
                                        <a class="card-text" href="<?php echo BASE_URL.'/single-page.php'?>"><p>Pinagbanderahan Atimonan, Quezon</p></a>
                                    </div>
                                </div>
                                <div class="card mb-2 border-0">
                                    <img src="https://www.tutorialspoint.com/cplusplus/images/cpp-mini-logo.jpg" class="card-img-top" alt="Thumbnail_post">
                                    <div class="card-body">
                                        <a class="card-text" href="<?php echo BASE_URL.'/single-page.php'?>"><p>C++ Programming Tutorials</p></a>
                                    </div>
                                </div>
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

<?php include(ROOT_PATH.'/app/includes/scripts.php');?>

</body>
</html>