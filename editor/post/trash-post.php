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
    <meta name="description" content="Travel Trash Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Trash Post</title>
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
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Trash Post</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlspecialchars($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trash Post</li>
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
                                        <h4 class="card-title"><i class='bx bx-trash' style='color:#ce1337'></i>Trash Post</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                               <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                            </div>
                                         </div>
                                        <!--============= Table User Management  ===============-->
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
                                                        // Join tables to fetch post details with category, subcategory, and user information

                                                        #Loggin user 
                                                        $loggedInUserId = $_SESSION['id'];

                                                        #Query posts
                                                        $sql = "SELECT p.*, u.username AS postedBy, c.categName AS categoryName, sc.name AS subcategoryName
                                                        FROM post p
                                                        INNER JOIN category c ON p.category = c.id
                                                        INNER JOIN subcategory sc ON p.subcategory = sc.id
                                                        INNER JOIN users u ON p.postedBy = u.id
                                                        WHERE p.is_Active = 0
                                                        AND postedBy = $loggedInUserId";

                                                        // Prepare the statement (optional for extra security)
                                                        #$stmt = mysqli_prepare($conn, $sql);

                                                        // Execute the query (without prepared statement for simplicity)
                                                        $post_run = mysqli_query($conn, $sql);

                                                        // Check if results are available
                                                        if (mysqli_num_rows($post_run) > 0) {
                                                            while ($posts = mysqli_fetch_assoc($post_run)) {
                                                                echo "<tr>";
                                                                echo "<td>", htmlspecialchars($posts['id'] + 1), "</td>";
                                                                echo "<td>", htmlspecialchars($posts['postedBy']), "</td>"; 
                                                                echo "<td>", htmlspecialchars($posts['title']), "</td>";
                                                                echo "<td>", htmlspecialchars($posts['categoryName']), "</td>"; 
                                                                echo "<td>", htmlspecialchars($posts['subcategoryName']), "</td>"; 
                                                                echo "<td class='text-danger'>", htmlspecialchars($posts['status']), "</td>";
                                                                echo "<td>", htmlspecialchars($posts['created_at']), "</td>";
                                                                echo "<td>", htmlspecialchars($posts['updated_at']), "</td>";
                                                                echo "<td>";
                                                                echo "<a href='" . BASE_EDITOR . "/post/trash-post.php?recPS_ID=" . htmlspecialchars($posts['id']) . "' class='btn btn-outline-success'><i class='bx bx-redo'></i></a>";
                                                                echo "&nbsp;";
                                                                echo "<a href='" . BASE_EDITOR . "/post/trash-post.php?delPS_ID=" . htmlspecialchars($posts['id']) . "' class='btn btn-outline-danger m-1'><i class='bx bx-trash-alt' ></i></a>";
                                                                echo "</td>";
                                                                echo "</tr>";
                                                            }
                                                        }else{
                                                            echo "<p class='found' style='font-size: 16px'>No trash post found</p>";
                                                        }
                                                        // Close connection
                                                        mysqli_close($conn);
                                                    ?>
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
            <!--Footer-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scscripts.php");?>
</body>
</html>