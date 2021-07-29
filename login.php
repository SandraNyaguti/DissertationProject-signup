<?php 

session_start();

	include("mysqlconnect.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = mysqli_real_escape_string($con,$_POST['USERNAME']);
		$password = mysqli_real_escape_string($con,$_POST['PASSWORD']);
    
        

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) 
		{

			//read from database
			$query = "select * from users where USERNAME = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) >0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['PASSWORD'] === $password)
					{

						$_SESSION['USERID'] = $user_data['USERID'];
					    header("Location: access.php");
					    die;
					}
				}
			}
			echo "Hmm Your details do not match what you gave me! give it another GO!";
		
		}else
		{
			echo "Hmm Your details do not match what you gave me! give it another GO!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<style type="text/css">
	#title
    {
        font-size: 30px; 
        margin: 10px; 
        color: white;
        align-content: center;
		padding-right: 5px
		
    }

	#text
	{

		height: 40px;
        
		border-radius: 10px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
        margin:40 0 10px
    
	}

	#button
	{

		padding: 10px;
		color : white;
        background-color: #799;
		border: none;
        margin: 40 0px;
        width: 100%;
        border-radius: 10px
    
	}

	#box
	{

		background-color: hsla(50, 33%, 25%, .75);
        border-radius: 10px; 
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div id="title">Please Login </div>

			<input id="text" type="text" name="USERNAME" placeholder="Username"><br><br>
			<input id="text" type="password" name="PASSWORD" placeholder="Password"><br><br>

			<input id="button" type="submit" value="Login"> <br><br>

			

			

		</form>
	</div>
</body>
</html>