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
    <meta name="description" content="Travel | Terms & Conditions Page">
    <meta name="keywords" content="Travel and Tour blog spot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Terms & Conditions</title>

    <?php include(ROOT_PATH.'/app/includes/css.php')?>

</head>

<body>
    <!--Header-->
    <?php
        include (ROOT_PATH . "/app/includes/nav.php");
    ?>

    <main>
        <?php
            $pgtitle = 'Terms and Conditions';
            $title = 'terms and conditions';
            $page_query = mysqli_query($conn, "SELECT * FROM pages WHERE title = '$pgtitle' OR title = '$title'");
        ?>
        <!--=============== HOME ===============-->
        <section class="container section section__height" id="home">
            <!--============ Page Wrapper =============-->
            <div class="d-flex justify-content-between fs-6 mx-auto my-3 py-2" aria-label="breadcrumb">                
                <ol class="breadcrumb p-0 m-0 ">
                    <li class="breadcrumb-item text-primary"><a href="<?php echo BASE_URL.'/index.php'?>">Home</a></li>
                    <li class="breadcrumb-item active text-primary-emphasis" aria-current="page">Terms & Conditions</li>
                </ol>
            </div>
            <?php while($page = mysqli_fetch_assoc($page_query)):?>
            <div class="card mx-auto border-0">
                <h4 class="card-header bg-transparent border-success-subtle"><?php echo htmlentities($page['title'])?></h4>
                <div class="card-body">
                    <div class="card-text" name="aboutUs-details" align="justify"><?php echo html_entity_decode($page['details'])?></div>
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