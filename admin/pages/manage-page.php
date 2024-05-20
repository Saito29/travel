<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/page.php");

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
    <meta name="description" content="Travel Manage Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Manage Page</title>
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
                        <h3 class="fw-bold fs-4 mb-3">Manage Page</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role']);?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Page</li>
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
                                        <h4 class="card-title"><i class='bx bxs-box' style='color:#e915ef'></i>Manage Page</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php")?>
                                            </div>
                                        </div>
                                        <!--==== Search & button ======-->
                                        <div class="container-fluid p-2 mt-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_ADMIN.'/pages/aboutpage.php'?>">
                                                    <button type="button" class="btn btn-outline-primary">Add Page</button>
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
                                                        <th>PGID</th>
                                                        <th>Title</th>
                                                        <th>Created Date</th>
                                                        <th>Last updation Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php foreach ($page as $keys => $pages):?>
                                                    <tr>
                                                        <td><?Php echo htmlentities($keys + 1);?></td>
                                                        <td><?php echo htmlentities($pages['title']);?></td>
                                                        <td><?php echo htmlentities($pages['created_at']);?></td>
                                                        <td><?php echo htmlentities($pages['updated_at']);?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/pages/edit-page.php?pg_Id='?><?php echo htmlentities($pages['id']);?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_ADMIN.'/pages/manage-page.php?pgDel_id='?><?php echo htmlentities($pages['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                        <?php endforeach; ?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Category Management ========================-->
                                   </div>
                                   <!--================== End of Manage Category ========================-->
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