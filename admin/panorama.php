<?php 
include("path.php");
include(ROOT_PATH.'/app/config/db.php');

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
    <meta name="description" content="Travel About Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel | About Page</title>
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
                        <h3 class="fw-bold fs-4 mb-3">Panaroma Pannellum</h3>
                        <ol class="breadcrumb p-0 m-0 ">
                            <li class="breadcrumb-item"><a href="#">Travel</a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo htmlspecialchars($_SESSION['role'])?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Panorama</li>
                        </ol>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card h-auto w-100">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class='bx bxs-landscape' style='color:#e915ef'></i>Panorama Pannellum</h4>
                                        <hr />                                         
                                        <form class="row gx-2 gy-3" name="form" id="form">
                                            <h5>Configuration-utility</h5>
                                            <div class="mb-1 col-md-12 form-group hstack">
                                                <label for="panorama-url" class="form-label col-sm-2 fw-semibold">Panorama URL:</label>
                                                <input type="url" name="pano_url" id="panorama-url" class="form-control bg-secondary-subtle" placeholder="Image File" required>
                                            </div>
                                            <div class="mb-1 col-md-12 form-group hstack">
                                                <label for="panorama-title" class="form-label col-sm-2 fw-semibold">Title (<span class="text-warning">Optional</span>):</label>
                                                <input type="text" name="pano_title" id="panorama-title" class="form-control bg-secondary-subtle" placeholder="Image Name">
                                            </div>
                                            <div class="mb-1 col-md-12 form-group hstack">
                                                <label for="panorama-author" class="form-label col-sm-2 fw-semibold">Author (<span class="text-warning">Optional</span>):</label>
                                                <input type="text" name="pano_author" id="panorama-author" class="form-control bg-secondary-subtle" placeholder="Author Name">
                                            </div>
                                            <div class="mb-1 col-md-12 form-group hstack gap-2 offset-2 text-secondary-emphasis">
                                                <label>
                                                    <input type="checkbox" name="autoload"><span class="text-primary">Autoload</span>
                                                </label>
                                            </div>
                                            <div class="mb-1 col-md-12 form-group hstack gap-2 offset-2">
                                                <button class="btn btn-outline-success" type="submit">Generate</button>
                                            </div>
                                        </form>
                                        <div class="card-body h-auto w-75">
                                            <div class="card-header border-secondary">
                                                <div class="card-title">
                                                    <h5 class="text-secondary-emphasis-emphasis">Result</h5>
                                                </div>
                                            </div>
                                            <ul class="list-group">
                                                <li class="list-group-item" id="result">
                                                    <div class="text-center" style="height: 400px; width: 100%; background: #eee; box-shadow: inset 0px 0px 100px 0px #ddd;">
                                                        <div class="position-relative top-50" style="transform: translateY(-50%);">
                                                            <div style="max-width: 300px; margin: 0 auto;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 150"><path fill="#aaa" d="m0 0v150l4.457-0.91797s68.671-14.113 145.54-14.113c76.872 0 145.54 14.113 145.54 14.113l4.46 0.92v-150l-4.457 0.91602s-68.671 14.113-145.54 14.113c-76.872 0-145.54-14.113-145.54-14.113zm7.4199 9.0098c11.163 2.1752 72 13.439 142.58 13.439s131.42-11.265 142.58-13.439v131.98c-11.16-2.17-72-13.44-142.58-13.44s-131.42 11.267-142.58 13.441zm159.82 63.144c-0.28454-0.51166-0.64312-0.99171-1.0333-1.4485-2.119-2.5791-5.2905-4.2747-8.8638-4.2747-3.585 0-6.7564 1.6856-8.8754 4.253-0.38936 0.4684-0.74877 0.94844-1.0541 1.4701-1.0633 1.7696-1.7072 3.8146-1.7072 6.0318 0 6.4794 5.2081 11.742 11.637 11.742 6.397 0 11.606-5.263 11.606-11.742-0.00083-2.2164-0.63313-4.2613-1.7089-6.0318m6.6083-1.5017c1.0341 2.3021 1.6448 4.8362 1.6448 7.5335 0 10.133-8.1283 18.359-18.15 18.359-10.035 0-18.161-8.2265-18.161-18.359 0-2.6972 0.60151-5.2314 1.644-7.5451h-32.43v27.665c0 3.7497 3.0017 6.8088 6.7356 6.8088h69.682c3.7222 0 6.7564-3.0592 6.7564-6.8088l0.0225-27.653zm-20.41-20.896h-7.1042v-3.4743h7.1042zm6.5126-4.8703h-20.059l-4.1324 6.1166h27.975zm21.819 2.5891h-8.254l-1.4643 3.4843h11.057zm-55.896 1.2047h-6.199l-0.71633 2.2588h7.4303zm31.463 11.147c6.6183 0 12.365 3.6449 15.537 9.0135l18.699 0.02163v-10.135c0-3.7713-3.0342-6.8305-6.7564-6.8305h-69.683c-3.7339 0-6.7356 3.0591-6.7356 6.8305l0.0191 10.049 33.372 0.02246c3.1948-5.3496 8.9179-8.9719 15.548-8.9719"></path></svg>
                                                            </div>
                                                            <p class="text-center" style="color: #aaa; font-size: 30px;"><strong>Preview will appear here.</strong></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <h5 class="text-secondary-emphasis">URL</h5>
                                                    <form>
                                                        <div class="input-group">
                                                            <input id="url" autocomplete="off" id="copyable" class="copyable form-control bg-secondary-subtle" readonly type="text"><!--onfocus="this.select();" onmouseup="return false;"-->
                                                            <div class="input-group-btn">
                                                                <div class="btn btn-default copy-btn" data-target="url" data-bs-toggle="tooltip" data-bs-title="Copy to Clipboard"><div class="copy-btn-icon" onclick="btn();">&nbsp;</div></div>
                                                            </div>
                                                        </div>
                                                        <p class="fst-italic fw-medium text-success fs-6" id="success-msg" style="display: none;">Copy text Success.</p>
                                                    </form>
                                                </li>
                                                <li class="list-group-item">
                                                    <h5 class="text-secondary-emphasis">Embed Code</h5>
                                                    <form>
                                                        <div class="input-group">
                                                            <input id="embed-code" autocomplete="off" id="copyable"  class="copyable form-control bg-secondary-subtle" readonly type="text"> <!--onfocus="this.select();" onmouseup="return false;"-->
                                                            <div class="input-group-btn">
                                                                <div class="btn btn-default copy-btn" data-target="embed-code" data-bs-toggle="tooltip" data-bs-title="Copy to Clipboard"><div class="copy-btn-icon" onclick="btn();">&nbsp;</div></div>
                                                            </div>
                                                        </div>
                                                        <p class="fst-italic fw-medium text-success fs-6" id="success" style="display: none;">Copy text Success.</p>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
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