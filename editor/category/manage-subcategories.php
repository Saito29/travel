<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/sub-category.php");

#if session id not login direct to login page
if(!isset($_SESSION['id'])){
    $_SESSION['messages'] = "You need to login.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_URL."/index.php");
    exit(0);
}
if(isset($_SESSION['id']) && $_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin' || $_SESSION['role'] === 'sub-admin'){
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
    <meta name="description" content="Travel Manage Subcategories">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Manage Subcategories</title>
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
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Manage Sub-Categroies</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Sub-Categories</li>
                        </ol>
                    </div>
                </div>
                <!--============================ Manage SUb category body content =========================-->
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!--============ Start Sub category Management ===================-->
                                    <div class="card-body mb-4">
                                        <h4 class="card-title"><i class='bx bxs-box' style='color:#e915ef'></i>Manage Sub-Categories</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!--Alert start here -->
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php")?>
                                                 <!--Alert end here -->
                                            </div>
                                         </div>
                                        <!--==== Add sub category Button ======-->
                                        <div class="container-fluid p-2 mt-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_EDITOR.'/category/add-subcategory.php'?>">
                                                    <button type="button" class="btn btn-outline-primary">Add Sub-Category</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!--============= Table Sub category Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="myTable">
                                            <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>SCID</th>
                                                        <th>Sub-Category Name</th>
                                                        <th>Description</th>
                                                        <th>Created Date</th>
                                                        <th>Last Update Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php
                                                        $subcategory = "SELECT * FROM subcategory WHERE is_Active != '0'";
                                                        $subcategory_run = mysqli_query($conn, $subcategory);
                                                    ?>
                                                    <?php if(mysqli_num_rows($subcategory_run) > 0):?>
                                                        <?php foreach($subcategory_run as $keys => $subcategories):?>
                                                    <tr>
                                                        <td><?php echo htmlentities($keys + 1)?></td>
                                                        <td><?php echo htmlentities($subcategories['name'])?></td>
                                                        <td><?php echo htmlentities($subcategories['description'])?></td>
                                                        <td><?php echo htmlentities($subcategories['created_at'])?></td>
                                                        <td><?php echo htmlentities($subcategories['updated_at'])?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_EDITOR.'/category/edit-subcategories.php?id='?><?php echo htmlentities($subcategories['id'])?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_EDITOR.'/category/manage-subcategories.php?del_id='?><?php echo htmlentities($subcategories['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Sub category Management ========================-->
                                   </div>
                                   <!--============== End of Sub category Management =======================-->

                                   <!--============== Start Deleted Sub category Management ===================-->
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bx-trash' style='color:#ce1337'></i>Deleted Sub-Categories Management</h4>
                                        <hr />
                                    <!--============= Table Sub category Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="DeletedmyTable">
                                            <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>SCID</th>
                                                        <th>Sub-Category Name</th>
                                                        <th>Description</th>
                                                        <th>Posting Date</th>
                                                        <th>Last updation Date</th>                                                        
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php 
                                                        $subcategory = "SELECT * FROM subcategory WHERE is_Active != '1'";
                                                        $subcategory_run = mysqli_query($conn, $subcategory);
                                                    ?>

                                                    <?php if(mysqli_num_rows($subcategory_run) > 0):?>
                                                        <?php foreach($subcategory_run as $keys => $subcategories):?>
                                                    <tr>
                                                        <td><?php echo htmlentities($keys + 1)?></td>
                                                        <td><?php echo htmlentities($subcategories['name'])?></td>
                                                        <td><?php echo htmlentities($subcategories['description'])?></td>
                                                        <td><?php echo htmlentities($subcategories['created_at'])?></td>
                                                        <td><?php echo htmlentities($subcategories['updated_at'])?></td>
                                                        <td>
                                                            <a href="<?php echo BASE_EDITOR.'/category/manage-subcategories.php?id_rec='?><?php echo htmlentities($subcategories['id'])?>" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="<?php echo BASE_EDITOR.'/category/manage-subcategories.php?id_del='?><?php echo htmlentities($subcategories['id'])?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Sub category Management ========================-->
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
    <!--scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>