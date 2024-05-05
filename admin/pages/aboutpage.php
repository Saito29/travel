<?php 
include("../path.php");
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
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
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
                                        <h4 class="card-title">About</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                               <div class="alert alert-success" role="alert">
                                                  <strong>Well done About page Successfully! updated</strong>
                                               </div>
                                               <!---Error Message--->
                                               <div class="alert alert-danger" role="alert">
                                                  <strong>Failed to update About page! Please try again later.</strong>
                                               </div>
                                            </div>
                                         </div>
                                        <form action="#" class="row gx-2 gy-3" name="updateAboutUs" method="post">
                                            <div class="mb-1 col-md-12 form-group">
                                                <label for="pageTitle" class="form-label">About Page Details:</label>
                                                <textarea name="aboutPage" id="mytextarea" class="form-control">Hi!, always make your content justify.</textarea>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="card-body">
                                                    <h4 class="mb-3 mt-0 card-title">Page Contact Info:</h4>
                                                    <label for="contactNo" class="form-label"><i class='bx bx-phone'></i>Contact No.:</label>
                                                    <input type="text" name="contactNo" id="contactNo" class="form-control" placeholder="Contact No." required>
                                                    <label for="emailPage" class="form-label"><i class='bx bxl-gmail'></i>Email Contact:</label>
                                                    <input type="text" name="emailPage" id="emailPage" class="form-control" placeholder="Email Contact" required>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-6 form-group">
                                                <button type="submit" class="btn btn-outline-success" name="submit">Update and Post</button>
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