<!--Sidebar-->
<aside id="sidebar">
    <div class="d-flex">
        <button id="toggle-btn" type="button"><img src="<?php echo BASE_ADMIN.'/asset/images/logo/travel.png'?>" width="30px" alt="Cube.io_logo"></button>
        <div class="sidebar-logo">
            <a href="#Dashboard"><span style="color: #af8fb6;">Tra</span>vel</a>
        </div>
    </div>
    <!--Sidebar navigation start here-->
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="<?php echo BASE_ADMIN.'/dashboard.php'?>" class="sidebar-link">
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
            <a href="#users" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#users" 
                aria-expanded="false" aria-controls="users">
                <i class='bx bxs-user-rectangle'></i>
                <span>Users</span>
            </a>
            <ul id="users" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/users/add-users.php'?>" class="sidebar-link">Add Users</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/users/manage-user.php'?>" class="sidebar-link">Manage Users</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
                <a href="#category" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#category" 
                    aria-expanded="false" aria-controls="category">
                    <i class='bx bx-list-ul'></i>
                    <span>Category</span>
                </a>
            <ul id="category" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/category/add-category.php'?>" class="sidebar-link">Add Category</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/category/manage-category.php'?>" class="sidebar-link">Manage Category</a>
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
                    <a href="<?php echo BASE_ADMIN.'/category/add-subcategory.php'?>" class="sidebar-link">Add Sub Category</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/category/manage-subcategories.php'?>" class="sidebar-link">Manage Sub Category</a>
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
                    <a href="<?php echo BASE_ADMIN.'/posts/add-post.php'?>" class="sidebar-link">Add Posts</a>
                </li>   
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/posts/manage-post.php'?>" class="sidebar-link">Manage Posts</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/posts/trash-post.php'?>" class="sidebar-link">Trash Posts</a>
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
                    <a href="<?php echo BASE_ADMIN.'/pages/aboutUs.php'?>" class="sidebar-link">About us</a>
                </li>   
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/pages/terms.php'?>" class="sidebar-link">Terms</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/pages/aboutpage.php'?>" class="sidebar-link">About page</a>
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
                    <a href="<?php echo BASE_ADMIN.'/comments/approved-comments.php'?>" class="sidebar-link">Approved Comments</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/comments/disapproved-comment.php'?>" class="sidebar-link">Disapproved Comments</a>
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
                    <a href="<?php echo BASE_ADMIN.'/general-setting.php'?>" class="sidebar-link">General</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo BASE_ADMIN.'/profile.php'?>" class="sidebar-link">Profile</a>
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