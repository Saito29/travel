<?php 
include("../path.php");
include(ROOT_PATH.'/app/controllers/comment.php');

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
    <meta name="description" content="Travel Approve Comments">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Approve Comments</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main Content-->
            <!--==================== Manage User ==================-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Comments</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Approved Comments</li>
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
                                        <h4 class="card-title"><i class='bx bxs-check-square' style='color:#e915ef'></i>Manage Approved Comments</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                               <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                            </div>
                                         </div>
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive-sm p-2">
                                            <table class="table table-responsive-sm table-bordered d-table-cell" style="width: 100%" id="myTable">
                                                <!--============ Table Header ================-->
                                                <thead>
                                                    <tr>
                                                        <th>CMID</th>
                                                        <th>Username</th>
                                                        <th>Email Address</th>
                                                        <th>Comment</th>
                                                        <th>Status</th>                                                        
                                                        <th>Post Title</th>
                                                        <th>Posting Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <!--========= Table Data Body =====================-->
                                                <tbody>
                                                <?php 
                                                    $comment = "SELECT * FROM comments WHERE status != 'disapproved'";
                                                    $comment_query = mysqli_query($conn, $comment);
                                                ?>
                                                <?php if(mysqli_num_rows($comment_query) > 0):?>
                                                    <?php foreach($comment_query as $keys => $comments):?>
                                                    <tr>
                                                        <td><?php echo htmlentities($keys + 1)?></td>
                                                        <td><?php echo htmlentities($comments['username'])?></td>
                                                        <td><?php echo htmlentities($comments['email'])?></td>
                                                        <td><?php echo $comments['comment']?></td>
                                                        <td class="text-success"><?php echo htmlentities($comments['status'])?></td>
                                                        <td><?php echo htmlentities($comments['title'])?></td>
                                                        <td><?php echo htmlentities($comments['posted'])?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/comments/approved-comments.php?dm_Id='?><?php echo htmlentities($comments['id'])?>" class="btn btn-outline-primary m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_ADMIN.'/comments/approved-comments.php?del_id='?><?php echo htmlentities($comments['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt'></i></a>
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
                            <!--End of table comments-->
                        </div>
                    </div>
                </div>
            </main>
            <!--Foooter-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>