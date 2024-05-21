<?php 
include("path.php");
include(ROOT_PATH."/app/controllers/comment.php");
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
    <?php include (ROOT_PATH . "/app/includes/nav.php");?>
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
                                        <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                        <!--Comments required to identify user-->
                                        <?php if(!isset($_SESSION['id'])):?>
                                        <form action="single-page.php" method="post" name="Comment" class="row gx-2 gy-2 p-2" autocomplete="on" enctype="application/x-www-form-urlencoded">
                                            <input type="hidden" name="id" value="<?php echo htmlentities($id)?>">
                                            <div class="mb-1 col-md-4 form-group w-50">
                                                <label for="username" class="form-label">Username:</label>
                                                <?php if(!isset($_POST['username'])):?>
                                                <input type="text" name="username" placeholder="Username" value="" class="form-control" required>
                                                <?php else:?>
                                                <input type="text" name="username" placeholder="Username" value="<?php echo htmlentities($username)?>" class="form-control" required>
                                                <?php endif;?>
                                                <p class="text-success">(required)</p>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group w-50">
                                                <label for="email" class="form-label">Email Address:</label>
                                                <?php if(!isset($_POST['email'])):?>
                                                <input type="email" name="email" placeholder="Email" value="" class="form-control">
                                                <?php else:?>
                                                <input type="email" name="email" placeholder="Email" value="<?php echo htmlentities($email)?>" class="form-control">
                                                <?php endif;?>
                                                <p class="text-warning-emphasis">(optional)</p>
                                            </div>
                                            <div class="mb-1 col-md-8 form-group w-100">
                                                <label for="comments" class="form-label">Comment:</label>
                                                <?php if(!isset($_POST['comment'])):?>
                                                <textarea name="comment" id="editor" class="form-control"></textarea>
                                                <?php else:?>
                                                <textarea name="comment" id="editor" class="form-control"><?php echo htmlentities($comment)?></textarea>
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <button type="submit" name="submitComment" class="btn read-more">Post Comment</button>
                                            </div>
                                        </form>
                                            <?php else:?>
                                        <form action="single-page.php" method="post" class="row gx-2 gy-2 p-2" autocomplete="on" enctype="application/x-www-form-urlencoded">
                                            <input type="hidden" name="username" value="<?php echo htmlentities($_SESSION['username'])?>">
                                            <input type="hidden" name="email" value="<?php echo htmlentities($_SESSION['email'])?>">
                                            <div class="mb-3 col-md-8 form-group w-100">
                                                <label for="comments" class="form-label">Comment:</label>
                                                <?php if(!isset($_POST['comment'])):?>
                                                <textarea name="comment" id="editor" class="form-control"></textarea>
                                                <?php else:?>
                                                <textarea name="comment" id="editor" class="form-control"><?php echo htmlentities($comment)?></textarea>
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <button type="submit" name="submitComment" class="btn read-more">Post comment</button>
                                            </div>
                                        </form>
                                        <?php endif;?>
                                    </div>

                                    <!--Post comment here-->
                                    <?php
                                        $comment = mysqli_query($conn, "SELECT * FROM comments WHERE status = 'approved'");
                                    ?>
                                    <?php while($comment_query = mysqli_fetch_assoc($comment)):?>
                                    <div class="row mb-1 py-2 px-4 col-md-8 w-100 h-100">
                                        <div class="d-flex justify-content-center">
                                            <div class="card w-100 h-100 bg-transparent border-0">
                                                <div class="card-body">
                                                    <?php if(isset($_POST['submitComment'])):?>
                                                    <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'.htmlentities($_SESSION['profileImage'])?>" alt="User_profile" class="rounded-circle" style="height: 44px; width: 44px;" width="44" height="44" >
                                                    <?php else:?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z"></path></svg>
                                                    <?php endif;?>
                                                    <div class="card-text" style="text-align: justify;">
                                                        <h5 class="fw-bold text-secondary"><?php echo htmlentities($comment_query['username'])?></h5>
                                                        <p class="small text-muted"><?php echo htmlentities($comment_query['posted'])?></p>
                                                        <p><?php echo html_entity_decode($comment_query['comment'])?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile;?>
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
                                <?php
                                    $postImage = mysqli_query($conn, "SELECT * FROM post WHERE is_Active = 1 LIMIT 5");
                                ?>
                                <?php while($post_query = mysqli_fetch_assoc($postImage)):?>
                                <div class="card mb-2 border-0">
                                    <img src="<?php echo BASE_URL.'/app/upload/uploadThumbnail/'?><?php echo htmlentities($post_query['image'])?>" class="card-img-top w-50" alt="Thumbnail_post" width="75" height="75">
                                    <div class="card-body">
                                        <a class="card-text" href="<?php echo BASE_URL.'/single-page.php?psID='?><?php echo htmlentities($post_query['id'])?>"><p><?php echo htmlentities($post_query['title'])?></p></a>    
                                    </div>
                                </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                        
                        <!--============= Sidebar Category ==============-->
                        <div class="card mt-3 clearfix" id="category">
                            <h5 class="card-header">Recent Blog Post</h5>
                            <ul class="list-group list-group-flush px-2 py-3">
                                <?php
                                    $postTitle = mysqli_query($conn, "SELECT * FROM `post` WHERE is_Active = 1 LIMIT 10");
                                ?>
                                <?php while($title = mysqli_fetch_array($postTitle)):?>
                                <li class="list-group-item"><a href="<?php echo BASE_URL.'/single-page.php?psID='?><?php echo htmlentities($title['id'])?>" class="text-success px-2"><?php echo htmlentities($title['title'])?></a></li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                        <!--============= End of Sidebar category ================-->
                    </div>
                    <!--End of sidebar popular content section-->
                </div>
            </div>
        </section>
    <!--Footer-->
    <?php include (ROOT_PATH . "/app/includes/footer.php");?>        
</main>
<?php include(ROOT_PATH.'/app/includes/scripts.php');?>
</body>
</html>