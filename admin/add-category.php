<?php include("path.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cube.io">
    <meta name="description" content="Cube.io Add Category">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube.io | Add Category</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH.'/app/includes/sidebar.php');?>
        <div class="main">
            <!--Navbar -->
            <?php include(ROOT_PATH.'/app/includes/nav.php');?>
            <!--Main content add Categories-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Add Category</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Category</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                               <div class="alert alert-success" role="alert">
                                                  <strong>Category  Added Successfully!</strong>
                                               </div>
                                               <!---Error Message--->
                                               <div class="alert alert-danger" role="alert">
                                                  <strong>Category  Not Added! Please try again later.</strong>
                                               </div>
                                            </div>
                                         </div>
                                        <form action="#" class="row gx-2 gy-3" name="addUser" method="post">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="addCategory" class="form-label">Category:</label>
                                                <input type="text" class="form-control p-2" name="addCategory" placeholder="Category Name" required>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Category Description:</label>
                                                <textarea name="categoryDescription" class="form-control" rows="4" placeholder="Category Description" required></textarea>
                                            </div>
                                            <div class="mb-2 col-md-12 form-group">
                                                <button type="submit" class="btn btn-outline-primary" name="addCategory">Add Category</button>
                                                <button type="reset" class="btn btn-outline-danger" name="addCategory">Discard Category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--End of Add category content-->
            <!--Footer-->
            <?php include(ROOT_PATH.'/app/includes/footer.php');?>
        </div>
    </div>
    <!--Script-->
    <?php include(ROOT_PATH.'/app/includes/scripts.php');?>
</body>
</html>