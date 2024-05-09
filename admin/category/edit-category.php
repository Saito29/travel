<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/category.php");

#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    header("Location: ".BASE_URL."/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Edit Category">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Edit Category</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Edit main Content-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Edit Category</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Category</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                                <!---Alert start--->  
                                                <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                                                <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                                <!--Alert ends-->
                                            </div>
                                         </div>
                                        <form action="edit-category.php" class="row gx-2 gy-3" name="addUser" method="post" enctype="application/x-www-form-urlencoded">
                                            <input type="hidden" name="id" value="<?php echo $id?>">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categName" class="form-label">Category:</label>
                                                <input type="text" class="form-control p-2" name="categName" value="<?php echo $categName?>" placeholder="Category Name">
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categDesc" class="form-label">Category Description:</label>
                                                <textarea name="categDesc" class="form-control" rows="4" placeholder="Category Description"><?php echo $categDesc?></textarea>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <label for="categUpt_at" class="form-label">Category Update DateTime:</label>
                                                <input type="datetime-local" name="categUpt_at" class="form-control form-control-sm" value="<?php echo $categUpt_at?>">
                                            </div>
                                            <div class="mb-2 col-md-12 form-group">
                                                <button type="submit" class="btn btn-outline-success" name="upt-btn">Update Category</button>
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
    <!--script-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>