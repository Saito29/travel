<?php 
include("../path.php");
include(ROOT_PATH.'/app/controllers/posts.php');


#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    $_SESSION['messages'] = "You need to login.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_URL."/index.php");
    exit(0);
}
if(isset($_SESSION['id']) && $_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin' || $_SESSION['role'] === 'sub-admin'){
    $_SESSION['messages'] = "You are not authorized to access this page.";
    $_SESSION['css_class'] = "alert-danger";
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header("Location: ".BASE_URL."/index.php");
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="Travel Add Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Add Post</title>
    <?php include(ROOT_PATH."/app/includes/header.php")?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main content-->
            <!--==================== Manage User ==================-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Post Management</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post Management</li>
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
                                        <h4 class="card-title"><i class='bx bxs-archive' style='color:#e915ef'></i>Management Post</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <a href="<?php echo BASE_EDITOR.'/post/add-post.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>">
                                                    <button type="button" class="btn btn-outline-primary">Add Post</button>
                                                </a>
                                            </div>
                                            <div class="col-sm-12">
                                               <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                            </div>
                                         </div>
                                        <!--============= Table User Post Management  ===============-->
                                        <div class="table-responsive p-2">
                                        <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="myTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>PSID</th>
                                                        <th>Posted by</th>
                                                        <th>Post Title</th>
                                                        <th>Category</th>
                                                        <th>Sub-Category</th>
                                                        <th>Status</th>
                                                        <th>Post Created</th>                                                        
                                                        <th>Post Updated</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php
                                                        // Escape the session username to prevent SQL injection
                                                        $username = mysqli_real_escape_string($conn, $_SESSION['username']);

                                                        # Construct the prepared statement (recommended for security)
                                                        $sql = "SELECT p.*, u.username, u.profileImage, c.categName, sc.name
                                                                FROM post AS p
                                                                JOIN users AS u ON p.postedBy = u.id
                                                                JOIN category AS c ON p.category = c.id
                                                                JOIN subcategory AS sc ON p.subcategory = sc.id
                                                                WHERE p.postedBy = ? AND p.status = 'published' AND p.is_Active = 1";

                                                        # Prepare the statement
                                                        $stmt = mysqli_prepare($conn, $sql);

                                                        # Bind the parameters (improve security against SQL injection)
                                                        mysqli_stmt_bind_param($stmt, "s", $username); // Assuming active status is 1

                                                        # Execute the statement
                                                        mysqli_stmt_execute($stmt);

                                                        $result = $stmt->get_result(); // Get the results

                                                        // Error handling (example)
                                                        if (!$stmt->execute()) {
                                                        echo "Error fetching posts: " . mysqli_stmt_error($stmt);
                                                        } else if (mysqli_num_rows($result) == 0) {
                                                        echo "No published posts found.";
                                                        } else {
                                                            // Display the posts
                                                            while ($posts = $result->fetch_assoc()) {
                                                                echo '<tr>';
                                                                echo '<td>' . htmlentities($posts['id']) . '</td>'; // Assuming you want to display the post ID
                                                                echo '<td>' . htmlentities($posts['username']) . '</td>';
                                                                echo '<td class="text-break">' . htmlentities($posts['title']) . '</td>';
                                                                echo '<td>' . htmlentities($posts['categName']) . '</td>';
                                                                echo '<td>' . htmlentities($posts['subcategoryName']) . '</td>';
                                                                echo '<td class="text-success">' . htmlentities($posts['status']) . '</td>';
                                                                echo '<td>' . date('F j, Y', strtotime($posts['created_at'])) . '</td>';
                                                                echo '<td>' . date('F j, Y', strtotime($posts['updated_at'])) . '</td>';
                                                                echo '<td class="text-break">';
                                                                echo '<a href="' . BASE_EDITOR . '/post/edit-post.php?psID=' . htmlentities($posts['id']) . '" class="btn btn-outline-primary m-1"><i class=\'bx bx-edit\'></i></a>';
                                                                echo '&nbsp;';
                                                                echo '<a href="' . BASE_EDITOR . '/post/manage-post.php?delArcPS_ID=' . htmlentities($posts['id']) . '" class="btn btn-outline-danger m-1"><i class=\'bx bx-trash-alt\' ></i></a>';
                                                                echo '</td>';
                                                                echo '</tr>';
                                                            }
                                                        }

                                                        // Close resources
                                                        mysqli_stmt_close($stmt);
                                                        mysqli_free_result($result);
                                                    ?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Post Management ========================-->
                                   </div>
                                </div>
                            </div>
                            <!--End of Post Management-->
                            <!--Unpublished Post Management -->
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-message-alt-edit' style='color:#ce1337'></i>Unpublished Management</h4>
                                        <hr />
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive p-2">
                                            <table class="table m-0 table-responsive-md table-bordered" style="width: 100%;" id="DeletedmyTable">
                                                <thead>
                                                    <!--============ Table Header ================-->
                                                    <tr>
                                                        <th>PSID</th>
                                                        <th>Posted by</th>
                                                        <th>Post Title</th>
                                                        <th>Category</th>
                                                        <th>Sub-Category</th>
                                                        <th>Status</th>
                                                        <th>Post Created</th>                                                        
                                                        <th>Post Updated</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <!--========== End of Table header ================-->
                                                <tbody>
                                                    <!--========= Table Data =====================-->
                                                    <?php
                                                        // Escape the session username to prevent SQL injection
                                                        $username = mysqli_real_escape_string($conn, $_SESSION['username']);

                                                        # Construct the prepared statement (recommended for security)
                                                        $sql = "SELECT p.*, u.username, u.profileImage, c.categName, sc.name
                                                                FROM post AS p
                                                                JOIN users AS u ON p.postedBy = u.id
                                                                JOIN category AS c ON p.category = c.id
                                                                JOIN subcategory AS sc ON p.subcategory = sc.id
                                                                WHERE p.postedBy = ? AND p.status = 'unpublished' AND p.is_Active = 1";

                                                        # Prepare the statement
                                                        $stmt = mysqli_prepare($conn, $sql);

                                                        # Bind the parameters (improve security against SQL injection)
                                                        mysqli_stmt_bind_param($stmt, "s", $username); // Assuming active status is 1

                                                        # Execute the statement
                                                        mysqli_stmt_execute($stmt);

                                                        $result = $stmt->get_result(); // Get the results

                                                        // Error handling (example)
                                                        if (!$stmt->execute()) {
                                                        echo "Error fetching posts: " . mysqli_stmt_error($stmt);
                                                        } else if (mysqli_num_rows($result) == 0) {
                                                        echo "No unpublished posts found.";
                                                        } else {
                                                            // Display the posts
                                                            while ($posts = $result->fetch_assoc()) {
                                                                echo '<tr>';
                                                                echo '<td>' . htmlentities($posts['id']) . '</td>'; // Assuming you want to display the post ID
                                                                echo '<td>' . htmlentities($posts['username']) . '</td>';
                                                                echo '<td class="text-break">' . htmlentities($posts['title']) . '</td>';
                                                                echo '<td>' . htmlentities($posts['categName']) . '</td>';
                                                                echo '<td>' . htmlentities($posts['subcategoryName']) . '</td>';
                                                                echo '<td class="text-success">' . htmlentities($posts['status']) . '</td>';
                                                                echo '<td>' . date('F j, Y', strtotime($posts['created_at'])) . '</td>';
                                                                echo '<td>' . date('F j, Y', strtotime($posts['updated_at'])) . '</td>';
                                                                echo '<td class="text-break">';
                                                                echo '<a href="' . BASE_EDITOR . '/post/edit-post.php?psID=' . htmlentities($posts['id']) . '" class="btn btn-outline-primary m-1"><i class=\'bx bx-edit\'></i></a>';
                                                                echo '&nbsp;';
                                                                echo '<a href="' . BASE_EDITOR . '/post/manage-post.php?delArcPS_ID=' . htmlentities($posts['id']) . '" class="btn btn-outline-danger m-1"><i class=\'bx bx-trash-alt\' ></i></a>';
                                                                echo '</td>';
                                                                echo '</tr>';
                                                            }
                                                        }

                                                        // Close resources
                                                        mysqli_stmt_close($stmt);
                                                        mysqli_free_result($result);
                                                    ?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table Post Management ========================-->
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