<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/users.php");

#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    $_SESSION['messages'] = "You need to login.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_URL."/index.php");
    exit(0);
}
if(isset($_SESSION['id']) && $_SESSION['role'] === 'user' || $_SESSION['role'] === 'editor'){
    $_SESSION['messages'] = "You are not authorized to access this page.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_URL."/index.php");
    exit(0);
}
if(isset($_SESSION['id']) && $_SESSION['role'] == 'sub-admin'){
    $_SESSION['messages'] = "You are not authorized to access this page.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_ADMIN."/dashboard.php?trvID=".$_SESSION['id']);
    exit(0);
}
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
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
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
                                        <h4 class="card-title"><i class='bx bxs-group' style='color:#e915ef'></i>Add User</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                               <?php include(ROOT_PATH."/app/helpers/formAlert.php");?>
                                               <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
                                            </div>
                                         </div>
                                        <form action="add-users.php" class="row gx-2 gy-2 form-group" autocomplete="on" name="addUser" method="post" enctype="multipart/form-data">
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">First Name:</label>
                                                <input type="text" class="form-control" name="firstName" value="<?php echo $firstName;?>" placeholder="First Name" >
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="fname" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" name="lastName" value="<?php echo $lastName;?>" placeholder="Last Name" >
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="username" class="form-label">Username:</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $username;?>" placeholder="Username" >
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="role" class="form-label">Role type:</label>
                                                <select name="role" class="form-select form-select-sm">
                                                    <?php if(!isset($_POST['role'])):?>
                                                    <option value="<?php echo $role;?>" selected>Choose type of user</option>
                                                    <?php else:?>
                                                    <option value="<?php echo $role;?>" selected>User type: <?php echo $role;?></option>
                                                    <?php endif;?>
                                                    <option value="admin">Admin User</option>
                                                    <option value="sub-admin">Sub-Admin User</option>
                                                    <option value="editor">Editor User</option>
                                                    <option value="user">Guest User</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="email-address" class="form-label">Email:</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $email;?>" placeholder="Email Address" >
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="password" class="form-label">Password:</label>
                                                <input type="password" class="form-control" name="password" minlength="8" id="password" value="<?php echo $password;?>" placeholder="Password" >
                                                <label for="checkPassword" class="form-check-label">Show password</label>
                                                <input type="checkbox" class="form-check-input bg-primary toggle-password" minlength="8">
                                                <span class="form-text px-2 py-3">Password must be at least minimum of 8 characters,
                                                ['one letter', 'one number'].</span>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="profileImage" class="form-label">Profile Image:</label>
                                                <img src="<?php echo BASE_ADMIN.'/asset/images/profile/placeholder.webp'?>" onclick="triggerProfileClick()" id="profileDisplay" class="rounded-circle d-block border" alt="profile-user" style="cursor:pointer" height="75" width="75">
                                                <input type="file" class="d-none" name="profileImage" onchange="displayProfileImage(this)" id="profileImage" value="<?php echo $profileImage;?>">
                                                <p class="form-text fs-6 py-3">Profile Image should at least 10mb</p>
                                            </div>
                                            <div class="mb-1 col-sm-4">
                                                <label for="created_at" class="form-label">Date Created:</label>
                                                <input type="datetime-local" class="form-control form-control-sm" name="created_at" value="<?php echo $created_at?>">
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