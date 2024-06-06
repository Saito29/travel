<!--Customized CSS Section-->
<link rel="stylesheet" href="<?php echo BASE_EDITOR.'/asset/css/style.css'?>">

<!--favicon logo--> 
<?php $settingFavicon = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1")?>
<?php while($settings = mysqli_fetch_assoc($settingFavicon)):?>
<link rel="shortcut icon" href="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadFavicon/'?><?php echo htmlspecialchars($settings['favicon'])?>" type="image/x-icon">
<?php endwhile;?>

<!--Google Fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!--Box Icon-->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!--Bootsrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!--Data Tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

<!--Tinymce Text Editor This is for CDN need to be configured in Admin-->
<script src="https://cdn.tiny.cloud/1/ibwzlzvtiue1cnl2kujwtewutyd1oegqob2svdnyv38tndmq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?php echo BASE_EDITOR.'/vendor/tinymce_7.0.0/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin'?>"></script>
<link rel="stylesheet" href="<?php echo BASE_EDITOR.'/vendor/tinymce_7.0.0/tinymce/js/tinymce/skins/ui/tinymce-5-dark/content.inline.min.css'?>">
<link rel="stylesheet" href="<?php echo BASE_EDITOR.'/vendor/tinymce_7.0.0/tinymce/js/tinymce/skins/ui/tinymce-5-dark/content.inline.js'?>">
<!--Tinymce initializer-->
<script src="<?php echo BASE_EDITOR.'/vendor/tinymce_7.0.0/tinymce/js/tinymce/tinymceFullOpen-Source.js'?>"></script>

<!--Pannellum-->
<script type="text/javascript" src="https://pannellum.org/js/bootstrap-native.min.js"></script>
<link rel="stylesheet" href="https://pannellum.org/css/pygments.css">
<link rel="stylesheet" href="https://cdn.pannellum.org/2.5/pannellum.css" />
<script type="text/javascript" src="https://cdn.pannellum.org/2.5/pannellum.js"></script>
<link rel="stylesheet" href="https://pannellum.org/css/style.css">
