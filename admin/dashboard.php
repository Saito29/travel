<?php 
include("path.php");
include(ROOT_PATH."/app/controller/dashboard.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Admin Dashboard</title>
    <?php include(ROOT_PATH."/app/includes/header.php")?>
</head>    
<body>
    <!--Page wrapper-->
    <div class="wrapper">   
        <!--Sidebar -->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?> 
        <!--Start of index-->
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <main class="content px-3 py-4">
                <div class="container-fluid mb-5">
                    <div class="d-flex justify-content-between mb-3 px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Dashboard</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                    <div class="mb-3">
                        <div class="clearfix"></div>
                        <!--Row of dashboard content-->
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_ADMIN.'/users/manage-user.php'?>">
                                    <div class="card cardh border-0">
                                        <div class="card-body py-4">
                                            <h5 class="mb-2 fw-bold text-uppercase">Users</h5>
                                            <i class='bx bxs-user icon'></i>
                                            <p class="mb-2 fw-bold"><?php echo $users?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_ADMIN.'/category/manage-category.php'?>">
                                    <div class="card cardh border-0">
                                        <div class="card-body py-4">
                                            <h5 class="mb-2 fw-bold text-uppercase">Category listed</h5>
                                            <i class='bx bxs-layer icon'></i>
                                            <p class="mb-2 fw-bold"><?php echo $categories?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_ADMIN.'/category/manage-subcategories.php'?>">
                                    <div class="card cardh border-0">
                                        <div class="card-body py-4">
                                            <h5 class="mb-2 fw-bold text-uppercase">Sub Category listed</h5>
                                            <i class='bx bxs-layer icon'></i>
                                            <p class="mb-2 fw-bold"><?php echo $subcategories?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_ADMIN.'/posts/manage-post.php'?>">
                                    <div class="card cardh border-0">
                                        <div class="card-body py-4">                                    
                                            <h5 class="mb-2 fw-bold text-uppercase">Posts</h5>
                                            <i class='bx bxs-layer icon'></i>
                                            <p class="mb-2 fw-bold text-truncate">10</p>
                                        </div>
                                    </div>
                                </a>                                
                            </div>
                        </div>
                            <!--End of Row content-->

                        <!--====================== Start of Recent Post Table-->
                        <div class="col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-lg-12">
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
                                                    <td>Published</td>
                                                    <td>
                                                        <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Barry</td>
                                                    <td>SQL Basic Fundamentals</td>
                                                    <td>Programming Related</td>
                                                    <td>Programming Tutorials</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>       
                                                <tr>
                                                    <td>3</td>
                                                    <td>Gojo</td>
                                                    <td>Tip Toe by author</td>
                                                    <td>Entertainment</td>
                                                    <td>Music</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="#deletePost" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>
                                                <!--============= End of Table Data ===============-->
                                            </tbody>
                                            <!--End of table body-->
                                        </table>
                                        <!--End of Table for Recent Posts-->
                                    </div>
                                    <!--=========================== End of Table Post Management ========================-->
                                </div>
                            </div>
                        </div>
                        <!--======================= End of Table Recent Post section ===========================-->

                        <!--=================== Start Of Recent User =====================-->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Recent User</h4>
                                        <hr />
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="RecentUserTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Profile</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>                                                        
                                                        <th>Email Address</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <tr>
                                                        <td clas>1</td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_ADMIN.'/asset/images/profile/hutao_profile.jpg'?>" width="36" height="36" alt="User_profile" class="rounded-circle border">
                                                        </td>
                                                        <td>Mark Kinnedy</td>
                                                        <td>Anda</td>
                                                        <td>Saito</td>
                                                        <td>saito29@gmail.com</td>
                                                        <td>Admin</td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td clas>2</td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_ADMIN.'/asset/images/logo/Cube.io.png'?>" width="36" height="36" alt="User_profile" class="rounded-circle border">
                                                        </td>
                                                        <td>Khrisalyn</td>
                                                        <td>Tolentino</td>
                                                        <td>Khrisa</td>
                                                        <td>krhisalyn@gmail.com</td>
                                                        <td>Admin</td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td clas>3</td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_ADMIN.'/asset/images/logo/Cube.io.png'?>" width="36" height="36" alt="User_profile" class="rounded-circle border">
                                                        </td>
                                                        <td>Gelo</td>
                                                        <td>Eranzo</td>
                                                        <td>Gelo29</td>
                                                        <td>Gelo@gmail.com</td>
                                                        <td>Admin</td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                            <!--End of Table-->
                                        </div>
                                        <!--=========================== End of Table User Management ========================-->
                                    </div>
                                </div>
                            </div>
                                <!--===================== End of table Recent User ====================-->
                            </div>
                            <!--=================== End Recent User ===============-->
                        </div>
                    <!--End of Dashboard Content-->
                </div>
            </main>
            <!--ENd of index content-->
            <!--Footer-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>