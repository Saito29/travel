<?php
include(ROOT_PATH .'/app/config/db.php');

#Global variables
$id = '';
$favicon = '';
$logo = '';
$url = '';
$fb = '';
$instagram = '';
$tiktok = '';
$youtube = '';

#Table variables
$tblsetting = 'settings';
$settings = selectAll($tblsetting);

#Global variables
$msg = '';
$css_class = '';
$icon = '';

#Array of error
$errors = array();

#Session message created
function sessionSettings($setting){
    $_SESSION['messages'] = "General Link successfully created.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/settings/edit-settings.php');
    exit();
}

#If update failed function
function sessionFailed($setting){
    $_SESSION['messages'] = "Update failed, try again!";
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/settings/edit-settings.php');
    exit();
}

#If update failed function
function sessionUpdate($setting){
    $_SESSION['messages'] = "Update successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/settings/edit-settings.php');
    exit();
}

#For creating
if(isset($_POST['createSettings'])){
    #Unset the settings button
    unset($_POST['createSettings']);

    #Get the data of image
    $favicon = $_FILES['favicon'];
    $logo = $_FILES['logo'];

    #Favicon
    $favicon = $_FILES['favicon']['name'];
    $faviconSize = $_FILES['favicon']['size']; #image size
    $faviconTmp = $_FILES['favicon']['tmp_name']; #image name of the image temporary
    $faviconError = $_FILES['favicon']['error']; #Image error either 1 or 0
    $faviconType = $_FILES['favicon']['type']; #Image type of the image

    #Website logo
    $logo = $_FILES['logo']['name'];
    $logoSize = $_FILES['logo']['size']; #image size
    $logoTmp = $_FILES['logo']['tmp_name']; #image name of the image temporary
    $logoError = $_FILES['logo']['error']; #Image error either 1 or 0
    $logoType = $_FILES['logo']['type']; #Image type of the image

    #Url webiste
    $url = mysqli_real_escape_string($conn, urlencode($_POST['url'])); #url website 
    $fb = mysqli_real_escape_string($conn, urlencode($_POST['fb'])); # facebook url
    $instagram = mysqli_real_escape_string($conn, urldecode($_POST['instagram'])); #instagram
    $tiktok = mysqli_real_escape_string($conn, urlencode($_POST['tiktok'])); #tiktok
    $youtube = mysqli_real_escape_string($conn, urlencode($_POST['youtube'])); #youtube

    #Favicon
    if($faviconError === 0){
        #validate favicon image size
        if($faviconSize > 10000000){
            $msg = "Favicon Image size is to large to upload. Please upload up to 10mb only.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else{
            $faviconex = pathinfo($favicon, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $faviconEx_lc = strtolower($faviconex); #Convert to lowercase
            $faviconAllowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($faviconEx_lc, $faviconAllowed_exs)){
                #The uniqid() function generates a unique ID based on the microtime
                $faviconImg = uniqid("favicon-", false).'.'.$faviconEx_lc; #Create unique id
                $faviconPath = ROOT_PATH.'../../app/upload/uploadSettingURL/uploadFavicon/'.$faviconImg; #Get the image path
                $result = move_uploaded_file($faviconTmp, $faviconPath); #Upload the image to the folder and database
                
                #if image path moved to thumbnail directory
                if($result){
                    $_POST['favicon'] = $faviconImg;
                }else{
                    array_push($errors, 'Failed to upload the Favicon image.');
                }
            }
        }
    }

    #Website logo
    if($logoError === 0){
        if($faviconSize > 10000000){
            $msg = "Logo Image size is to large to upload. Please upload up to 10mb only.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else{
            $logoex = pathinfo($logo, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $logoEx_lc = strtolower($logoex); #Convert to lowercase
            $logoAllowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($logoEx_lc, $logoAllowed_exs)){
                #The uniqid() function generates a unique ID based on the microtime
                $logoImg = uniqid("Logo-", false).'.'.$logoEx_lc; #Create unique id
                $logoPath = ROOT_PATH.'../../app/upload/uploadSettingURL/uploadLogo/'.$logoImg; #Get the image path
                $result = move_uploaded_file($logoTmp, $logoPath); #Upload the image to the folder and database
                
                #if image path moved to thumbnail directory
                if($result){
                    $_POST['logo'] = $logoImg;
                }else{
                    array_push($errors, 'Failed to upload the Website Logo image.');
                }
            }
        }
    }

    #Insert into the database
    $settings_query = create($tblsetting, $_POST);
    
    #check if insert was successful
    if($settings_query){
        #session the data
        sessionSettings($settings_query);

        #Clear all the fields
        $favicon = '';
        $logo = '';
        $url = '';
        $fb  = '';
        $instagram = '';
        $tiktok = '';
        $youtube = '';
    }else{
        #Alert message
        $msg = 'Something went wrong, please try again.';
        $css_class = 'alert-danger';
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';

        #Return data from the fields
        $favicon = $_FILES['favicon']['name'];
        $logo = $_FILES['logo']['name'];
        $url = $_POST['url'];
        $fb = $_POST['fb'];
        $instagram = $_POST['instagram'];
        $tiktok = $_POST['tiktok'];
        $youtube = $_POST['youtube'];
    }
}

