<?php 
session_start();

	include("mysqlconnect.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>UserVunerabilities</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<style type="text/css">

a:link {
  color: green;
}

a:hover {
  color: blue;
}



body{
	background-color: whitesmoke;
    color: black;
	text-align: center;
	margin-top: 250px;
}

</style>
    
	<h1> Hello, <?php echo $user_data['USERNAME']; ?></h1>

	
	<h3>Thank you for considering to Participate</h3>

    <br>
	
	<a href="https://forms.office.com/r/sUzekiT0bf"> Click to Take Survey</a>
	
	

	
</body>
</html>