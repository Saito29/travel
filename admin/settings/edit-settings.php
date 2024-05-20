<?php 
include("../path.php");
include(ROOT_PATH.'/app/controllers/general-settings.php');

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
    <meta name="description" content="Travel Settings">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | General Settings</title>
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
            <main class="content px-3 py-4">
                <div class="container-fluid mb-2">
                    <div class="d-flex justify-content-between  px-2 py-2" aria-label="breadcrumb">
                        <h3 class="fw-bold fs-4 mb-3">General Settings</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bx-cog'></i>Website Settings</h4>
                                        <hr />
                                        <form action="#" class="row gx-2 gy-3" name="editSystem" method="post" enctype="multipart/form-data">
                                            <div class="mb-2 col-sm-3">                                                
                                                <label for="featureLogoFavicon" class="form-label">Logo Favicon:</label>
                                                <input type="file" class="d-none" name="featureLogoFavicon" onchange="displayImage(this)" id="featureLogoFavicon">
                                                <img src="<?php echo BASE_ADMIN.'/asset/images/profile/placeholder.webp'?>" onclick="triggerClick()" id="logoFavIcon" class="d-block border" alt="logoFavIcon" style="cursor:pointer" width="75">
                                            </div>
                                            <div class="mb-2 col-sm-3">
                                                <label for="featureSystemLogo" class="form-label">Website Logo:</label>
                                                <input type="file" class="d-none" name="featureSystemLogo" onchange="displaySystem(this)" id="featureSystemLogo">
                                                <img src="<?php echo BASE_ADMIN.'/asset/images/profile/placeholder.webp'?>" onclick="systemClick()" id="systemLogo" class="d-block border" alt="logoFavIcon" style="cursor:pointer" width="75">
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="systemURL" class="form-label"><i class='bx bx-server'></i>Website URL</label>
                                                <input type="url" class="form-control" name="systemURL" placeholder="System URL (not recommend to update)">
                                            </div>
                                            <h5 class="card-title">Social Link:</h5>
                                            <div class="mb-2 col-sm-6">
                                                <label for="facebookLinks" class="form-label"><i class='bx bxl-facebook-circle'></i>Facebook:</label>
                                                <input type="url" class="form-control" name="facebookLinks" placeholder="Facebook link" >
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="githubLinks" class="form-label"><i class='bx bxl-instagram-alt'></i>Instagram:</label>
                                                <input type="url" class="form-control" name="instagram" placeholder="Instagram link" >
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="tiktokLinks" class="form-label"><i class='bx bxl-tiktok'></i>Tiktok:</label>
                                                <input type="url" class="form-control" name="tiktokLinks" placeholder="Tiktok link" >
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="youtubeLinks" class="form-label"><i class='bx bxl-youtube'></i>Youtube:</label>
                                                <input type="url" class="form-control" name="youtubeLinks" placeholder="Youtube link" >
                                            </div>
                                            <div class="mb-2 col-sm-8">
                                                <button type="submit" class="btn btn-outline-success px-3 py-2 text-center" name="updateSettings">Update</button>
                                                <button type="submit" class="btn btn-outline-primary px-3 py-2 text-center" name="createSettings">Post</button>
                                            </div>
                                        </form>
                                        <a href="<?php echo BASE_ADMIN.'/settings/general-setting.php'?>" class="text-primary-emphasis px-3 py-2">Return</a>
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