<?php 
include("../path.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Cube.io">
    <meta name="description" content="Cube.io Edit Post">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube.io | Edit Post</title>
    <?php include(ROOT_PATH."/app/includes/header.php");?>
</head>
<body>
    <div class="wrapper">
        <!--Sidebar-->
        <?php include(ROOT_PATH."/app/includes/sidebar.php");?>
        <div class="main">
            <!--Navbar-->
            <?php include(ROOT_PATH."/app/includes/nav.php");?>
            <!--Main content Edit Post-->
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">Edit Post</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Cube.io</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit Post</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-6 ">
                                               <!---Success Message--->  
                                               <div class="alert alert-success" role="alert">
                                                  <strong>Post updated successfully!</strong>
                                               </div>
                                               <!---Error Message--->
                                               <div class="alert alert-danger" role="alert">
                                                  <strong>Failed to update post!, Please try again later.</strong>
                                               </div>
                                            </div>
                                        </div>
                                        <form action="#" name="editPost" class="row gx-2 gy-3" method="post" enctype="multipart/form-data">
                                            <div class="mb-3 col-md-6 form-group">
                                                <label for="postTitle" class="form-label">Post Title:</label>
                                                <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Enter Title" required>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="categoryDescription" class="form-label">Category:</label>
                                                <select name="category" id="category" class="form-select" required>
                                                    <option selected>Select Category </option>
                                                    <option value="">Travel and Tour</option>
                                                    <option value="">Programming Related</option>
                                                    <option value="">Entertainment</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="subCategory" class="form-label">Sub Category:</label>
                                                <select name="subCategory" id="subCategory" class="form-control" required>
                                                <option selected>Sub Category:</option>
                                                <option value="">Hiking</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 form-group">
                                                <label for="status" class="form-label">Status:</label>
                                                <select name="status" class="form-select" required>
                                                    <option selected>Status:</option>
                                                    <option value="">Published</option>
                                                    <option value="">Unpublished</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-12 form-group">
                                                <label for="categoryDescription" class="form-label">Post Description:</label>
                                                <textarea name="categoryDescription" class="form-control" rows="4" placeholder="Post Description" required></textarea>
                                            </div>
                                            <div class=" mb-1 col-sm-12">
                                                <div class="card-body">
                                                    <h4 class="mb-3 mt-0 card-title">Post details:</h4>
                                                    <textarea name="textarea" id="mytextarea" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="m-1 col-sm-8">
                                                <div class="card-body">
                                                    <label for="featureImage" class="form-label">Feature Image:</label>
                                                    <img src="<?php echo BASE_URL.'/asset/images/profile/placeholder.webp'?>" onclick="triggerPostClick()" id="featureImgDisplay" class="d-block border" alt="profile-user" style="cursor:pointer" width="180">
                                                    <input type="file" class="d-none" name="featureImage" onchange="displayPostImage(this)" id="featureImage">
                                                </div>
                                            </div>
                                                <div class="mb-1 col-md-6 form-group">
                                                <button type="submit" class="btn btn-outline-success" name="submit">Update</button>
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
    <!--scripts-->
    <?php include(ROOT_PATH."/app/includes/scripts.php");?>
</body>
</html>