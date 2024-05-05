<?php 
include("path.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Profile">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Profile</title>
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
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">User Profile</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit User Profile</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                                <!--Messages Alert -->
                                                
                                               <!--End of message-->
                                            </div>
                                         </div>
                                        <form action="profile.php" class="row gx-2 gy-3" name="editUser" method="post" autocomplete="on" enctype="multipart/form-data">
                                            <input type="hidden" name="updated_at" value="">
                                            <div class="mb-1 col-sm-6">
                                                <label for="firstName" class="form-label">First Name:</label>
                                                <input type="text" class="form-control" name="firstName"  placeholder="First Name">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="lastName" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="username" class="form-label">Username:</label>
                                                <input type="text" class="form-control" name="username"  placeholder="Username">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="email" class="form-label">Email:</label>
                                                <input type="email" class="form-control" name="email"  placeholder="Email Address">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="profileImage" class="form-label">Profile Image:</label>
                                                <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'?>" onclick="triggerProfileClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" width="75">
                                                <input type="file" class="d-none" name="profileImage" onchange="displayProfileImage(this)" id="profileImage">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="password" class="form-label">Change Password:</label>
                                                <a href="<?php echo BASE_URL_LINKS.'/Changepassword.php'?>" class="link-success">Change password</a>
                                            </div>
                                            <div class="mb-2 col-sm-8">
                                                <button type="submit" class="btn btn-outline-success p-2 text-center" name="uptProfile-btn">Update Profile</button>
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