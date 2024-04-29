<?php include("path.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cube.io">
    <meta name="description" content="Cube.io Manage users">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube.io | Manage Users</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navigation bar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Manage users content -->
            <!--==================== Manage User ==================-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Manage User</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage User</li>
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
                                        <h4 class="card-title">Manage User</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                               <div class="alert alert-success" role="alert">
                                                  <strong>User successfully deleted!</strong>
                                               </div>
                                               <!---Error Message--->
                                               <div class="alert alert-danger" role="alert">
                                                  <strong>User failed to delete, Please try again later.</strong>
                                               </div>
                                            </div>
                                        </div>
                                        <!--==== Search & button ======-->
                                        <div class="container-fluid p-2 mt-3 mb-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_URL.'/add-users.php'?>">
                                                    <button type="button" class="btn btn-outline-primary">Add User</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!--======== End of Search & button ============-->
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="myTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Profile</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>                                                        
                                                        <th>Email Address</th>
                                                        <th>Password</th>
                                                        <th>Role</th>
                                                        <th>Creation Date</th>
                                                        <th>Last Update Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <tr>
                                                        <td clas>1</td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_URL.'/asset/images/profile/hutao_profile.jpg'?>" width="30px" height="30px" alt="User_profile" class="rounded-circle">
                                                        </td>
                                                        <td>Mark Kinnedy</td>
                                                        <td>Anda</td>
                                                        <td>Saito</td>
                                                        <td>saito29@gmail.com</td>
                                                        <td>saito291</td>
                                                        <td>Admin</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_URL.'/edit-user.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td clas>2</td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_URL.'/asset/images/logo/Cube.io.png'?>" width="30px" height="30px" alt="User_profile" class="rounded-circle">
                                                        </td>
                                                        <td>Khrisalyn</td>
                                                        <td>Tolentino</td>
                                                        <td>Khrisa</td>
                                                        <td>krhisalyn@gmail.com</td>
                                                        <td>krhisalyn212</td>
                                                        <td>Admin</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_URL.'/edit-user.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="#deleteUser" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td clas>2</td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_URL.'/asset/images/logo/Cube.io.png'?>" width="30px" height="30px" alt="User_profile" class="rounded-circle">
                                                        </td>
                                                        <td>Gelo</td>
                                                        <td>Eranzo</td>
                                                        <td>Gelo29</td>
                                                        <td>Gelo@gmail.com</td>
                                                        <td>gelo20221</td>
                                                        <td>Admin</td>
                                                        <td>2024-03-02 15:20:12</td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?php echo BASE_URL.'/edit-user.php'?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
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
                            <!--================= End table user section ========================-->
                        </div>
                    </div>
                </div>
            </main>
            <!--Footer-->
            <?php include(ROOT_PATH.'/app/includes/footer.php');?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH.'/app/includes/Scripts.php');?>
</body>
</html>