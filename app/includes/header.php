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
                        <a href="#category" class="nav__link">
                            <i class='bx bxs-category nav__icon'></i>
                            <span class="nav__name">Category</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#contact" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon'></i>
                            <span class="nav__name">Contact</span>
                        </a>
                    </li>

                    

                    <li class="nav__item ">
                        <a href="<?php echo BASE_URL_LINKS.'/signin.php'?>" class="nav__link">
                            <i class='bx bx-log-in nav__icon'></i>
                            <span class="nav__name">Login</span>
                        </a>
                    </li>
                    <!--If user login display dashboard if not display login-->
                    <li class="nav__item d-none">
                        <a href="<?php echo BASE_URL.'/admin/dashboard.php' ?>" class="nav__link">
                            <i class='bx bxs-dashboard nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav__item d-none">
                        <a href="<?php echo BASE_URL.'/editor/editor-dashboard.php' ?>" class="nav__link">
                            <i class='bx bxs-dashboard nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                    </li>
                    <!--If user login display dashboard and replace login to  logout-->
                    <li class="nav__item d-none">
                        <a href="<?php echo BASE_URL.'/index.php'?>" class="nav__link">
                            <i class='bx bx-log-out nav__icon'></i>
                            <span class="nav__name">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!--Profile Image-->
            <a href="#profile"><img src="./asset/img/logo/travel.png" alt="Logo" class="nav__img"></a>
        </nav>
    </header>