<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/sub-category.php");

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
    <meta name="description" content="Travel Add Sub-category">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Add Sub-category</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main content Add sub-category-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Add Sub-Category</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlspecialchars($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Sub-Category</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-category' style='color:#e915ef'></i>Add Sub-Category</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <!--Alert Start Here -->
                                                <?php include(ROOT_PATH."/app/helpers/formAlert.php");?>
                                                <?php include(ROOT_PATH."/app/helpers/updateAlert.php");?>
                                                <!--Alert End Here -->
                                            </div>
                                         </div>
                                        <form action="add-subcategory.php" class="row gx-2 gy-3" autocomplete="on" name="addUser" method="post" enctype="application/x-www-form-urlencoded">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="name" class="form-label">Sub-Category:</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name)?>" placeholder="Sub-Category Name">
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="description" class="form-label">Sub-Category Description:</label>
                                                <textarea name="description" class="form-control" rows="4" placeholder="Sub-Category Description"><?php echo htmlspecialchars($description)?></textarea>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <label for="created_at" class="form-label">Sub-Category Created:</label>
                                                <input type="datetime-local" name="created_at" class="form-control form-control-sm" value="<?php echo htmlspecialchars($created_at)?>">
                                            </div>
                                            <div class="mb-2 col-md-12 form-group">
                                                <button type="submit" class="btn btn-outline-primary" name="addSubCateg-btn">Add Sub-Category</button>
                                                <button type="reset" class="btn btn-outline-danger" name="discardCategory-btn">Discard Sub-Category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--footer-->
            <?php include(ROOT_PATH."/app/includes/footer.php"); ?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scscripts.php");?>
</body>
</html>
