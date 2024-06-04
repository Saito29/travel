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
    <meta name="description" content="Travel Edit Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Edit Post</title>
    <?php include(ROOT_PATH."/app/includes/header.php")?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main content-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Update Post</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlspecialchars($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Post</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-edit-alt' style='color:#e915ef'></i>Edit Post</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                               <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                                               <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                            </div>
                                        </div>
                                        <form action="edit-post.php" class="row gx-2 gy-3" autocomplete="on" name="editPost" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id)?>">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="title" class="form-label">Post Title:</label>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?php echo htmlspecialchars($title)?>" required>
                                                <p class="text-danger fs-6 px-2">required</p>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Category:</label>
                                                <select name="category" class="form-select" required>
                                                <?php if(!empty($category) && $category == $category):?>
                                                    <option value="<?php echo $category?>" selected>Selected Categories: <?php echo $category?></option>
                                                    <!--Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM category WHERE Is_Active = 1 ORDER BY categName ASC");  
                                                    while($categories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo htmlspecialchars($categories['id']);?>"><?php echo htmlspecialchars($categories['categName']);?></option>
                                                    <?php }?>
                                                    <?php else:?>
                                                    <option value="" selected>Select Categories: </option>
                                                    <!--Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM category WHERE Is_Active = 1 ORDER BY categName ASC");
                                                    while($categories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo htmlspecialchars($categories['id']);?>"><?php echo htmlspecialchars($categories['categName']);?></option>
                                                    <?php }?>
                                                    <?php endif;?>
                                                </select>
                                                <p class="text-danger fs-6 px-2">required</p>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="subCategory" class="form-label">Sub Category:</label>
                                                <select name="subcategory" class="form-select" required>
                                                <?php if(!empty($subcategory) && $subcategory == $subcategory):?>
                                                    <option value="<?php echo $subcategory?>" selected>Selected Sub-Categories: <?php echo $subcategory?></option>
                                                    <!--Sub-Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM subcategory WHERE is_Active = 1 ORDER BY name ASC");
                                                    while($subcategories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo htmlspecialchars($subcategories['id']);?>"><?php echo htmlspecialchars($subcategories['name']);?></option>
                                                    <?php }?>
                                                    <?php else:?>
                                                    <option value="" selected>Select Sub-Categories: </option>
                                                    <!--Sub-Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM subcategory WHERE is_Active = 1 ORDER BY name ASC");
                                                    while($subcategories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo htmlspecialchars($subcategories['id']);?>"><?php echo htmlspecialchars($subcategories['name']);?></option>
                                                    <?php }?>
                                                    <?php endif;?>
                                                </select>
                                                <p class="text-danger fs-6 px-2">required</p>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="status" class="form-label">Status:</label>
                                                <select name="status" class="form-select" required>
                                                    <?php if(!empty($status) && $status == $status):?>
                                                    <option value="<?php echo htmlspecialchars($status);?>" selected>Status: <?php echo htmlspecialchars($status);?></option>                                                    
                                                    <?php else:?>
                                                    <option value="" selected>Status:</option>
                                                    <?php endif;?>
                                                    <option value="published">Published</option>
                                                    <option value="unpublished">Unpublished</option>
                                                </select>
                                                <p class="text-danger fs-6 px-2">required</p>
                                            </div>
                                            <div class="mb-1 col-sm-12">
                                                <label for="description" class="mb-3 form-label">Post description:</label>
                                                <textarea name="description" id="mytextarea" class="form-control mytextarea"><?php echo htmlspecialchars($description);?></textarea>
                                                <p class="text-danger fs-6 px-2">required</p>
                                            </div>
                                            <div class="mb-1 col-md-12 form-group">
                                                <label for="googleWidget" class="form-label">Google Widgets:</label>
                                                <textarea name="googleWidget" id="mytextarea" class="form-control mytextarea"><?php echo htmlspecialchars($googleWidget);?></textarea>
                                                <p class="text-danger fs-6 px-2">required</p>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="image" class="form-label">Feature Image:</label>
                                                <input type="file" class="form-control" name="image" accept="image/*" value="<?php echo htmlspecialchars($postImage);?>" required>
                                                <p class="text-danger fs-6 px-2">required</p>
                                                <img src="<?php echo BASE_URL.'/app/upload/uploadThumbnail/'.$postImage?>" alt="Thumbnail_Post" width="220" height="160">
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <label for="categoryDescription" class="form-label">Post Updated:</label>
                                                <input type="date" class="form-control" name="updated_at" value="<?php echo htmlspecialchars($updated_at);?>" required>
                                                <p class="text-danger fs-6 px-2">required</p>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <button type="submit" class="btn btn-outline-success" name="updatePost">Update</button>
                                                <button type="reset" class="btn btn-outline-danger" name="discard">Discard</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!--FOoter-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>