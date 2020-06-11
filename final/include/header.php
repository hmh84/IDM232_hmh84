<header>
        <div id="hero">
            <div id="hero-filter"></div>
            <div id="slideshow">
                <img src="<?php echo $directory_level ?>graphics/slideshow/hero-1.jpg" alt="Hero Photo">
                <img src="<?php echo $directory_level ?>graphics/slideshow/hero-2.jpg" alt="Hero Photo">
                <img src="<?php echo $directory_level ?>graphics/slideshow/hero-3.jpg" alt="Hero Photo">
            </div>
            <div id="hero-content">
                <div id="hero-content-upper">
                    <a href="<?php echo $directory_level ?>index.php">
                        <h1 class="hero-title">BlueBook</h1>
                        <h2>Let's get cooking.</h2>
                    </a>
                    <div id="hero-links">
                        <?php
                            if (empty($directory_level)) {
                                echo '<p id="header-help-link">Help</p>';
                            }
                        ?>
                        <p id="header-menu-link">Menu</p>
                    </div>
                </div>
                <h1 id="hero-text">BlueBook is a company dedicated to bringing you high quality meals made in simple ways.</h1>
            </div>
        </div>
</header>