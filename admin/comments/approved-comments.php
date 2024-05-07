<?php 
include("../path.php");

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
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
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
                                        <h4 class="card-title">Manage Approved Comments</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                               <div class="alert alert-success" role="alert">
                                                  <strong>Well done comment has been Disapproved!</strong>
                                               </div>
                                               <!---Error Message--->
                                               <div class="alert alert-danger" role="alert">
                                                  <strong>The comment was deleted Permanently!</strong>
                                               </div>
                                            </div>
                                         </div>
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive-sm p-2">
                                            <table class="table table-responsive-sm table-bordered d-table-cell" style="width: 100%" id="myTable">
                                                <!--============ Table Header ================-->
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email Id</th>
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Mark Kinnedy</td>
                                                        <td>saito29@gmail.com</td>
                                                        <td>The content was very informative.</td>
                                                        <td class="text-success">Approved</td>
                                                        <td>Travel and Tour</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td>
                                                            <a href="#disapprove" class="btn btn-outline-primary m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt'></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Mark Kinnedy</td>
                                                        <td>saito29@gmail.com</td>
                                                        <td>The content was very informative</td>
                                                        <td class="text-success">Approved</td>
                                                        <td>SQL Basic Fundamental</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td>
                                                            <a href="#disapprove" class="btn btn-outline-primary m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Mark Kinnedy</td>
                                                        <td>saito29@gmail.com</td>
                                                        <td>The content was very informative</td>
                                                        <td class="text-success">Approved</td>
                                                        <td>Tech Hacks part 3</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td>
                                                            <a href="#disapprove" class="btn btn-outline-primary m-1"><i class='bx bx-redo'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
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
            <!--Foooter-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>