#Get the id
if(isset($_GET['st_Id'])){
    #Get the data id
    $setting = selectOne($tblsetting, ['id' => $_GET['st_Id']]);

    #Return the data
    $id = $setting['id'];
    $favicon = $setting['favicon'];
    $logo = $setting['logo'];
    $url = $setting['url'];
    $fb = $setting['fb'];
    $instagram = $setting['instagram'];
    $tiktok = $setting['tiktok'];
    $youtube = $setting['youtube'];
}

#Update 
if(isset($_POST['updateSettings'])){
    #Get the id
    $id = $_POST['id'];

    #unset the id
    unset($_POST['updateSettings'], $_POST['id']);

    #Get the data of image
    $favicon = $_FILES['favicon'];
    $logo = $_FILES['logo'];

    #Favicon
    $favicon = $_FILES['favicon']['name'];
    $faviconSize = $_FILES['favicon']['size']; #image size
    $faviconTmp = $_FILES['favicon']['tmp_name']; #image name of the image temporary
    $faviconError = $_FILES['favicon']['error']; #Image error either 1 or 0
    $faviconType = $_FILES['favicon']['type']; #Image type of the image

    #Website logo
    $logo = $_FILES['logo']['name'];
    $logoSize = $_FILES['logo']['size']; #image size
    $logoTmp = $_FILES['logo']['tmp_name']; #image name of the image temporary
    $logoError = $_FILES['logo']['error']; #Image error either 1 or 0
    $logoType = $_FILES['logo']['type']; #Image type of the image

    #Url webiste
    $url = mysqli_real_escape_string($conn, urlencode($_POST['url'])); #url website 
    $fb = mysqli_real_escape_string($conn, urlencode($_POST['fb'])); # facebook url
    $instagram = mysqli_real_escape_string($conn, urldecode($_POST['instagram'])); #instagram
    $tiktok = mysqli_real_escape_string($conn, urlencode($_POST['tiktok'])); #tiktok
    $youtube = mysqli_real_escape_string($conn, urlencode($_POST['youtube'])); #youtube

    #Favicon
    if($faviconError === 0){
        #validate favicon image size
        if($faviconSize > 10000000){
            $msg = "Favicon Image size is to large to upload. Please upload up to 10mb only.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else{
            $faviconex = pathinfo($favicon, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $faviconEx_lc = strtolower($faviconex); #Convert to lowercase
            $faviconAllowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($faviconEx_lc, $faviconAllowed_exs)){
                #The uniqid() function generates a unique ID based on the microtime
                $faviconImg = uniqid("favicon-", false).'.'.$faviconEx_lc; #Create unique id
                $faviconPath = ROOT_PATH.'../../app/upload/uploadSettingURL/uploadFavicon/'.$faviconImg; #Get the image path
                $result = move_uploaded_file($faviconTmp, $faviconPath); #Upload the image to the folder and database
                
                #if image path moved to thumbnail directory
                if($result){
                    $_POST['favicon'] = $faviconImg;
                }else{
                    array_push($errors, 'Failed to upload the Favicon image.');
                }
            }
        }
    }

    #Website logo
    if($logoError === 0){
        if($faviconSize > 10000000){
            $msg = "Logo Image size is to large to upload. Please upload up to 10mb only.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else{
            $logoex = pathinfo($logo, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $logoEx_lc = strtolower($logoex); #Convert to lowercase
            $logoAllowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($logoEx_lc, $logoAllowed_exs)){
                #The uniqid() function generates a unique ID based on the microtime
                $logoImg = uniqid("Logo-", false).'.'.$logoEx_lc; #Create unique id
                $logoPath = ROOT_PATH.'../../app/upload/uploadSettingURL/uploadLogo/'.$logoImg; #Get the image path
                $result = move_uploaded_file($logoTmp, $logoPath); #Upload the image to the folder and database
                
                #if image path moved to thumbnail directory
                if($result){
                    $_POST['logo'] = $logoImg;
                }else{
                    array_push($errors, 'Failed to upload the Website Logo image.');
                }
            }
        }
    }

    #Update the database
    $settings_query = update($tblsetting, $id, $_POST);
    
    #check if insert was successful
    if($settings_query){
        #session the data
        sessionUpdate($settings_query);

        #Clear all the fields
        $favicon = '';
        $logo = '';
        $url = '';
        $fb  = '';
        $instagram = '';
        $tiktok = '';
        $youtube = '';
    }else{
        #Alert message
        sessionFailed($settings_query);

        #Return data from the fields
        $favicon = $_FILES['favicon']['name'];
        $logo = $_FILES['logo']['name'];
        $url = $_POST['url'];
        $fb = $_POST['fb'];
        $instagram = $_POST['instagram'];
        $tiktok = $_POST['tiktok'];
        $youtube = $_POST['youtube'];
    }
}