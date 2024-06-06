<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/category.php");

#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    $_SESSION['messages'] = "You need to login.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_URL."/index.php");
    exit(0);
}
if(isset($_SESSION['id']) && $_SESSION['role'] === 'user' || $_SESSION['role'] === 'editor'){
    $_SESSION['messages'] = "You are not authorized to access this page.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_URL."/index.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Manage Category">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Manage Category</title>
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
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlspecialchars($_SESSION['role']);?></a></li>
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
                                        <h4 class="card-title"><i class='bx bxs-box' style='color:#e915ef'></i>Manage Categories</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php")?>
                                            </div>
                                        </div>
                                        <!--==== Search & button ======-->
                                        <div class="container-fluid p-2 mt-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_ADMIN.'/category/add-category.php'?>">
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
                                                        <th>CID</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Created Date</th>
                                                        <th>Last updation Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php
                                                        $category = "SELECT * FROM category WHERE Is_Active != '0'";
                                                        $category_run = mysqli_query($conn, $category);
                                                    ?>
                                                    <?php if(mysqli_num_rows($category_run) > 0):?>
                                                        <?php foreach ($category_run as $keys => $categories):?>
                                                    <tr>
                                                        <td><?Php echo htmlspecialchars($keys + 1);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categName']);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categDesc']);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categCreated_at']);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categUpt_at']);?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/category/edit-category.php?id='?><?php echo htmlspecialchars($categories['id']);?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_ADMIN.'/category/manage-category.php?del_id='?><?php echo htmlspecialchars($categories['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif;?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Category Management ========================-->
                                   </div>
                                   <!--================== End of Manage Category ========================-->

                                   <!--================= Deleted Manage Category Start here ==================-->
                                   <div class="card-body">
                                        <h4 class="card-title"><i class='bx bx-trash' style='color:#ce1337'></i>Deleted Categories</h4>
                                        <hr />
                                        <!--============= Table Category Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="DeletedmyTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Created Date</th>
                                                        <th>Last updation Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php 
                                                        $category = "SELECT * FROM category WHERE Is_Active != '1'";
                                                        $category_run = mysqli_query($conn, $category);
                                                    ?>

                                                    <?php if(mysqli_num_rows($category_run) > 0):?>
                                                        <?php foreach($category_run as $keys => $categories):?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($keys + 1);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categName']);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categDesc']);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categCreated_at']);?></td>
                                                        <td><?php echo htmlspecialchars($categories['categUpt_at']);?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/category/manage-category.php?id_rec='?><?php echo htmlspecialchars($categories['id']);?>" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_ADMIN.'/category/manage-category.php?id_del='?><?php echo htmlspecialchars($categories['id']);?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--=========================== End of Table Category Management ========================-->
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
    <?php include(ROOT_PATH.'/app/includes/scscripts.php');?>
</body>
</html>