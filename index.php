<?php 
session_start();

	include("mysqlconnect.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		/*$user_name = $_POST['USERNAME'];
		$password = $_POST['PASSWORD'];
        $gender = $_POST['GENDER'];
        $profession = $_POST['PROFESSION'];*/
		
		$user_name = mysqli_real_escape_string($con, $_POST['USERNAME']);
		$password = mysqli_real_escape_string($con, $_POST['PASSWORD']);
        $gender = mysqli_real_escape_string($con, $_POST['GENDER']);
        $profession = mysqli_real_escape_string($con, $_POST['PROFESSION']);
		/*$user_name =htmlspecialchars($user_name);
		$password=htmlspecialchars($password);
		$gender=htmlspecialchars($gender);
		$profession=htmlspecialchars($profession);*/
		
        

		if(!empty($user_name) && !empty($password) && !empty($gender) && !empty($profession)  && !is_numeric($user_name)) 
		{

			//save to database
			$user_id = random_num(2);
			$query = "insert into users (USERID, USERNAME, PASSWORD, GENDER, PROFESSION) values ('$user_id','$user_name','$password', '$gender','$profession')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}
	    else
	    {
		    echo "Invalid Entry!";
	    }

        
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	#title
    {
        font-size: 30px; 
        margin: 10px; 
        color: white;
        align-content: center;


    }

	#text{

		height: 40px;
        
		border-radius: 10px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
        margin:40 0 10px
    
	}

	#button{

		padding: 10px;
		color : white;
        background-color: #799;
		border: none;
        margin: 40 0px;
        width: 100%;
        border-radius: 10px
    
	}

	#box{

		background-color: hsla(50, 33%, 25%, .75);
        border-radius: 10px; 
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div id="title">Signup</div>

			
            <input id="text" type="text" name="USERNAME" placeholder="Create a username"><br><br>
			<input id="text" type="password" name="PASSWORD" placeholder="Password"><br><br>
            <input id="text" type="text" name="GENDER" placeholder="Gender"><br><br>
			<input id="text" type="text" name="PROFESSION" placeholder="Your Profession"><br><br>
			

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Login</a><br><br>
		</form>
	</div>

</body>
</html>