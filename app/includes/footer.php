<!--======================== Contact ===========-->
<section class="container-fluid section section__height" id="contact">
            <!--============================= Footer and Contact ===========================-->
            <div class="footer container-fluid">
                <div class="footer-content">
                    <div class="footer-section about">
                        <?php 
                            $settings_query = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
                        ?>
                        <div class="logo-content mb-2">
                            <?php while($setting = mysqli_fetch_assoc($settings_query)):?>
                            <img src="<?php echo BASE_URL.'/app/upload/uploadSettingURL/uploadLogo/'?><?php echo htmlentities($setting['logo'])?>" alt="Logo" width="40px" height="40px">
                            <?php endwhile;?>
                            <h4 class="nav__logo"><span style="color: #af8fb6;">Tra</span>vel</h4>
                        </div>
                        <?php
                            $pageTitle = 'About Page';
                            $title = 'About';
                            $page_query = mysqli_query($conn, "SELECT * FROM pages WHERE title = '$pageTitle' OR title = '$title'");
                        ?>
                        <?php while($page = mysqli_fetch_assoc($page_query)):?>
                        <p style="text-align: justify;"><?php echo html_entity_decode($page['details'])?></p>
                        <div class="contact-details">
                            <span><i class='bx bxs-phone'></i>&nbsp; <?php echo html_entity_decode($page['contact'])?></span>
                            <span><i class='bx bxs-envelope'></i>&nbsp; <?php echo html_entity_decode($page['email'])?></span>
                        </div>
                        <?php endwhile;?>
                        <div class="social">
                            <a href="<?php echo urldecode($setting['fb'])?>" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                            <a href="<?php echo urldecode($setting['instagram'])?>" target="_blank"><i class='bx bxl-instagram-alt'></i></a>
                            <a href="<?php echo urldecode($setting['tiktok'])?>" target="_blank"><i class='bx bxl-tiktok'></i></a>
                            <a href="<?php echo urldecode($setting['youtube'])?>" target="_blank"><i class='bx bxl-youtube'></i></a>
                        </div>
                    </div>
                    <div class="footer-section links">
                        <h4 class="card-title mb-3">Quick Links</h4>
                        <ul>
                            <a href="<?php echo BASE_URL.'/aboutUs.php'?>" target="_self"><li>About Us</li></a>
                            <a href="<?php echo BASE_URL.'/terms.php'?>" target="_self"><li>Terms & Conditions</li></a>
                        </ul>
                    </div>
                    <div class="footer-section contact-form">
                        <h4 class="card-title mb-3">Contact Us</h4>
                        <form action="#" method="post" class="form-group" autocomplete="on">
                            <div class="mb-2 form-group">
                                <input type="email" name="email" class="form-control bg-dark-subtle" placeholder="Email address.." required>
                            </div>
                            <div class="mb-2 form-group">
                                <textarea rows="4" name="message" class="form-control bg-dark-subtle" placeholder="Your message....." required></textarea>
                            </div>
                            <div class="mb-1 form-group">
                                <button type="submit" class="btn read-more"><i class='bx bxs-paper-plane'></i>Send</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="footer-bottom" align="center">
                    &copy;Copyright <?php echo date('Y')?> Travel, All right reserved.
                </div>
            </div>
            <!--============================= End of Footer and Contact ===========================-->
    </section>

    
