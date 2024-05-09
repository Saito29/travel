<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/users.php");

#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    header("Location: ".BASE_URL."/index.php");
}
if(isset($_SESSION['id']) && $_SESSION['role'] == 'sub-admin'){
    header("Location: ".BASE_ADMIN."/dashboard.php?trvID=".$_SESSION['id']);
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
    <meta name="description" content="Travel Edit users">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Edit Users</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar -->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Edit User</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit User</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <!--Alert start-->
                                                <?php include(ROOT_PATH."/app/helpers/formAlert.php");?>
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
                                                <!--Alert end-->
                                            </div>
                                         </div>
                                        <form action="edit-user.php" class="row gx-2 gy-2" autocomplete="on" name="editUser" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $id?>">
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">First Name:</label>
                                                <input type="text" class="form-control" name="firstName" value="<?php echo $firstName?>" placeholder="First Name" >
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" name="lastName" value="<?php echo $lastName?>" placeholder="Last Name">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="username" class="form-label">Username:</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $username?>" placeholder="Username">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="role" class="form-label">Role type:</label>
                                                <select name="role" class="form-select form-select-sm">
                                                    <option value="<?php echo $role?>" selected><?php echo $role?></option>
                                                    <option value="admin">Admin User</option>
                                                    <option value="sub-admin">Sub-Admin User</option>
                                                    <option value="editor">Editor User</option>
                                                    <option value="user">Guest User</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="email-address" class="form-label">Email:</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $email?>" placeholder="Email Address" >
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label class="form-label" for="password">Password:</label>
                                                <input type="password" class="form-control" name="password" minlength="8" id="password" value="<?php echo $password?>"  placeholder="Password" >
                                                <label for="checkPassword" class="form-check-label">Show password</label>
                                                <input type="checkbox" class="form-check-input bg-primary toggle-password">
                                                <span class="form-text px-2 py-3">Password must be at least minimum of 8 characters long</span>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="profileImage" class="form-label">Profile Image:</label>
                                                <?php if(isset($_GET['id'])):?>
                                                <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'?><?php echo $profileImage?>" onclick="triggerProfileClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" height="75" width="75">
                                                <?php elseif(empty(!isset($_GET['id']))):?>
                                                <img src="<?php echo BASE_URL.'/asset/img/profile/placeholder.webp'?>" onclick="triggerProfileClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" height="75" width="75">
                                                <?php endif;?>
                                                <input type="file" class="d-none" name="profileImage" onchange="displayProfileImage(this)" id="profileImage">
                                                <p class="form-text fs-6 py-3">Profile Image should at least 10mb</p>
                                            </div>
                                            <div class="mb-1 col-sm-4">
                                                <label for="updated_at" class="form-label">Date Updated:</label>
                                                <input type="datetime-local" class="form-control form-control-sm" name="updated_at" value="<?php echo $updated_at?>">
                                            </div>
                                            <div class="mb-2 col-sm-8">
                                                <button type="submit" class="btn btn-outline-success p-2 text-center" name="updateUser-btn">Update Users</button>
                                            </div>
                                        </form>
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
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>