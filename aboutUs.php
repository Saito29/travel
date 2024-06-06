<?php 
include("path.php");
include(ROOT_PATH.'/app/controllers/page.php');
require_once(ROOT_PATH.'/vendor/autoload.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel | About Us Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | About Us</title>

    <?php include(ROOT_PATH.'/app/includes/css.php');?>

</head>

<body>
    <!--Header here-->
    <?php
        include (ROOT_PATH . "/app/includes/nav.php");
    ?>
    
    <main>
        <!--=============== HOME ===============-->
        <?php
            $pgtitle = 'About Us';
            $title = 'about us';

            $page_query = mysqli_query($conn, "SELECT * FROM pages WHERE title = '$pgtitle' OR title = '$title'");
        ?>
        <section class="container section section__height" id="home">
            <div class="d-flex justify-content-between fs-6 mx-auto my-3 py-2" aria-label="breadcrumb">                
                <ol class="breadcrumb p-0 m-0 ">
                    <li class="breadcrumb-item text-primary"><a href="<?php echo BASE_URL.'/index.php'?>">Home</a></li>
                    <li class="breadcrumb-item active text-primary-emphasis" aria-current="page">About Us</li>
                </ol>
            </div>
            <!--============ Page Wrapper =============-->
            <?php while($page = mysqli_fetch_array($page_query)):?>
            <div class="card border-0 mx-auto">
                <h4 class="card-header bg-transparent border-success-subtle"><?php echo htmlspecialchars($page['title'])?></h4>
                <div class="card-body">
                    <div class="card-text h-100 w-100" name="aboutUs-details" align="justify"><?php echo htmlspecialchars_decode($page['details'])?></div>
                </div>
            </div>
            <?php endwhile;?>
        </section>
    <!--Footer here-->
    <?php
        include (ROOT_PATH . "/app/includes/footer.php");
    ?>
</main>
<?php include(ROOT_PATH.'/app/includes/scripts.php');?>

</body>
</html>