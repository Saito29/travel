<?php 
include("../path.php");
include(ROOT_PATH.'/app/controllers/posts.php');

#if session id not login direct to home page
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
    <meta name="description" content="Travel Manage Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Manage Post</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--==================== Manage User ==================-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Post Management</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post Management</li>
                        </ol>
                    </div>
                </div>
                <!--============================ Manage User body content =========================-->
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-archive' style='color:#e915ef'></i>Post Management</h4>
                                        <hr />
                                        <div class="row">
                                        <div class="container-fluid p-2 mt-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_ADMIN.'/posts/add-post.php'?>">
                                                    <button type="button" class="btn btn-outline-primary">Add Post</button>
                                                </a>
                                            </div>
                                            <div class="col-sm-12">
                                                <!--Alert start here -->
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php")?>
                                                <!--Alert end here -->
                                            </div>
                                        </div>
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="myTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>PSID</th>
                                                        <th>Posted by</th>
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
                                                        <?php foreach($post_run as $keys => $posts):?>
                                                    <tr>
                                                        <td><?php echo htmlentities($keys + 1);?></td>
                                                        <td><?php echo htmlentities($posts['postedBy']);?></td>
                                                        <td><?php echo htmlentities($posts['title']);?></td>
                                                        <td><?php echo htmlentities($posts['category']);?></td>
                                                        <td><?php echo htmlentities($posts['subcategory']);?></td>
                                                        <td><?php echo htmlentities($posts['status']);?></td>
                                                        <td><?php echo htmlentities($posts['created_at']);?></td>
                                                        <td><?php echo htmlentities($posts['updated_at']);?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php?psID='?><?php echo htmlentities($posts['id']);?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_ADMIN.'/posts/manage-post.php?delArcPS_ID='?><?php echo htmlentities($posts['id']);?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Post Management ========================-->
                                   </div>
                                </div>
                            </div>
                            <!--Unpublished Post Management -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-message-alt-edit' style='color:#ce1337'></i>Unpublished Management</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!--Alert start here -->
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php")?>
                                                <!--Alert end here -->
                                            </div>
                                        </div>
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="myTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>PSID</th>
                                                        <th>Posted by</th>
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
                                                        $post = "SELECT * FROM post WHERE status = 'unpublished' AND is_Active = 1";
                                                        $post_run = mysqli_query($conn, $post);
                                                    ?>
                                                    <?php if(mysqli_num_rows($post_run) > 0):?>
                                                        <?php foreach($post_run as $keys => $posts):?>
                                                    <tr>
                                                        <td><?php echo htmlentities($keys + 1);?></td>
                                                        <td><?php echo htmlentities($posts['postedBy']);?></td>
                                                        <td><?php echo htmlentities($posts['title']);?></td>
                                                        <td><?php echo htmlentities($posts['category']);?></td>
                                                        <td><?php echo htmlentities($posts['subcategory']);?></td>
                                                        <td><?php echo htmlentities($posts['status']);?></td>
                                                        <td><?php echo htmlentities($posts['created_at']);?></td>
                                                        <td><?php echo htmlentities($posts['updated_at']);?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/posts/edit-post.php?psID='?><?php echo htmlentities($posts['id']);?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_ADMIN.'/posts/manage-post.php?delArcPS_ID='?><?php echo htmlentities($posts['id']);?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Post Management ========================-->
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Post Management-->
            </main>
            <!--Footer-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>