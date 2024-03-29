<?php
	session_start();
	if(isset($_SESSION['logged_mail']) && isset($_SESSION['logged_password']))
	{
        echo<<<HTML
        <!DOCTYPE html>
		<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/index_style.css" rel="stylesheet">
    <title>CroFu</title>
</head>
<body>
    <header>
        <div id="logotipe" onclick="slowScroll('#top')">
            <span>CROFU</span> 
        </div>
        <div id="about">
			<a href="myprofile.php">MY&nbsp;PROFILE</a>
			<a href="#" onclick="slowScroll('#main')">INFO</a>
            <a href="logout.php">LOG&nbsp;OUT</a>
        </div>
    </header>

    <div id="top">
        <h1>CroFu</h1>
        <h3>20 years in the field of crowdfunding!</h3>
    </div>

    <div id="main">
        <div class="intro">
            <h2>Invest in music!</h2>
        </div>
        <div class="text">
            <span> Welcome to the most famous crowdfunding platform of the Russian Federation. This site was created solely to support the newly minted
            and talented musical performers. You can support anyone with any amount without any deductions to the site itself
            (all 100% of your amount will be transferred to the recipient), and you can also put your creativity on the site and
            show it to other crowdfunds.</span>
        </div>
    </div>

    <div id="overview">
        <div class="img">
            <img src="../media/give.png" alt="">
            <span>Sacrifice good creativity!</span>
        </div>
        <div class="img">
            <img src="../media/take.png" alt="">
            <span>Get donations for your creativity!</span>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../index_script.js"></script>
</body>
</html>
HTML;
	}
	else
	{
		header('Location: ../index.html');
	}
?>