<!--Navbar main-->
<nav class="navbar navbar-expand px-4 py-3 border-bottom">
    <div class="navbar-collapse collapse">
        <h3>Editor Panel</h3>
        <!--Toggle button Dark mode-->
        <img src="<?php echo BASE_EDITOR.'/asset/images/icon/moon-solid.png'?>" role="button" class="icon-toggle" id="icon" alt="toggle-dark-theme">
        <!--end of toggle button dark mode-->
        <div class="navbar-nav ms-auto dropdown">
            <a href="#" class="nav-icon pe-md-0" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'?><?php echo htmlspecialchars($_SESSION['profileImage'])?>" alt="profile" width="40" height="40" class="avatar rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end rounded">
                <li><p class="dropdown-item text-center">Hi <?php echo htmlspecialchars($_SESSION['username'])?></p></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="<?php echo BASE_EDITOR.'/profile.php'?>">
                        <i class='bx bxs-user-circle' ></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?php echo BASE_URL_LINKS.'/changepassword.php?SNID='.htmlspecialchars($_SESSION['id'])?>">
                        <i class='bx bxs-key' ></i> 
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?php echo BASE_EDITOR.'/logout.php'?>">
                        <i class='bx bx-log-out'></i>
                        <span>Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--ENd nav-->