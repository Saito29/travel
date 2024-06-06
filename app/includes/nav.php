<!--=============== HEADER ===============-->
<header class="header" id="header">
        <nav class="nav container">
            <h3 class="logo-name"><a href="<?php echo BASE_URL.'/index.php'?>"><span style="color: #af8fb6">Tra</span>vel</a></h3>
            <!--=================== Navigation Panel ====================-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="<?php echo BASE_URL.'/index.php'?>" class="nav__link active-link">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#comments" class="nav__link">
                            <i class='bx bx-comment-detail nav__icon'></i>
                            <span class="nav__name">Comment</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#contact" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon'></i>
                            <span class="nav__name">Contact</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#post" class="nav__link">
                            <i class='bx bxs-news nav__icon'></i>
                            <span class="nav__name">Post</span>
                        </a>
                    </li>
                    <?php if(isset($_SESSION['id'])): ?>
                        <?php if($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'sub-admin'): ?>
                    <!--If user login as admin display dashboard and logout if not display login-->
                    <li class="nav__item">
                        <a href="<?php echo BASE_ADMIN.'/dashboard.php?userID='?><?php echo htmlspecialchars($_SESSION['id'])?>" class="nav__link">
                            <i class='bx bxs-dashboard nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                    </li>
                        <?php elseif($_SESSION['role'] === 'editor'): ?>
                    <!--if user login as editor display dashboard and logout-->
                    <li class="nav__item">
                        <a href="<?php echo BASE_EDITOR.'/editor-dashboard.php?userID='?><?php echo htmlspecialchars($_SESSION['id'])?>" class="nav__link">
                            <i class='bx bxs-dashboard nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                    </li>
                    <?php endif; ?> 
                    <li class="nav__item">
                        <a href="<?php echo BASE_URL.'/logout.php'?>" class="nav__link">
                            <i class='bx bx-log-out nav__icon'></i>
                            <span class="nav__name">Logout</span>
                        </a>
                    </li>
                    <?php else: ?>
                        <!--If user not login display the login link-->
                    <li class="nav__item">
                        <a href="<?php echo BASE_URL_LINKS.'/signin.php'?>" class="nav__link">
                            <i class='bx bx-log-in nav__icon'></i>
                            <span class="nav__name">Login</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>

            <?php if(isset($_SESSION['id'])):?>
            <div class="navbar-nav dropdown">
                <a href="#" class="nav-icon pe-md-0" data-bs-toggle="dropdown" aria-expanded="false">                
                    <img src="<?php echo BASE_URL.'/app/upload/uploadProfile/'?><?php echo htmlspecialchars($_SESSION['profileImage'])?>" alt="profile" style="width: 32px; height: 32px;" width="32px" height="32px" class="nav__img rounded-circle">                
                </a>
                <ul class="dropdown-menu dropdown-menu-end rounded">
                    <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL_LINKS.'/changepassword.php?SNID='?><?php echo htmlspecialchars($_SESSION['id'])?>">
                            <i class='bx bxs-key' ></i> 
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo BASE_URL.'/logout.php'?>">
                            <i class='bx bx-log-out'></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <?php else:?>
            <div class="navbar-nav">
                <img src="<?php echo BASE_URL.'/asset/img/logo/travel.png'?>" alt="profile" width="32px" height="32px" class="nav__img rounded-circle">                    
            </div>
            <?php endif;?>

        </nav>
    </header>