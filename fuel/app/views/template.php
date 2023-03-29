<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="HTML,CSS,JavaScript,PHP">
    <?php echo Asset::css($style); ?>
</head>
<body>
    <header>
        <section class="navbar">
            <nav>
                <ul>
                    <li><a href="./index" >  Home  </a></li>
                    <li><a href="./about" >  About  </a></li>
                    <li><a href="./table" >  Table  </a></li>
                </ul>
            </nav>
        </section>
				<div id="logo">
    				<img src="<?php echo Asset::get_file('navlogo.png', 'img'); ?>" alt="Nav Bar Logo">
				</div>
        <section class="heading">
            <h1><?php echo $heading; ?></h1>
        </section>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> ColorPalettePro. All rights reserved.</p>
        <p>Contact us: support@colorpalettepro.com</p>
    </footer>
</html>
