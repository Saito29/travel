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
    <title>Travel | General Link</title>
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
                        <h3 class="fw-bold fs-4 mb-3">General Links</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlentities($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">General Links</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bx-cog'></i>Website Link</h4>
                                        <hr />
                                        <form action="#" class="row gx-2 gy-3" name="editSystem" method="post" enctype="multipart/form-data">
                                            <?php $query = mysqli_query($conn, "SELECT * FROM settings WHERE id = '1'")?>
                                            <?php while($settings = mysqli_fetch_assoc($query)):?>
                                            <input type="hidden" name="id" value="<?php echo htmlentities($settings['id'])?>">
                                            <div class="mb-2 col-sm-3">                                                
                                                <label for="favicon" class="form-label">Logo Favicon:</label>
                                                <input type="file" class="d-none" name="favicon" onchange="displayImage(this)" id="featureLogoFavicon" disabled>
                                                <?php if(!isset($_POST['favicon'])):?>
                                                <img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadFavicon/'?><?php echo htmlentities($settings['favicon'])?>" onclick="triggerClick()" id="logoFavIcon" class="d-block rounded-circle" alt="logoFavIcon" style="cursor:pointer" height="85" width="85">
                                                <?php else:?>
                                                <img src="<?php echo BASE_ADMIN.'/asset/images/profile/placeholder.webp'?>" onclick="triggerClick()" id="logoFavIcon" class="d-block rounded-circle" alt="logoFavIcon" style="cursor:pointer" height="85" width="85">
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-2 col-sm-3">
                                                <label for="logo" class="form-label">Website Logo:</label>
                                                <input type="file" class="d-none" name="logo" onchange="displaySystem(this)" id="featureSystemLogo" disabled>
                                                <?php if(!isset($_POST['logo'])):?>
                                                <img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadLogo/'?><?php echo htmlentities($settings['logo'])?>" onclick="systemClick()" id="systemLogo" class="d-block rounded-circle" alt="logoFavIcon" style="cursor:pointer" height="85" width="85">
                                                <?php else:?>
                                                <img src="<?php echo BASE_ADMIN.'/asset/images/profile/placeholder.webp'?>" onclick="systemClick()" id="systemLogo" class="d-block rounded-circle" alt="logoFavIcon" style="cursor:pointer" height="85" width="85">
                                                <?php endif;?>
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="url" class="form-label"><i class='bx bx-server'></i>Website URL</label>
                                                <input type="url" class="form-control" name="url" placeholder="System URL (not recommend to update)" value="<?php echo urldecode($settings['url'])?>" disabled>
                                            </div>
                                            <h5 class="card-title">Social Link:</h5>
                                            <div class="mb-2 col-sm-6">
                                                <label for="fb" class="form-label"><i class='bx bxl-facebook-circle'></i>Facebook:</label>
                                                <input type="url" class="form-control" name="fb" placeholder="Facebook link" value="<?php echo urldecode($settings['fb'])?>" disabled>
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="instagram" class="form-label"><i class='bx bxl-instagram-alt'></i>Instagram:</label>
                                                <input type="url" class="form-control" name="instagram" placeholder="Instagram link" value="<?php echo urldecode($settings['instagram'])?>" disabled>
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="tiktok" class="form-label"><i class='bx bxl-tiktok'></i>Tiktok:</label>
                                                <input type="url" class="form-control" name="tiktok" placeholder="Tiktok link" value="<?php echo urldecode($settings['tiktok'])?>" disabled>
                                            </div>
                                            <div class="mb-2 col-sm-6">
                                                <label for="youtube" class="form-label"><i class='bx bxl-youtube'></i>Youtube:</label>
                                                <input type="url" class="form-control" name="youtube" placeholder="Youtube link" value="<?php echo urldecode($settings['youtube'])?>" disabled>
                                            </div>
                                            <div class="mb-2 col-sm-8">
                                                <a href="<?php echo BASE_ADMIN.'/settings/edit-settings.php?st_Id='?><?php echo htmlentities($settings['id'])?>" class="text-success px-3 py-2">Edit Link</a>
                                            </div>
                                            <?php endwhile;?>
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