<?php 
include("../path.php");
include(ROOT_PATH.'/app/controllers/page.php');

#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    header("Location: ".BASE_URL."/index.php");
}
if(isset($_SESSION['id']) && $_SESSION['role'] === 'user' || $_SESSION['role'] === 'editor'){
    header("Location: ".BASE_URL."/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel About Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | About Page</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main Content-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">About Page</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">About page</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-notepad' style='color:#e915ef'></i>About Page</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?> 
                                                <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                            </div>
                                         </div>
                                        <form action="aboutpage.php" class="row gx-2 gy-3" name="updateAboutUs" method="post">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="title" class="form-label">Page Title:</label>
                                                <?php if(!isset($_POST['title'])):?>
                                                <input type="text" class="form-control" name="title" placeholder="Page Title" value="">
                                                <?php else:?>
                                                <input type="text" class="form-control" name="title" placeholder="Page Title" value="<?php echo htmlentities($title)?>">
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-2 col-md-6 form-group">
                                                <label for="created_at" class="form-label">Posted on:</label>
                                                <?php if(!isset($_POST['created_at'])):?>
                                                <input type="date" class="form-control" name="created_at" value="">
                                                <?php else:?>
                                                <input type="date" class="form-control" name="created_at" value="<?php echo htmlentities($created_at)?>">
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-1 col-md-12 form-group">
                                                <label for="pageTitle" class="form-label">About Page Details:</label>
                                                <?php if(!isset($_POST['details'])):?>
                                                <textarea name="details" id="mytextarea" class="form-control"></textarea>
                                                <?php else:?>
                                                <textarea name="details" id="mytextarea" class="form-control"><?php echo htmlentities($details)?></textarea>
                                                <?php endif;?>
                                            </div>
                                            <h4 class="mb-1 mt-2 card-title">Page Contact Info:</h4>
                                            <hr>
                                            <div class="mb-1 col-md-6 form-group">                                                    
                                                <label for="contact" class="form-label"><i class='bx bx-phone'></i>Contact No.:</label>
                                                <?php if(!isset($_POST['contact'])):?>
                                                <input type="text" name="contact" class="form-control" placeholder="Contact No.">
                                                <?php else:?>
                                                <input type="text" name="contact" class="form-control" placeholder="Contact No." value="<?php echo htmlentities($contact)?>">
                                                <?php endif;?>
                                                <p class="text-warning-emphasis fs-6">(optional)</p>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="email" class="form-label"><i class='bx bxl-gmail'></i>Email Contact:</label>
                                                <?php if(!isset($_POST['email'])):?>
                                                <input type="email" name="email" class="form-control" placeholder="Email Contact">
                                                <?php else:?>
                                                <input type="email" name="email" class="form-control" placeholder="Email Contact" value="<?php echo htmlentities($email)?>">
                                                <?php endif;?>
                                                <p class="text-warning-emphasis fs-6">(optional)</p>
                                            </div>
                                            <div class="mb-2 col-md-6 form-group">
                                                <button type="submit" class="btn btn-outline-primary" name="create-btn">Post publish</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--Footer-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>