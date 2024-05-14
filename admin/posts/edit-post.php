<?php 
include("../path.php");
include(ROOT_PATH."/app/controllers/posts.php");

#if session id not login direct to home page
if(!isset($_SESSION['id'])){
    header("Location: ".BASE_URL."/index.php");
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
    <meta name="description" content="Travel Add Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | Add Post</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
    <!--Summernote BS4-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Add Post</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['role']?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Post</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Post</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-12">
                                               <!--Alert start-->
                                                <?php #include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                                                <?php #include(ROOT_PATH.'/app/helpers/messageAlert.php');?>
                                               <!--Alert end-->
                                            </div>
                                         </div>
                                         <form action="edit-post.php" class="row gx-2 gy-3" autocomplete="on" name="addPost" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']?>">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="title" class="form-label">Post Title:</label>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Category:</label>
                                                <select name="category" class="form-select">
                                                <?php if(!isset($_POST['category'])):?>
                                                    <option value="" selected>Select Categories: </option>
                                                    <!--Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM category WHERE Is_Active = 1 ORDER BY categName");
                                                    while($categories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $categories['categName'];?>"><?php echo $categories['categName'];?></option>
                                                    <?php }?>
                                                    <?php else:?>
                                                    <option value="<?php echo $category?>" selected>Selected Categories: <?php echo $category?></option>
                                                    <!--Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM category WHERE Is_Active = 1 ORDER BY categName ASC");  
                                                    while($categories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $categories['categName'];?>"><?php echo $categories['categName'];?></option>
                                                    <?php }?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="subCategory" class="form-label">Sub Category:</label>
                                                <select name="subcategory" class="form-select">
                                                <?php if(!isset($_POST['subcategory'])):?>
                                                    <option value="" selected>Select Sub-Categories: </option>
                                                    <!--Sub-Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM subcategory WHERE is_Active = 1 ORDER BY name ASC");
                                                    while($subcategories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $subcategories['name'];?>"><?php echo $subcategories['name'];?></option>
                                                    <?php }?>
                                                    <?php else:?>
                                                    <option value="<?php echo $subcategory?>" selected>Selected Sub-Categories: <?php echo $subcategory?></option>
                                                    <!--Sub-Category List-->
                                                    <?php 
                                                    $query = mysqli_query($conn, "SELECT * FROM subcategory WHERE is_Active = 1 ORDER BY name ASC");
                                                    while($subcategories = mysqli_fetch_array($query))
                                                    {
                                                    ?>
                                                    <option value="<?php echo $subcategories['name'];?>"><?php echo $subcategories['name'];?></option>
                                                    <?php }?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="status" class="form-label">Status:</label>
                                                <select name="status" class="form-select">
                                                    <?php if(!isset($_POST['status'])):?>
                                                    <option value="" selected>Status:</option>
                                                    <?php else:?>
                                                    <option value="<?php echo $status;?>" selected>Status: <?php echo $status?></option>
                                                    <?php endif;?>
                                                    <option value="published">Published</option>
                                                    <option value="unpublished">Unpublished</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Post Created:</label>
                                                <input type="date" class="form-control" name="created_at" value="">
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <label for="image" class="form-label">Feature Image:</label>
                                                <input type="file" class="form-control" name="image" accept="image/*" value="<?php echo $postImage?>">
                                                <br>
                                                <?php if(isset($_POST['postImage'])):?>
                                                <img src="<?php echo BASE_URL.'/app/upload/uploadThumbnail/'.$postImage?>" alt="Post_Thumbnail" width="120" height="120">
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-1 col-sm-12">
                                                <label for="description" class="mb-3 form-label">Post description:</label>
                                                <?php if(!isset($_POST['details'])):?>
                                                <textarea name="description" id="mytextarea" class="form-control">Hi!, always make your content justify</textarea>
                                                <?php else:?>
                                                <textarea name="description" id="mytextarea" class="form-control"><?php echo $description?></textarea>
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-1 col-md-12 form-group">
                                                <label for="googleWidget" class="form-label">Google Widgets:</label>
                                                <textarea name="googleWidget" class="summernote fs-6">Google widgets</textarea>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <button type="submit" class="btn btn-outline-primary" name="submitPost">Save and Post</button>
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
            <!--Footer-->
            <?php include(ROOT_PATH."/app/includes/footer.php");?>
        </div>
    </div>
    <!--Scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['codeview', 'help']]
        ]
      });
    </script>
</body>
</html>