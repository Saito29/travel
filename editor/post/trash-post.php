<?php 
include("../path.php");
include(ROOT_PATH.'/app/controllers/posts.php');


#if session id not login direct to home page
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
    <meta name="description" content="Travel Trash Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Trash Post</title>
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
                        <h3 class="fw-bold fs-4 mb-3">Trash Post</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trash Post</li>
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
                                        <h4 class="card-title"><i class='bx bx-trash' style='color:#ce1337'></i>Trash Post</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                               <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
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
                                                        $post = "SELECT * FROM post WHERE is_Active = 0";
                                                        $post_run = mysqli_query($conn, $post);
                                                    ?>

                                                    <?php if(mysqli_num_rows($post_run) >= 0):?>
                                                        <?php foreach($post_run as $keys => $posts):?>
                                                    <tr>
                                                        <td><?php echo htmlentities($keys + 1);?></td>
                                                        <td><?php echo htmlentities($posts['postedBy']);?></td>
                                                        <td><?php echo htmlentities($posts['title']);?></td>
                                                        <td><?php echo htmlentities($posts['category']);?></td>
                                                        <td><?php echo htmlentities($posts['subcategory']);?></td>
                                                        <td class="text-danger"><?php echo htmlentities($posts['status']);?></td>
                                                        <td><?php echo htmlentities($posts['created_at']);?></td>
                                                        <td><?php echo htmlentities($posts['updated_at']);?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_EDITOR.'/post/trash-post.php?recPS_ID='?><?php echo htmlentities($posts['id'])?>" class="btn btn-outline-success"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_EDITOR.'/post/trash-post.php?delPS_ID='?><?php echo htmlentities($posts['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
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