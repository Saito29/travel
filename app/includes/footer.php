<!--======================== Contact ===========-->
<section class="container-fluid section section__height h-auto w-100" id="contact">
            <!--============================= Footer and Contact ===========================-->
            <div class="footer container-fluid h-auto w-100">
                <div class="footer-content h-auto w-100">
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

                            // ... (Database connection code)

                            $stmt = $conn->prepare("SELECT p.*, s.fb, s.instagram, s.tiktok, s.youtube
                                FROM pages p
                                LEFT JOIN settings s ON 1 = 1
                                WHERE p.title = ? OR p.title = ?");
                            $stmt->bind_param("ss", $pageTitle, $title);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();

                                echo "<p style='text-align: justify'>" . html_entity_decode($row['details']) . "</p>";
                                echo "<div class='contact-details'>";
                                echo "<span><i class='bx bxs-phone'></i>&nbsp;" . html_entity_decode($row['contact']) . "</span>";
                                echo "<span><i class='bx bxs-envelope'></i>&nbsp;" . html_entity_decode($row['email']) . "</span>";
                                echo "</div>";

                                echo "<div class='social'>";
                                echo "<a href='" . urldecode($row['fb']) . "' target='_blank'><i class='bx bxl-facebook-circle'></i></a>";
                                echo "<a href='" . urldecode($row['instagram']) . "' target='_blank'><i class='bx bxl-instagram-alt'></i></a>";
                                echo "<a href='" . urldecode($row['tiktok']) . "' target='_blank'><i class='bx bxl-tiktok'></i></a>";
                                echo "<a href='" . urldecode($row['youtube']) . "' target='_blank'><i class='bx bxl-youtube'></i></a>";
                                echo "</div>";
                            } else {
                                echo "No page details found.";
                            }

                            $stmt->close();
                            $conn->close();
                        ?>
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
                        <form action="contact.php" method="post" class="form-group" autocomplete="on" enctype="application/x-www-form-urlencoded">
                            <div class="mb-2 form-group">
                                <input type="text" name="name" class="form-control bg-dark-subtle" placeholder="Name..">
                            </div>
                            <div class="mb-2 form-group">
                                <input type="email" name="email" class="form-control bg-dark-subtle" placeholder="Email address.." >
                            </div>
                            <div class="mb-2 form-group">
                                <input type="text" name="subject" class="form-control bg-dark-subtle" placeholder="Subject.." >
                            </div>
                            <div class="mb-2 form-group">
                                <textarea rows="4" name="message" class="form-control bg-dark-subtle" placeholder="Your message....." ></textarea>
                            </div>
                            <div class="mb-1 form-group">
                                <button type="submit" name="contact-btn" class="btn read-more"><i class='bx bxs-paper-plane'></i>Send</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="footer-bottom h-auto w-100" align="center">
                    &copy;Copyright <?php echo date('Y')?> Travel, All right reserved.
                </div>
            </div>
            <!--============================= End of Footer and Contact ===========================-->
    </section>

    
