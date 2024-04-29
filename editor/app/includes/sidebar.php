<!--Sidebar-->
<aside id="sidebar">
    <div class="d-flex">
        <button id="toggle-btn" type="button"><img src="<?php echo BASE_URL.'/asset/images/icon/Cube.io.png'?>" width="30px" alt="Cube.io_logo"></button>
        <div class="sidebar-logo">
            <a href="#Dashboard"><span style="color: #af8fb6;">Cube</span>.io</a>
        </div>
    </div>
    <!--Sidebar navigation start here-->
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="<?php echo BASE_URL.'/editor-dashboard.php'?>" class="sidebar-link">
                <i class='bx bxs-dashboard'></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo BASE_HOME.'/index.php'?>" class="sidebar-link">
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
                    <a href="<?php echo BASE_URL.'/add-subcategory.php'?>" class="sidebar-link">Add Sub Category</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL.'/manage-subcategories.php'?>" class="sidebar-link">Manage Sub Category</a>
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
                    <a href="<?php echo BASE_URL.'/add-post.php'?>" class="sidebar-link">Add Posts</a>
                </li>   
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL.'/manage-post.php'?>" class="sidebar-link">Manage Posts</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_URL.'/trash-post.php'?>" class="sidebar-link">Trash Posts</a>
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
                    <a href="<?php echo BASE_URL.'/profile.php'?>" class="sidebar-link">Profile</a>
                </li>   
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="<?php echo BASE_URL_LINKS.'/signin.php'?>" class="sidebar-link">
            <i class='bx bx-log-out'></i>
            <span>Logout</span>
        </a>
    </div>
    <!--Sidebar Navigation end here-->
</aside>
<!--Sidebar end here-->