<!--Sidebar-->
<aside id="sidebar">
    <div class="d-flex">
        <?php $settignLogo = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1")?>
        <?php while($settings = mysqli_fetch_assoc($settignLogo)):?>
        <button id="toggle-btn" type="button"><img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadLogo/'?><?php echo htmlentities($settings['logo'])?>" width="30px" alt="Travel Logo"></button>
        <?php endwhile;?>
        <div class="sidebar-logo">
            <a href="#Dashboard"><span style="color: #af8fb6;">Tra</span>vel</a>
        </div>
    </div>
    <!--Sidebar navigation start here-->
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="<?php echo BASE_EDITOR.'/editor-dashboard.php?SNID='?><?php echo $_SESSION['id']?>" class="sidebar-link">
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
        <li class="sidebar-item">
            <a href="#subcategory" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#subcategory" 
                aria-expanded="false" aria-controls="category">
                <i class='bx bx-list-plus' ></i>
                <span>Sub Category</span>
            </a>
            <ul id="subcategory" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_EDITOR.'/category/add-subcategory.php?SNID='?><?php echo $_SESSION['id']?>" class="sidebar-link">Add Sub Category</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_EDITOR.'/category/manage-subcategories.php?SNID='?><?php echo $_SESSION['id']?>" class="sidebar-link">Manage Sub Category</a>
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
                    <a href="<?php echo BASE_EDITOR.'/post/add-post.php?SNID='?><?php echo $_SESSION['id']?>" class="sidebar-link">Add Posts</a>
                </li>   
                <li class="sidebar-item">
                    <a href="<?php echo BASE_EDITOR.'/post/manage-post.php?SNID='?><?php echo $_SESSION['id']?>" class="sidebar-link">Manage Posts</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_EDITOR.'/post/trash-post.php?SNID='?><?php echo $_SESSION['id']?>" class="sidebar-link">Trash Posts</a>
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
                    <a href="<?php echo BASE_EDITOR.'/profile.php?SNID='?><?php echo $_SESSION['id']?>" class="sidebar-link">Profile</a>
                </li>   
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="<?php echo BASE_EDITOR.'/logout.php'?>" class="sidebar-link">
            <i class='bx bx-log-out'></i>
            <span>Logout</span>
        </a>
    </div>
    <!--Sidebar Navigation end here-->
</aside>
<!--Sidebar end here-->