<?php
include("../path.php");
include(ROOT_PATH."/app/controllers/sub-category.php");

#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    header("Location: ".BASE_URL."/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Manage Sub-categories">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Manage Sub-categories</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--==================== Manage Sub category ==================-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Manage Sub-Categroies</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
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
                                        <h4 class="card-title">Manage Sub-Categories</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                 <!--Alert start here -->
                                                 <?php include(ROOT_PATH."/app/helpers/updateAlert.php")?>
                                                 <!--Alert end here -->
                                            </div>
                                        </div>
                                        <!--==== Add sub category Button ======-->
                                        <div class="container-fluid p-2 mt-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_ADMIN.'/category/add-subcategory.php'?>">
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
                                                        <th>#</th>
                                                        <th>Category Name</th>
                                                        <th>Sub Category Name</th>
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
                                                        <td><?php echo $keys + 1?></td>
                                                        <td><?php echo $subcategories['categName']?></td>
                                                        <td><?php echo $subcategories['name']?></td>
                                                        <td><?php echo $subcategories['description']?></td>
                                                        <td><?php echo $subcategories['created_at']?></td>
                                                        <td><?php echo $subcategories['updated_at']?></td>
                                                        <td>
                                                            <a href="edit-subcategories.php?id=<?php echo $subcategories['id']?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="manage-subcategories.php?del_id=<?php echo $subcategories['id']?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
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
                                        <h4 class="card-title"><i class='bx bx-trash'></i>Deleted Sub-Categories Management</h4>
                                        <hr />
                                        <!--============= Table Sub category Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="DeletedmyTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category</th>
                                                        <th>Sub Category</th>
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
                                                        <td><?php echo $keys + 1?></td>
                                                        <td><?php echo $subcategories['categoryName']?></td>
                                                        <td><?php echo $subcategories['name']?></td>
                                                        <td><?php echo $subcategories['description']?></td>
                                                        <td><?php echo $subcategories['created_at']?></td>
                                                        <td><?php echo $subcategories['updated_at']?></td>
                                                        <td>
                                                            <a href="manage-subcategories.php?id_rec=<?php echo $subcategories['id']?>" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="manage-subcategories.php?id_del=<?php echo $subcategories['id']?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
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