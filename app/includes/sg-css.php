<!--Customized CSS Section-->
<link rel="stylesheet" href="<?php echo BASE_URL.'/asset/css/skin.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/css/main.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/css/index.css'?>">

     <!--favicon logo-->
    <?php $settingFavicon = mysqli_query($conn,"SELECT * FROM settings WHERE id = 1");?>
    <?php while($settings = mysqli_fetch_assoc($settingFavicon)):?>
    <link rel="shortcut icon" href="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadFavicon/'?><?php echo $settings['favicon']?>" type="image/x-icon">
    <?php endwhile;?>

     <!--Google Fonts-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 
     <!--Box Icon-->
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 
     <!--Bootsrap 5 exception-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--Slick JQuery Min CSS exception
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    -->

    <!--Pagination JS-->
    <link rel="stylesheet" href="<?php echo BASE_URL.'/asset/vendor/Pagination/pagination.css'?>">

    <style type="text/css">
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* Block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>