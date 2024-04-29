<?php include("path.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cube.io">
    <meta name="description" content="Cube.io Manage Category">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube.io | Manage Category</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main content Manage Category-->
            <!--==================== Manage User ==================-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Manage Category</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                        </ol>
                    </div>
                </div>
                <!--============================ Manage User body content =========================-->
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body mb-4">
                                        <h4 class="card-title">Manage Categories</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Category successfully deleted!</strong>
                                                </div>
                                                <div class="alert alert-success" role="alert">
                                                    <strong>Category successfully restored!</strong>
                                                </div>
                                               <!---Error Message--->
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Category failed to delete, Please try again later.</strong>
                                                </div>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Category failed to restore, Please try again later.</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <!--==== Search & button ======-->
                                        <div class="container-fluid p-2 mt-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_URL.'/add-category.php'?>">
                                                    <button type="button" class="btn btn-outline-primary">Add Category</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!--======== End of Search & button ============-->
                                        <!--============= Table Category Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%" id="myTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Posting Date</th>
                                                        <th>Last updation Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Travel and Tour</td>
                                                        <td>Blogging about Travel and Tour here in Quezon Province</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_URL.'/edit-category.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Programming Related</td>
                                                        <td>Tutorial Video about basic Fundamentals of Programming Languages</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_URL.'/edit-category.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Entertainment</td>
                                                        <td>Stress relief blog</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_URL.'/edit-category.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Category Management ========================-->
                                   </div>
                                   <!--================== End of Manage Category ========================-->

                                   <!--================= Deleted Manage Category Start here ==================-->
                                   <div class="card-body">
                                        <h4 class="card-title"><i class='bx bx-trash'></i>Deleted Categories</h4>
                                        <hr />
                                        <!--============= Table Category Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%" id="DeletedmyTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Posting Date</th>
                                                        <th>Last updation Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Travel and Tour</td>
                                                        <td>Blogging about Travel and Tour here in Quezon Province</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="#redo" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Programming Related</td>
                                                        <td>Tutorial Video about basic Fundamentals of Programming Languages</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="#redo" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Entertainment</td>
                                                        <td>Stress relief blog</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="#redo" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Category Management ========================-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--Footer-->
            <?php include(ROOT_PATH.'/app/includes/footer.php');?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH.'/app/includes/scripts.php');?>
</body>
</html>