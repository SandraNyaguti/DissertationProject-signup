<?php

session_start();

if(isset($_SESSION['USERID']))
{
	unset($_SESSION['USERID']);

}

header("Location: register.php");
die;

