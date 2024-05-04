<?php 
include("../path.php");
include(ROOT_PATH."/app/controller/sub-category.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Add Sub-category">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Add Sub-category</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main content Add sub-category-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Add Sub-Category</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Sub-Category</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Sub-Category</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 col-md-8">
                                                <!--Alert Start Here -->
                                                <?php include(ROOT_PATH."/app/helpers/formAlert.php"); ?>
                                                <?php include(ROOT_PATH."/app/helpers/messageAlert.php"); ?>
                                                <!--Alert End Here -->
                                            </div>
                                         </div>
                                        <form action="#" class="row gx-2 gy-3" name="addUser" method="post">
                                            <div class="mb-1 col-md-6">
                                                <label for="categories" class="form-label">Category:</label>
                                                <select name="category" class="form-select form-select-sm" aria-label="Default select example" required>
                                                    <option value="" selected>Select Categories:</option>
                                                    <!--Category List-->
                                                    <option value="">Travel and Tour</option>
                                                    <option value="">Programming Related</option>
                                                    <option value="">Entertainment</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="addSubCateg" class="form-label">Sub-Category:</label>
                                                <input type="text" class="form-control p-2" name="addSubCateg" placeholder="Sub-Category Name" required>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="subCategDesc" class="form-label">Sub-Category Description:</label>
                                                <textarea name="subCategDesc" class="form-control" rows="4" placeholder="Sub-Category Description" required></textarea>
                                            </div>
                                            <div class="mb-2 col-md-12 form-group">
                                                <button type="submit" class="btn btn-outline-primary" name="addSubCateg-btn">Add Sub-Category</button>
                                                <button type="reset" class="btn btn-outline-danger" name="discardCategory-btn">Discard Sub-Category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--footer-->
            <?php include(ROOT_PATH."/app/includes/footer.php"); ?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>