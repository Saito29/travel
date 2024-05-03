<?php 
include("../path.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cube.io">
    <meta name="description" content="Cube.io Trash Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube.io | Trash Post</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/navbar.php");?>
            <!--==================== Manage Trash Post ==================-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Trash Post</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trash Post</li>
                        </ol>
                    </div>
                </div>
                <!--============================ Manage Trash body content =========================-->
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Trash Post</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                               <div class="alert alert-success" role="alert">
                                                  <strong>Trash Post successfully restored!</strong>
                                               </div>
                                               <!---Error Message--->
                                               <div class="alert alert-danger" role="alert">
                                                  <strong>Trash Post failed to restored, Please try again later.</strong>
                                               </div>
                                               <div class="alert alert-danger" role="alert">
                                                <strong>Oh snap Post deleted permanently!</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="myTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Username</th>
                                                        <th>Post Title</th>
                                                        <th>Category</th>
                                                        <th>Sub-Category</th>
                                                        <th>Status</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Saito</td>
                                                        <td>Hiking in Pinagbanderahan</td>
                                                        <td>Travel and Tour</td>
                                                        <td>Hiking</td>
                                                        <td>Deleted</td>
                                                        <td>
                                                            <a href="#toggleReturn" class="btn btn-outline-success"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Flash</td>
                                                        <td>SQL Basic Fundamentals</td>
                                                        <td>Programming Related</td>
                                                        <td>Programming Tutorials</td>
                                                        <td>Deleted</td>
                                                        <td>
                                                            <a href="#toggleReturn" class="btn btn-outline-success"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Jexxx</td>
                                                        <td>Tip Toe by author</td>
                                                        <td>Entertainment</td>
                                                        <td>Music</td>
                                                        <td>Deleted</td>
                                                        <td>
                                                            <a href="#toggleReturn" class="btn btn-outline-success"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table User Management ========================-->
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