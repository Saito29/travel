<?php include("path.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cube.io">
    <meta name="description" content="Cube.io Edit users">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube.io | Edit Users</title>
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
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                               <div class="alert alert-success" role="alert">
                                                  <strong>User  update successfully!</strong>
                                               </div>
                                               <!---Error Message--->
                                               <div class="alert alert-danger" role="alert">
                                                  <strong>Failed to Update user, Please try again later.</strong>
                                               </div>
                                            </div>
                                         </div>
                                        <form action="#" class="row gx-2 gy-3" autocomplete="on" name="editUser" method="post" enctype="multipart/form-data">
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">First Name:</label>
                                                <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="username" class="form-label">Username:</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="role" class="form-label">Role:</label>
                                                <select name="role" id="role" class="form-select" required>
                                                    <option selected>Select Role </option>
                                                    <option value="">Admin</option>
                                                    <option value="">Sub Admin</option>
                                                    <option value="">Blogger</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="email-address" class="form-label">Email:</label>
                                                <input type="email" class="form-control" name="email-address" placeholder="Email Address" required>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="password" class="form-label">Password:</label>
                                                <input type="password" class="form-control" name="password" minlength="8" id="password" placeholder="Password" required>
                                                <label for="checkPassword" class="form-check-label">Show password</label>
                                                <input type="checkbox" class="form-check-input bg-primary toggle-password" name="password" placeholder="Show password">
                                                <span class="form-text px-2 py-3">Password must be at least minimum of 8 characters long</span>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="profileImage" class="form-label">Profile Image:</label>
                                                <img src="<?php echo BASE_URL.'/asset/images/profile/placeholder.webp'?>" onclick="triggerProfileClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" width="90">
                                                <input type="file" class="d-none" name="profileImage" onchange="displayProfileImage(this)" id="profileImage">
                                            </div>
                                            <div class="mb-2 col-sm-8">
                                                <button type="submit" class="btn btn-outline-success p-2 text-center" name="updateUser">Update Users</button>
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