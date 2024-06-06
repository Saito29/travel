<?php 
include("../path.php");
include(ROOT_PATH.'/app/controllers/comment.php');

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
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlspecialchars($_SESSION['role'])?></a></li>
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
                                        <h4 class="card-title"><i class='bx bxs-check-square' style='color:#e915ef'></i>Manage Approved Comments</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                               <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                            </div>
                                         </div>
                                        <!--============= Table User Management  ===============-->
                                        <div class="table-responsive-sm p-2">
                                            <table class="table table-responsive-sm table-bordered d-table-cell" style="width: 100%" id="myTable">
                                                <!--============ Table Header ================-->
                                                <thead>
                                                    <tr>
                                                        <th>CMID</th>
                                                        <th>Name</th>
                                                        <th>Email Address</th>
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
                                                <?php
                                                    $sql = "SELECT c.*, p.title AS title 
                                                            FROM comments c
                                                            INNER JOIN post AS p ON c.post_id = p.id
                                                            WHERE c.status = 1";
                                                    $stmt = $conn->query($sql);

                                                    while ($row = mysqli_fetch_assoc($stmt)) {
                                                        echo "<tr>
                                                            <td>" . htmlspecialchars($row['id']) . "</td>
                                                            <td>" . htmlspecialchars($row['username']) . "</td>
                                                            <td>" . htmlspecialchars($row['email']) . "</td>
                                                            <td style='font-size: 12px'>" . htmlspecialchars_decode($row['comments']) . "</td>
                                                            <td class='text-success'>" . htmlspecialchars($row['status']) . 
                                                                ( $row['status'] == 1 ? "approved" : "disapproved" ) . 
                                                            "</td>
                                                            <td>" . htmlspecialchars($row['title']) . "</td>
                                                            <td>" . htmlspecialchars(date("Fj Y | h:i:a", strtotime($row['created_at']))) . "</td>
                                                            <td>
                                                                <a href='" . BASE_ADMIN . "/comments/disapproved-comment.php?dm_Id=" . htmlspecialchars($row['id']) . "' class='btn btn-outline-primary m-1' data-bs-toggle='tooltip' data-bs-title='disapproved comment'><i class='bx bx-redo'></i></a>
                                                                &nbsp;
                                                                <a href='" . BASE_ADMIN . "/comments/approved-comments.php?del_id=" . htmlspecialchars($row['id']) . "' class='btn btn-outline-danger m-1' data-bs-toggle='tooltip' data-bs-title='permanent delete comment'><i class='bx bx-trash-alt'></i></a>
                                                            </td>
                                                        </tr>";
                                                    }

                                                    if (mysqli_num_rows($stmt) == 0) {
                                                        echo '<p class="found" style="font-size: 16px">No approved comments found.</p>';
                                                    }

                                                    mysqli_close($conn); // Assuming you have a connection close statement
                                                ?>
                                                    <!--============= End of Table Data ===============-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--=========================== End of Table User Management ========================-->
                                   </div>
                                </div>
                            </div>
                            <!--End of table comments-->
                        </div>
                    </div>
                </div>
            </main>
            <!--Foooter-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scscripts.php");?>
</body>
</html>