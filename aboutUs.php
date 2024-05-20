<?php 
include("path.php");
include(ROOT_PATH."/app/config/db.php");
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
        <section class="container section section__height" id="home">
            <div class="d-flex justify-content-between fs-6 mx-3 py-4" aria-label="breadcrumb">                
                <ol class="breadcrumb p-0 m-0 ">
                    <li class="breadcrumb-item text-primary"><a href="<?php echo BASE_URL.'/index.php'?>">Home</a></li>
                    <li class="breadcrumb-item active text-primary-emphasis" aria-current="page">About Us</li>
                </ol>
            </div>
            <!--============ Page Wrapper =============-->
            <div class="card border-0 my-3 py-2 px-2 mx-auto">
                <h4 class="card-header bg-transparent border-success-subtle">About us</h4>
                <div class="card-body">
                    <div class="card-text h-100 w-100" name="aboutUs-details" align="justify">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Vitae cum voluptatibus porro quibusdam accusantium tempora impedit atque id laudantium consequatur, debitis, repudiandae corrupti maxime delectus provident animi. 
                        Laudantium, vero autem?</p>
                        <h5>Our Mission</h5>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Laboriosam, aspernatur dolore accusantium sint rerum voluptates culpa molestiae at soluta. 
                        Dolor, quae modi reprehenderit rerum itaque aliquam! Dignissimos recusandae nemo quisquam.</p>
                        <h5>Our Goals:</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Cum voluptate eos tenetur suscipit mollitia laudantium id nam velit, tempore saepe voluptatem perspiciatis quod nemo dignissimos. 
                        Temporibus est quasi quis aliquam.</p>
                        <h5>About Cube.io</h5>
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
<?php include(ROOT_PATH.'/app/includes/scripts.php');?>

</body>
</html>