<?php

function PshowProfile()//goes on settings
{
	$IDp = $_SESSION['ownID'];

	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$sqlp = "SELECT * FROM usersbank WHERE user_id = '{$IDp}'";
	$queryp = mysqli_query($link,$sqlp) or die(mysqli_error($link));
	$diggerp = mysqli_num_rows($queryp);
	if($diggerp == 1)
	{
		while ($rowsp=mysqli_fetch_array($queryp))
		{
			$_SESSION['INFOtotal'] = $rowsp;
		}
	} 	else 	{	die();	}
}


function responsiveName($receiveAll)//to shot the name
{
	$slength = strlen($receiveAll);
	switch ($slength) 
	{
		case $slength<16: $resp = "style='font-size: 20pt;'"; return $resp;
		case $slength<24: $resp = "style='font-size: 18pt;'"; return $resp; 			
		case $slength<33: $resp = "style='font-size: 17pt;'"; return $resp;		
		default: $resp = "style='font-size: 16pt;'"; return $resp;
	}
}


function responsiveCourse($receiveC)//to short the course
{
	$clength = strlen($receiveC);
	switch ($clength) 
	{
		case $clength<17: $cresp = "style='font-size: 18pt;'"; return $cresp;
		case $clength<25: $cresp = "style='font-size: 17pt;'"; return $cresp;			
		case $clength<31: $cresp = "style='font-size: 16pt;'"; return $cresp;
		case $clength<34: $cresp = "style='font-size: 15pt;'"; return $cresp;
		case $clength<41: $cresp = "style='font-size: 13pt;'"; return $cresp;		
	}
}



function radialToGenre($sorg)//to not repeat genre box
{
	if($sorg == 'M') 
	{	
		$gors = " 	<input type='radio' name='pSex' id='pMale' value='M' checked><label for='pMale'> Male &nbsp;&nbsp;</label>
            		<input type='radio' name='pSex' id='pFem' value='F'><label for='pFem'> Female </label>";
        echo $gors; 
    }
	if($sorg == 'F') 
	{
		$gors = "	<input type='radio' name='pSex' id='pMale' value='M'><label for='pMale'> Male &nbsp;&nbsp;</label>
            		<input type='radio' name='pSex' id='pFem' value='F' checked><label for='pFem'> Female </label>";
        echo $gors; 
    }
}



//verify declared id
function ifexist($existid) 
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$sql = "SELECT user_id FROM usersbank WHERE user_id='{$existid}'";
	$query = mysqli_query($link,$sql) or die(mysqli_error($link));
	$digger = mysqli_num_rows($query);
	if($digger != 1)
	{ 
		echo "<html>
			<body>
				<div id='marginstart'></div>
				<h2>This user don't exist</h2>
				<h3>look for another user id:</h3>
				<form method='get'>
					<input type='number' name='user' value='Submit'> 
				</form>
				<div class='goprof'>
					<a href=profile.php?user=".$_SESSION['ownID']."><h2>See your profile</h2></a>
				</div>
			</body>
			<head>
				<title>Profiles</title>
				<meta name='viewport' content='width=device-width, initial-scale=.92, maximum-scale=1.2'>
			</head>
		</html>";
		die(); 
	}
}

//show ANY profile by the Url
function profil($IDshow)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$sql = "SELECT user_name,user_lastname,user_course,user_facebook,user_twitter,user_instagram FROM usersbank WHERE user_id ='{$IDshow}'";
	$query = mysqli_query($link,$sql) or die(mysqli_error($link));
	$digger = mysqli_num_rows($query);
	if($digger == 1)
	{
		while ($row = mysqli_fetch_array($query)){ $_SESSION['IDshow'] = $row; } 
	}
	else{	die();	}
}

//if no user profile declared
function noprof() 
{	
	echo "<html>
			<body>
				<div id='marginstart'></div>
				<h3>look for an id:</h3>
				<form method='get'>
					<input type='number' name='user' value='Submit'> 
				</form>
				<div class='goprof'>
					<a href=profile.php?user=".$_SESSION['ownID']."><h2>See your profile</h2></a>
				</div>
			</body>
			<head>
				<title>Profiles</title>
				<meta name='viewport' content='width=device-width, initial-scale=.92, maximum-scale=1.2'>
			</head>
		</html>";
}

?>