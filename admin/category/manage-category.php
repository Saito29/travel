<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/category.php");

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
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
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
                                        <h4 class="card-title">Manage Categories</h4>
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
                                                        <td><?Php echo $keys + 1; ?></td>
                                                        <td><?php echo $categories['categName'];?></td>
                                                        <td><?php echo $categories['categDesc'];?></td>
                                                        <td><?php echo $categories['categCreated_at'];?></td>
                                                        <td><?php echo $categories['categUpt_at'];?></td>
                                                        <td>
                                                            <a href="edit-category.php?id=<?php echo $categories['id'];?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="manage-category.php?del_id=<?php echo $categories['id']?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
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
                                        <h4 class="card-title"><i class='bx bx-trash'></i>Deleted Categories</h4>
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
                                                        <td><?php echo $keys + 1?></td>
                                                        <td><?php echo $categories['categName']?></td>
                                                        <td><?php echo $categories['categDesc']?></td>
                                                        <td><?php echo $categories['categCreated_at']?></td>
                                                        <td><?php echo $categories['categUpt_at']?></td>
                                                        <td>
                                                            <a href="manage-category.php?id_rec=<?php echo $categories['id']?>" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="manage-category.php?id_del=<?php echo $categories['id']?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Category Management ========================-->
                                    </div>
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