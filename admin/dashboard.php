<?php 
include("path.php");
include(ROOT_PATH."/app/controllers/dashboard.php");

#if session id not login direct to login page
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
                <!--Message Alert -->
                <?php include(ROOT_PATH."/app/helpers/messageAlert.php");?>
                <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
                <!--End of message Alert-->
                <div class="container-fluid mb-5">
                    <div class="d-flex justify-content-between mb-3 px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Dashboard</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                    <div class="mb-3">
                        <div class="clearfix"></div>
                        <!--Row of dashboard content-->
                        <div class="row">
                        <?php if($_SESSION['id'] && $_SESSION['role'] === 'admin'):?>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_ADMIN.'/users/manage-user.php'?>">
                                    <div class="card cardh border-0">
                                        <div class="card-body py-4">
                                            <h5 class="mb-2 fw-bold text-uppercase">Users</h5>
                                            <i class='bx bxs-user icon'></i>
                                            <p class="mb-2 fw-bold"><?php echo htmlentities($users)?></p>
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
                                            <p class="mb-2 fw-bold"><?php echo htmlentities($categories)?></p>
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
                                            <p class="mb-2 fw-bold"><?php echo htmlentities($subcategories)?></p>
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
                                            <p class="mb-2 fw-bold text-truncate"><?php echo htmlentities($posted)?></p>
                                        </div>
                                    </div>
                                </a>                                
                            </div>
                            <?php else:?>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_ADMIN.'/category/manage-category.php'?>">
                                    <div class="card cardh border-0">
                                        <div class="card-body py-4">
                                            <h5 class="mb-2 fw-bold text-uppercase">Category listed</h5>
                                            <i class='bx bxs-layer icon'></i>
                                            <p class="mb-2 fw-bold"><?php echo htmlentities($categories)?></p>
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
                                            <p class="mb-2 fw-bold"><?php echo htmlentities($subcategories)?></p>
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
                                            <p class="mb-2 fw-bold text-truncate"><?php echo htmlentities($posted)?></p>
                                        </div>
                                    </div>
                                </a>                                
                            </div>
                            <?php endif;?>
                        </div>
                        
                            <!--End of Row content-->
                        
                        <!--====================== Start of Recent Post Table-->
                        <div class="col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class='bx bxs-cabinet' style='color:#e915ef'></i>Recent Post</h4>
                                    <hr />
                                    <!--============= Table User Management  ===============-->
                                    <div class="table-responsive p-2">
                                        <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="RecentPostTable">
                                            <thead>
                                                <!--============ Table Header ================-->
                                                <tr>
                                                    <th>PSID</th>
                                                    <th>Username</th>
                                                    <th>Post Title</th>
                                                    <th>Category</th>
                                                    <th>Sub-Category</th>
                                                    <th>Status</th>
                                                    <th>Post Created</th>
                                                    <th>Post Updated</th>                                                        
                                                    <th>Action</th>
                                                </tr>   
                                            </thead>
                                            <!--========== End of Table header ================-->
                                            <tbody>
                                                <!--========= Table Data =====================-->
                                                <?php
                                                    $post = "SELECT * FROM post WHERE status = 'published' AND is_Active = 1";
                                                    $post_run = mysqli_query($conn, $post);
                                                ?>
                                                <?php if(mysqli_num_rows($post_run) > 0):?>
                                                    <?php foreach($post_run as $key => $posts):?>
                                                <tr>
                                                    <td><?php echo htmlentities($key + 1)?></td>
                                                    <td><?php echo htmlentities($posts['postedBy'])?></td>
                                                    <td class="text-break"><?php echo htmlentities($posts['title'])?></td>
                                                    <td><?php echo htmlentities($posts['category'])?></td>
                                                    <td><?php echo htmlentities($posts['subcategory'])?></td>
                                                    <td><?php echo htmlentities($posts['status'])?></td>
                                                    <td><?php echo htmlentities($posts['created_at'])?></td>
                                                    <td><?php echo htmlentities($posts['updated_at'])?></td>
                                                    <td>
                                                        <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php?psID='?><?php echo htmlentities($posts['id'])?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="<?php echo BASE_ADMIN.'/dashboard.php?delArcPS_ID='?><?php echo htmlentities($posts['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>
                                                    <?php endforeach;?>
                                                <?php endif;?>
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
                        <?php if(isset($_SESSION['id'])):?>
                            <?php if($_SESSION['role'] === 'admin'):?>
                        <!--=================== Start Of Recent User =====================-->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-group' style='color:#e915ef'></i>Recent User</h4>
                                        <hr />
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="RecentUserTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>SNID</th>
                                                        <th>Profile</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>                                                        
                                                        <th>Email Address</th>
                                                        <th>Date created</th>
                                                        <th>Date updated</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php foreach($selectUser as $keys => $user):?>
                                                    <tr>
                                                        <td><?php echo htmlentities($keys + 1)?></td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'?><?php echo htmlentities($user['profileImage'])?>" width="32" height="32" alt="User_profile" class="rounded-circle border">
                                                        </td>
                                                        <td><?php echo htmlentities($user['firstName'])?></td>
                                                        <td><?php echo htmlentities($user['lastName'])?></td>
                                                        <td><?php echo htmlentities($user['username'])?></td>
                                                        <td><?php echo htmlentities($user['email'])?></td>
                                                        <td><?php echo htmlentities($user['created_at'])?></td>
                                                        <td><?php echo htmlentities($user['updated_at'])?></td>
                                                        <td><?php echo htmlentities($user['role'])?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/users/edit-user.php'?>?id=<?php echo htmlentities($user['id'])?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_ADMIN.'dashboard.php?del_id='?><?php echo htmlentities($user['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
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
                            <?php else:?>
                        <?php endif;?>
                    <?php endif;?>
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