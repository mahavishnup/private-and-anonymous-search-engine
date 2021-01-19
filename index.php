<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Moodle</title>

    <meta name="description" content="Search the web for sites and images.">
    <meta name="keywords" content="Search engine, doodle, websites">
    <meta name="author" content="Reece Kenney">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

    <div class="wrapper indexPage">

        <div class="mainSection">

            <div class="logoContainer">
                <img src="assets/images/moodleLogo.png" title="Private and Anonymous Search Engine" alt="Logo">
            </div>

            <div class="searchContainer">

                <form action="search.php" method="GET">

                    <input class="searchBox" type="text" name="term" autocomplete="off">
                    <input class="searchButton" type="submit" value="Search">

                </form>

            </div>

            <div class="privacyContainer">
				<div class="image">
                	<img src="assets/images/privacy.svg" title="Private and Anonymous Search Engine" alt="Logo">
				</div>
				<div class="description">
					<small>This is a</small><h1>Anonymous Window</h1>
					<p>
						Moodle doesn't remember what you do in a Private Window.
						Sites you visit won't show up in your history, and cookies vanish when you're done.
						Private Windows don't make you completely anonymous online, though. 
						<a href="#">Learn more</a>
					</p>
				</div>
            </div>

        </div>

	</div>
	
</body>

</html>