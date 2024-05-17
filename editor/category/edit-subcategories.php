<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/sub-category.php");

#if session id not login direct to login page
if(!isset($_SESSION['id'])){
    header("Location: ".BASE_URL."/index.php");
}
if(isset($_SESSION['id']) && $_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin' || $_SESSION['role'] === 'sub-admin'){
    header("Location: ".BASE_URL."/index.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Edit Subcategories">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Edit Subcategories</title>
    <?php include(ROOT_PATH."/app/includes/header.php")?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main content-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Update Sub-Category</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Sub-Category</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Sub-Category</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php")?>
                                            </div>
                                        </div>
                                        <form action="edit-subcategories.php" class="row gx-2 gy-3" name="addUser" method="post" enctype="application/x-www-form-urlencoded">
                                            <input type="hidden" name="id" value="<?php echo htmlentities($id)?>">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="name" class="form-label">Sub-Category:</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo htmlentities($name)?>" placeholder="Sub-Category Name">
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="description" class="form-label">Sub-Category Description:</label>
                                                <textarea name="description" class="form-control" rows="4" placeholder="Sub-Category Description"><?php echo htmlentities($description)?></textarea>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <label for="updated_at" class="form-label">Sub-Category Update DateTime:</label>
                                                <input type="datetime-local" name="updated_at" class="form-control form-control-sm" value="<?php echo htmlentities($updated_at)?>">
                                            </div>
                                            <div class="mb-2 col-md-12 form-group">
                                                <button type="submit" class="btn btn-outline-success" name="upt-btn">Update Sub-Category</button>
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
    <!--scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>