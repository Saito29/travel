<?php 
include("../../path.php");
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
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                                            <div class="col-sm-6">
                                                 <!---Success Message--->  
                                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show w-100" role="alert">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
                                                        <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path>
                                                    </svg>
                                                    <strong>User Successfully Added!</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <!---Error Message--->
                                                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show w-100" role="alert">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                                                        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path>
                                                    </svg>
                                                    <strong>Failed to add user!</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--==== Add sub category Button ======-->
                                        <div class="container-fluid p-2 mt-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_ADMIN.'/app/category/add-subcategory.php'?>">
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Travel and Tour</td>
                                                        <td>Hiking Mountains</td>
                                                        <td>Blogging about Hiking in Mountains</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/app/category/edit-subcategories.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Programming Related</td>
                                                        <td>Tutorial</td>
                                                        <td>Tutorial Video about PL(Programming Languages)</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/app/category/edit-subcategories.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Entertainment</td>
                                                        <td>Stress Relief</td>
                                                        <td>Funny compilations video</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_ADMIN.'/app/category/edit-subcategories.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Travel and Tour</td>
                                                        <td>Hiking Mountains</td>
                                                        <td>Blogging about Hiking in Mountains</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="#redo" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Programming Related</td>
                                                        <td>Tutorial</td>
                                                        <td>Tutorial Video about PL(Programming Languages)</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="#redo" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Entertainment</td>
                                                        <td>Stress Relief</td>
                                                        <td>Funny compilations video</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="#redo" class="btn btn-outline-success m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
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