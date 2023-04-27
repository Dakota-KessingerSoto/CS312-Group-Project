<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="HTML,CSS,JavaScript,PHP">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php echo Asset::js('table.js'); ?>
    <?php echo Asset::css('style.css'); ?>
    <?php echo Asset::css($style); ?>
</head>
<body>
    <header>
        <div class="navbar">
            <nav>
            <div id="nav_links">
                <a href="./table" >  Table  </a>
                <a href="./about" >  About  </a>
                <a href="./index" >  Home  </a>
            </div>
            <img src="<?php echo Asset::get_file('navlogo.png', 'img'); ?>" id="logo" alt="Nav Bar Logo">
            <h1><?php echo $heading; ?></h1>
            </nav>
        </div>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> ColorPalettePro. All rights reserved.</p>
        <p>Contact us: support@colorpalettepro.com</p>
    </footer>
</html>
