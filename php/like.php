<?php

	session_start();
	if(isset($_SESSION['logged_mail']) && isset($_SESSION['logged_password']))
	{
	
		include("bd.php");
		$mail=$_SESSION['logged_mail'];
		$password=$_SESSION['logged_password'];
		
		$user_who_gets=$_POST['compositor'];
		
		$user_tokens_result=mysqli_query($db,"SELECT customer_tokens FROM customers_info WHERE customer_email='".$mail."' AND customer_password='".$password."'");
		$user_tokens=mysqli_fetch_array($user_tokens_result);
		$tokens=$user_tokens['customer_tokens'];
		
		if($tokens!=0)
		{
			$tokens_send=$tokens-1;
			$new_count_tokens=mysqli_query($db,"UPDATE customers_info SET customer_tokens='".$tokens_send."' WHERE customer_email='".$mail."' AND customer_password='".$password."'");
			$user_gets=mysqli_query($db,"UPDATE customers_info SET customer_tokens=customer_tokens+1 WHERE id='".$user_who_gets."'");
			header('Location: playlist.php');
			
		}
		else
		{
			header('Location: buytokens.php');
		}
		
		
	}
	else
	{
		header('Location: ../login.html');
	}



?>