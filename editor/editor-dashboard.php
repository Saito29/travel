<?php 
include ("path.php");
include(ROOT_PATH."/app/controllers/dashboard.php");

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
    <meta name="description" content="Travel Editor Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Editor Dashboard</title>
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
                <!--Alert-->
                <?php include(ROOT_PATH."/app/helpers/messageAlert.php");?>
                <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                <!--Alert End-->
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
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_EDITOR.'/category/manage-subcategories.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>">
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
                                <a href="<?php echo BASE_EDITOR.'/post/manage-post.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>">
                                <div class="card cardh border-0">
                                    <div class="card-body py-4">                                    
                                        <h5 class="mb-2 fw-bold text-uppercase">Posts Listed</h5>
                                        <i class='bx bxs-layer icon'></i>
                                        <p class="mb-2 fw-bold text-truncate"><?php echo htmlentities($totalPost)?></p>
                                    </div>
                                </div>
                                </a>                                
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="<?php echo BASE_EDITOR.'/post/trash-post.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>">
                                <div class="card cardh border-0">
                                    <div class="card-body py-4">                                    
                                        <h5 class="mb-2 fw-bold text-uppercase">Trash Posts Listed</h5>
                                        <i class='bx bxs-layer icon'></i>
                                        <p class="mb-2 fw-bold text-truncate"><?php echo htmlentities($totalPostTrash)?></p>
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
                                                    // Escape the session username to prevent SQL injection
                                                    $username = mysqli_real_escape_string($conn, $_SESSION['username']);

                                                    #Construct the prepared statement (recommended for security)
                                                    $post = "SELECT * FROM post WHERE postedBy = ? AND status = 'published' AND is_Active = ?";

                                                    #prepare the statement
                                                    $stmt = mysqli_prepare($conn, $post);

                                                    #Bind the parameters (improve security against SQL injection)
                                                    mysqli_stmt_bind_param($stmt, "ss", $username, $is_Active_status);

                                                    // Set the value of the active status parameter (assuming '2')
                                                    $is_Active_status = 1;

                                                    #Exceture the statement
                                                    mysqli_stmt_execute($stmt);

                                                    // Get the results (if needed)
                                                    $result = mysqli_stmt_get_result($stmt);
                                                    #$post_run = mysqli_query($conn, $post);
                                                ?>
                                                <?php foreach($result as $key => $posts):?>
                                                <tr>
                                                    <td><?php echo htmlentities($key + 1)?></td>
                                                    <td><?php echo htmlentities($posts['postedBy'])?></td>
                                                    <td><?php echo htmlentities($posts['title'])?></td>
                                                    <td><?php echo htmlentities($posts['category'])?></td>
                                                    <td><?php echo htmlentities($posts['subcategory'])?></td>
                                                    <td><?php echo htmlentities($posts['status'])?></td>
                                                    <td><?php echo htmlentities($posts['created_at'])?></td>
                                                    <td><?php echo htmlentities($posts['updated_at'])?></td>
                                                    <td>
                                                        <a href="<?php echo BASE_EDITOR.'/post/edit-post.php?psID='?><?php echo htmlentities($posts['id'])?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                        &nbsp;
                                                        <a href="<?php echo BASE_EDITOR.'/editor-dashboard.php?delArcPS_ID='?><?php echo htmlentities($posts['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
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