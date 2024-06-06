<?php 
include("path.php");
include(ROOT_PATH."/app/controllers/posts.php");
include(ROOT_PATH."/vendor/autoload.php");

#Empty array of post variables
$post = array();
$postTitle = 'Recent Posts';

#Categories selected
if(isset($_GET['ctId'])){
    $post = getCategoryPost($_GET['ctId']);
    $postTitle = "Category post search found under: '" . $_GET['name']. "' are: ". count($post). " results";
}else if(isset($_POST ['search'])){
    #Search bar
    #Unset the search button
    unset($_POST['search']);

    $postTitle = "Search result found: " . $_POST['term'];

    $post = searchPosts($_POST['term']);    
}else{
    $post = getPublishPost();
}

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
        <section class="container section section__height h-auto w-100" id="home">

            <!--Alert Message Success-->
            <?php include(ROOT_PATH."/app/helpers/messageAlert.php");?>
            <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
            <!--End of alert -->

            <div class="page-wrapper mx-auto h-auto w-100">
                <!--========= Post Slider Title =================-->
                <div class="container mx-auto my-3 py-3 mb-4 h-auto w-100 post-slider">
                    <h3 class="card-title text-center">Trends Blog</h3>
                    <i class='bx bxs-left-arrow prev'></i>
                    <i class='bx bxs-right-arrow next'></i>

                    <!--================= Post Wrapper ====================-->
                    <div class="post-wrapper h-auto">

                        <!--======= Post Content Card ==================-->
                        <?php foreach ($post as $posts): ?>
                        <div class="card card-content">
                            <img src="<?php echo BASE_URL . '/app/upload/uploadThumbnail/' .htmlspecialchars( $posts['image']); ?>" alt="post-image" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title fs-6" style="text-align: justify;">
                                    <a href="<?php echo BASE_URL . '/single-page.php?psId='.htmlspecialchars($posts['id']); ?>">
                                    <?php echo htmlspecialchars($posts['title']); ?>
                                    </a>
                                </h6>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="flex-shrink-0">
                                        <img src="<?php echo BASE_URL . '/app/upload/uploadProfile/' . htmlspecialchars($posts['profileImage']); ?>" alt="User_profile" class="rounded-circle border" style="width: 40px; height: 40px;" width="40" height="40">
                                    </div>
                                    <h6 class="card-subtitle text-success flex-grow-1 ms-2"><?php echo htmlspecialchars($posts['username']); ?></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between text-muted">
                                    <i class='bx bx-calendar card-text'><?php echo htmlspecialchars(date('F j, Y', strtotime($posts['created_at']))); ?></i>
                                    &nbsp;
                                    <i class='bx bx-show-alt card-text'><?php echo htmlspecialchars($posts['viewer']); ?></i>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!--End of trends post content-->
                    </div>
                </div>

                <!--=============== Start Of main Content ==============================-->
                <div class="container-fluid clearfix">
                    
                    <!--=========== Main Post container ===================-->
                    <div class="row mt-5">
                        <!--============ Start of Main content ================-->
                        <div class="col-md-8 col-sm-8 col-xl-8 col-xxl-8">
                            <h5 class="card-title text-secondary">-<?php echo htmlspecialchars($postTitle)?></h5>
                            
                            <!--========= Post Content Start Here =================-->
                            <div class="card-group d-block">
                                <?php foreach ($post as $posts): ?>
                                <div class="card clearfix w-100 h-100 mt-4">
                                    <div class="row g-0 h-100 w-100">
                                        <div class="col-md-4 col-sm-4 col-xl-4 col-xxl-4">
                                            <img src="<?php echo BASE_URL . '/app/upload/uploadThumbnail/' .htmlspecialchars( $posts['image']); ?>" alt="post-Thumbnail" class="img-fluid rounded-start w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xl-8 col-lg-8 col-xxl-8">
                                            <div class="card-header hstack gap-2">
                                                <img src="<?php echo BASE_URL . '/app/upload/uploadProfile/' . htmlspecialchars($posts['profileImage']); ?>" alt="author-profile" class="rounded-circle" style="width: 40px; height: 40px;" width="34" height="34">
                                                <p class="card-text"><?php echo htmlspecialchars($posts['username']); ?></p>
                                                <p class="card-text ms-auto"><small class="text-body-secondary"><i class='bx bx-calendar'><?php echo htmlspecialchars(date('F j, Y', strtotime($posts['created_at']))); ?></i></small></p>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-2"><a href="<?php echo BASE_URL . '/single-page.php?psId=' . htmlspecialchars($posts['id']); ?>"><?php echo htmlspecialchars($posts['title']); ?></a></h5>
                                                <p class="card-text mb-2">
                                                    <?php echo htmlspecialchars_decode(substr($posts['description'], 0 ,300).'...'); ?>
                                                </p>
                                                <div class="text-end mt-3">
                                                    <a href="<?php echo BASE_URL . '/single-page.php?psId=' . htmlspecialchars($posts['id']); ?>" class="btn read-more">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
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
                                    <form action="index.php" method="post" class="row gx-2 gy-2">
                                        <div class="mb-1 col-md-7 col-sm-9 col-xl-9 col-xxl-9 col-lg-9 form-group">
                                            <input type="search" name="term" class="form-control border-success-subtle" aria-label="search" placeholder="Search..."/>
                                        </div>
                                        <div class="mb-1 col-md-3 col-sm-3 col-xl-3 col-xxl-3 col-lg-3 form-group ">
                                            <button type="submit" name="search" class="btn read-more">Search</button>
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
                                        <li class="list-group-item list-group-flush"><a href="<?php echo BASE_URL.'/index.php?ctId='. htmlspecialchars($categories['id']) . '&name=' . htmlspecialchars($categories['categName'])?>"><?php echo htmlspecialchars($categories['categName']);?></a></li>
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
    <?php include (ROOT_PATH . "/app/includes/footer.php");?>
</main>
<?php include(ROOT_PATH.'/app/includes/scripts.php');?>
</body>
</html>