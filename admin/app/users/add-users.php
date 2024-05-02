<?php 
include("../../path.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Add users">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Add Users</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>

<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navigation bar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!-- Main add users content-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Add User</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <h4 class="card-title">Add User</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 col-md-8">
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
                                        <form action="#" class="row gx-2 gy-3 form-group" autocomplete="on" name="addUser" method="post" enctype="multipart/form-data">
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">First Name:</label>
                                                <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="username" class="form-label">Username:</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="role" class="form-label">Role type:</label>
                                                <select name="role" class="form-select form-select-sm">
                                                    <option value="" selected>Choose type of user</option>
                                                    <option value="admin">Admin User</option>
                                                    <option value="sub-admin">Sub-Admin User</option>
                                                    <option value="editor">Editor User</option>
                                                    <option value="user">Guest User</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="email-address" class="form-label">Email:</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="password" class="form-label">Password:</label>
                                                <input type="password" class="form-control" name="password" minlength="8" id="password" placeholder="Password" required>
                                                <label for="checkPassword" class="form-check-label">Show password</label>
                                                <input type="checkbox" class="form-check-input bg-primary toggle-password" minlength="8" name="password" placeholder="Show password">
                                                <span class="form-text px-2 py-3">Password must be at least minimum of 8 characters long</span>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="profileImage" class="form-label">Profile Image:</label>
                                                <img src="<?php echo BASE_ADMIN.'/asset/images/profile/placeholder.webp'?>" onclick="triggerProfileClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" width="75">
                                                <input type="file" class="d-none" name="profileImage" onchange="displayProfileImage(this)" id="profileImage">
                                            </div>
                                            <div class="mb-2 col-sm-8">
                                                <button type="submit" class="btn btn-outline-primary" name="addUser-btn">Add Users</button>
                                                <button type="reset" class="btn btn-outline-danger" name="resetUser-btn">Discard Users</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--End of Main Add user content-->
            <?php include(ROOT_PATH.'/app/includes/footer.php');?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH.'/app/includes/scripts.php');?>
</body>
</html>