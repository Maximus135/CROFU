<?php

	include("bd.php");
	
	$size_of_play_list=mysqli_query($db , "SELECT COUNT(id) FROM music_info");
	$rows=mysqli_fetch_row($size_of_play_list);
	$total_count_of_client_music=$rows[0];
	
	$result=mysqli_query($db , "SELECT id FROM music_info");
	$storearray=Array();
	while ($row=mysqli_fetch_array($result , MYSQLI_ASSOC))
	{
		$storearray[]=$row['id'];
	}
	
	
	
		function generate($arg_1 , $arg_2)
	{

		include("bd.php");
		
		for($i=0 ; $i<$arg_1 ; $i++)
		{
			$expansion=".mp3";
			$result=$arg_2[$i] . $expansion;
		
		$user_id_raw=mysqli_query( $db , "SELECT customer_id FROM music_customer WHERE music_id='".$arg_2[$i]."'");
		$user_id=mysqli_fetch_array($user_id_raw);
		$user=$user_id['customer_id']; 
		
		
		$user_name_raw=mysqli_query( $db , "SELECT customer_name FROM customers_info WHERE id='".$user."'");
		$user_name=mysqli_fetch_array($user_name_raw);
		$user1=$user_name['customer_name'];
		
		
		
		$treck_name=mysqli_query($db , "SELECT music_name FROM music_info WHERE id='".$arg_2[$i]."'");
		$treck_array=mysqli_fetch_array($treck_name);
		$treck=$treck_array['music_name'];
			$str=$str . <<<HTML
		<div class="track">
			<span>$user1</span>
			<span>$treck</span>
        	<audio controls>
        		<source src="../music/$result">
        	</audio>
			<form method="post" action="like.php">
			<input type="hidden" value="$user" name="compositor"></input>
			<button class="like_button">Like</button>
			</form>
        </div>
HTML;
		
		}
	return $str;

	}
	
	
	$all_playlist=generate($total_count_of_client_music , $storearray);
	
	
		echo<<<HTML
		<!DOCTYPE html>
		<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/content.css" rel="stylesheet">
    <title>Playlist</title>
</head>

<body>
	
    <header>
        <div id="hat">
            <div id="logotipe" onclick="slowScroll('#playlist')">
                <span>CROFU</span> 
            </div>
            <div id="about">
                <a href="index.php">CROFU&nbsp;MENU</a>
                <a href="myprofile.php">MY&nbsp;PROFILE</a>
            </div>
        </div>
    </header>
    
	<div id="playlist">
		$all_playlist
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../index_script.js"></script>

</body>
</html>
HTML;

	


?>