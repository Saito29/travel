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
                                        <form action="add-post.php" class="row gx-2 gy-2" autocomplete="on" name="addPost" method="post" enctype="multipart/form-data">
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="postTitle" class="form-label">Post Title:</label>
                                                <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Enter Title">
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Category:</label>
                                                <select name="category" id="category" class="form-select">
                                                    <option selected>Select Category </option>
                                                    <option value="">Travel and Tour</option>
                                                    <option value="">Programming Related</option>
                                                    <option value="">Entertainment</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="subCategory" class="form-label">Sub Category:</label>
                                                <select name="subCategory" id="subCategory" class="form-select">
                                                <option selected>Sub Category:</option>
                                                <option value="">Hiking</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="status" class="form-label">Status:</label>
                                                <select name="status" class="form-select">
                                                    <option value="" selected>Status:</option>
                                                    <option value="published">Published</option>
                                                    <option value="unpublished">Unpublished</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Post Description:</label>
                                                <textarea name="categoryDescription" class="summernote" class="form-control" rows="4">Post Description</textarea>
                                            </div>
                                            <div class="mb-1 col-md-4 form-group">
                                                <label for="categoryDescription" class="form-label">Post Updated:</label>
                                                <input type="datetime-local" class="form-control form-control-sm" name="created_at" value="">
                                            </div>
                                            <div class="mb-1 col-sm-12">
                                                <div class="card-body">
                                                    <h4 class="mb-3 mt-0 card-title">Post details:</h4>
                                                    <textarea name="textarea" id="mytextarea" class="form-control" required>Hi!, always make your content justify</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-sm-6">
                                                <div class="card-body">
                                                    <label for="featureImage" class="form-label">Feature Image:</label>
                                                    <img src="<?php echo BASE_ADMIN.'/asset/images/profile/placeholder.webp'?>" onclick="triggerPostClick()" id="featureImgDisplay" class="d-block border" alt="profile-user" style="cursor:pointer" width="150" height="150">
                                                    <input type="file" class="d-none" name="featureImage" onchange="displayPostImage(this)" id="featureImage">
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Google Widgets:</label>
                                                <textarea name="googleWidget" class="summernote" rows="4" class="form-control">Google widgets</textarea>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <button type="submit" class="btn btn-outline-success" name="update_at">Update Posts</button>
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