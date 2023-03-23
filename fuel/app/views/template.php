<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords"  content="HTML,CSS,JavaScript,PHP">
		<?php echo Asset::css($style); ?>
	</head>
	<body>
		<header>
            <section class="title"><h1><?php echo $heading; ?></h1></section>
            <section class="navbar">
                <nav>
                    <ul>
						<li><a href="./index" >  Home  </a></li>
						<li><a href="./about" >  About  </a></li>
						<li><a href="./table" >  Table  </a></li>
                    </ul>
                </nav>
            </section>
        </header>
		<?php echo $content; ?>
	</body>
	<footer>
            <p>Authors: Kevin Truong            <a href="truongak@colostate.edu">truongak@colostate.edu</a></p>
            <p>Authors: Dakota Kessinger-Sott   <a href="email@colostate.edu">email@colostate.edu</a></p>
            <p>Authors: Anthony Sargent         <a href="antsarge@colostate.edu">antsarge@colostate.edu</a></p>
            <p>Authors: John Mcfall             <a href="email@colostate.edu">email@colostate.edu</a></p>
    </footer>
</html>
