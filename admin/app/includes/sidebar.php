<!--Sidebar-->
<aside id="sidebar">
    <div class="d-flex">
        <?php
            $settignLogo = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
        ?>
        <?php while($settings = mysqli_fetch_assoc($settignLogo)):?>
        <button id="toggle-btn" type="button"><img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadLogo/'?><?php echo $settings['logo']?>" width="30px" alt="Cube.io_logo"></button>
        <?php endwhile;?>
        <div class="sidebar-logo">
            <a href="#Dashboard"><span style="color: #af8fb6;">Tra</span>vel</a>
        </div>
    </div>
    <!--Sidebar navigation start here-->
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="<?php echo BASE_ADMIN.'/dashboard.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">
                <i class='bx bxs-dashboard'></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo BASE_URL.'/index.php'?>" class="sidebar-link">
                <i class='bx bx-globe'></i>
                <span>Web Page</span>
            </a>
        </li>
        <?php if(isset($_SESSION['id'])):?>
            <?php if($_SESSION['role'] === 'admin'):#If the session login was admin display users else not?>

        <li class="sidebar-item">
            <a href="#users" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#users" 
                aria-expanded="false" aria-controls="users">
                <i class='bx bxs-user-rectangle'></i>
                <span>Users</span>
            </a>
            <ul id="users" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/users/add-users.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Add Users</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/users/manage-user.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Manage Users</a>
                </li>
            </ul>
        </li>
            <?php endif;?>
        <?php endif;?>
        <li class="sidebar-item">
                <a href="#category" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#category" 
                    aria-expanded="false" aria-controls="category">
                    <i class='bx bx-list-ul'></i>
                    <span>Category</span>
                </a>
            <ul id="category" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/category/add-category.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Add Category</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/category/manage-category.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Manage Category</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#subcategory" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#subcategory" 
                aria-expanded="false" aria-controls="category">
                <i class='bx bx-list-plus' ></i>
                <span>Sub Category</span>
            </a>
            <ul id="subcategory" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/category/add-subcategory.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Add Sub Category</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/category/manage-subcategories.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Manage Sub Category</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#posts" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#posts"
                aria-expanded="false" aria-controls="posts">
                <i class='bx bx-list-ul'></i>
                <span>Posts</span>
                </a>
            <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/posts/add-post.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Add Posts</a>
                </li>   
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/posts/manage-post.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Manage Posts</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/posts/trash-post.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Trash Posts</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#pages" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                aria-expanded="false" aria-controls="pages">
                <i class='bx bxs-book-alt'></i>
                <span>Pages</span>
            </a>
            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/pages/aboutpage.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">About page</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/pages/manage-page.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Manage Page</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#comments" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#comments"
                aria-expanded="false" aria-controls="comments">
                <i class='bx bxs-comment-detail'></i>
                <span>Comments</span>
            </a>
            <ul id="comments" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/comments/approved-comments.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Approved Comments</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/comments/disapproved-comment.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Disapproved Comments</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#settings" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#settings"
                aria-expanded="false" aria-controls="settings">
                <i class='bx bxs-cog'></i>
                <span>Settings</span>
            </a>
            <ul id="settings" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/settings/general-setting.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">General</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/profile.php?SNID='?><?php echo htmlentities($_SESSION['id'])?>" class="sidebar-link">Profile</a>
                </li>   
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="<?php echo BASE_ADMIN.'/logout.php'?>" class="sidebar-link">
            <i class='bx bx-log-out'></i>
            <span>Logout</span>
        </a>
    </div>
    <!--Sidebar Navigation end here-->
</aside>
<!--Sidebar end here-->