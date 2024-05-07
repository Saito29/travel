<?php 
include("../path.php");
include(ROOT_PATH."/app/controller/user.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Manage users">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Manage Users</title>
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
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
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
                                            <div class="col-sm-12 col-md-12">
                                               <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
                                            </div>
                                        </div>
                                        <!--==== Search & button ======-->
                                        <div class="container-fluid p-2 mt-3 mb-3">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_ADMIN.'/users/add-users.php'?>">
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
                                                    <?php foreach($user as $key => $users): ?> 
                                                    <tr>
                                                        <td><?php echo $key + 1?></td>
                                                        <td class="tb-image">
                                                            <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'?><?php echo $users['profileImage']?>" width="32" height="32" alt="User_profile" class="rounded-circle">
                                                        </td>
                                                        <td><?php echo $users['firstName']?></td>
                                                        <td><?php echo $users['lastName']?></td>
                                                        <td><?php echo $users['username']?></td>
                                                        <td><?php echo $users['email']?></td>
                                                        <td class="text-break"><?php echo $users['password']?></td>
                                                        <td><?php echo $users['role']?></td>
                                                        <td class="text-truncate"><?php echo $users['created_at']?></td>
                                                        <td class="text-truncate"><?php echo $users['updated_at']?></td>
                                                        <td>
                                                            <a href="edit-user.php?id=<?php echo $users['id']?>" class="btn btn-outline-primary m-1"><i class='bx bx-edit'></i></a>
                                                            &nbsp;
                                                            <a href="manage-user.php?del_id=<?php echo $users['id']?>" class="btn btn-outline-danger m-1"><i class='bx bx-trash-alt' ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
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