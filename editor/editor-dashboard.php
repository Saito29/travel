<?php include ("path.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="author" content="Cube.io">
    <meta name="description" content="Cube.io Editor Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube.io | Editor Dashboard</title>
    <?php include(ROOT_PATH."/app/includes/header.php")?>
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
                <div class="container-fluid mb-5">
                    <div class="d-flex justify-content-between mb-3 px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Dashboard</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Editor</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                    <div class="mb-3">
                        <div class="clearfix"></div>
                        <!--Row of dashboard content-->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_URL.'/manage-subcategories.php'?>">
                                <div class="card cardh border-0">
                                    <div class="card-body py-4">
                                        <h5 class="mb-2 fw-bold text-uppercase">Sub Category listed</h5>
                                        <i class='bx bxs-layer icon'></i>
                                        <p class="mb-2 fw-bold">4</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_URL.'/manage-post.php'?>">
                                <div class="card cardh border-0">
                                    <div class="card-body py-4">                                    
                                        <h5 class="mb-2 fw-bold text-uppercase">Posts Listed</h5>
                                        <i class='bx bxs-layer icon'></i>
                                        <p class="mb-2 fw-bold text-truncate">10</p>
                                    </div>
                                </div>
                                </a>                                
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_URL.'/trash-post.php'?>">
                                <div class="card cardh border-0">
                                    <div class="card-body py-4">                                    
                                        <h5 class="mb-2 fw-bold text-uppercase">Trash Posts Listed</h5>
                                        <i class='bx bxs-layer icon'></i>
                                        <p class="mb-2 fw-bold text-truncate">10</p>
                                    </div>
                                </div>
                                </a>                                
                            </div>
                        </div>
                        
                        <!--====================== Start of Recent Post Table-->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent Post</h4>
                                    <hr />
                                    <!--============= Table User Management  ===============-->
                                    <div class="table-responsive p-2">
                                        <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="RecentPostTable">
                                            <thead>
                                                <!--============ Table Header ================-->
                                                <tr>
                                                    <th>#</th>
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
                                                    <td>Hiking in Pinagbanderahan</td>
                                                    <td>Travel and Tour</td>
                                                    <td>Hiking</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <a href="<?php echo BASE_URL.'/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>SQL Basic Fundamentals</td>
                                                    <td>Programming Related</td>
                                                    <td>Programming Tutorials</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <a href="<?php echo BASE_URL.'/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Tip Toe by author</td>
                                                    <td>Entertainment</td>
                                                    <td>Music</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <a href="<?php echo BASE_URL.'/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>
                                                <!--============= End of Table Data ===============-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--=========================== End of Table Post Management ========================-->
                               </div>
                            </div>
                        </div>
                        <!--======================= End of Table Recent Post section ===========================-->
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