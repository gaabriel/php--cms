<script type="text/javascript">

function gpost_grow(element) 
{
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

</script>


<?php

function GroupPanel($n)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$query = "SELECT group_from,group_name,group_code FROM g_bank WHERE group_id = {$n}";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	global $c; $c = mysqli_num_rows($result); global $panel;
	if($c==1){ $panel = mysqli_fetch_array($result);} else {echo "This group no longer exists."; die();}
}

function Permission($gid,$uid)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$query = "SELECT GU_level FROM g_ulink WHERE (GU_gid={$gid} AND GU_uid={$uid}) ORDER BY GU_id DESC LIMIT 0,1";
	$result = mysqli_query($link, $query) or die(mysqli_error($link)); $row = mysqli_fetch_array($result);
	global $perm; $perm = $row[0];
}

function MyGroups($u)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$query = "SELECT GU_gid FROM g_ulink WHERE GU_uid={$u} AND GU_level='A' ORDER BY GU_id ASC";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$mrows = mysqli_num_rows($result);
	while ($row = mysqli_fetch_assoc($result)) 
	{
    	foreach ($row as $value) 
	    {
    	    echo "<a href='../g/groups.php?id=". $value ."'>ooooooo</a>";
	    }
    	echo '<br/>';
	}
	if($mrows==0)
	{
		echo "look for an id:<br/><form method='get'><input type='number' name='id' value='Submit'></form>";
	}

}


function ListGmembers($u)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$query = "SELECT GU_uid FROM g_ulink WHERE GU_gid={$u} AND GU_level LIKE '%A%' ORDER BY GU_id DESC ";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$mitems = array();
	while($theids = mysqli_fetch_assoc($result))
	{
		foreach($theids as $onlyid){ $mitems[] = $onlyid;}
	}
	$mitems = implode("," , $mitems);

	$sql = "SELECT * FROM usersbank WHERE '$mitems' in (user_id)";
	$finalname = mysqli_query($link, $sql) or die(mysqli_error($link));
	while ($row = mysqli_fetch_array($finalname)) 
	{
		echo '<tr>';
		echo '<td>' . $row[0] . '</td>';
		echo '<td>' . $row[1] . '</td>';
		echo '<td>' . $row[2] . '</td>';
		echo '</tr>';
	}



/*  echo $user_id.' '.$user_name.' '.$user_lastname ;
(user_id, user_name, user_lastname)
echo '<td>' . $row[0] . '</td>';
				echo '<td>' . $row[1] . '</td>';
				echo '<td>' . $row[2] . '</td>';


	/*$arraymembers = mysqli_fetch_array($result, MYSQLI_NUM); $NRows=mysqli_num_rows($result);echo $NRows."<br/>";
	for ($i=0; $i<$NRows; $i++){ echo "**************<a>";echo $arraymembers[$i]; echo "</a>********<br/>"; }

	/*if($NR>=2){ $arrmember = implode(',', $arrmember); }*/
	
	/*
    $sql = "SELECT user_name,user_lastname FROM usersbank WHERE user_id IN($arrmember)";
	$qry = mysqli_query($link,$sql) or die(mysqli_error($link));	
	while ($ro = mysqli_fetch_assoc($qry))
	{
    	foreach ($ro as $value)
	    {
	    	extract($ro); $unamebig = $user_name." ".$user_lastname; echo $unamebig."**";
	   	}
	}	


	if($NRows>1){ $arraymembers = explode('=', $arraymembers); }
	*/
}





//                     







//while ($row = mysqli_fetch_array($result))             ORDER BY askp_id DESC LIMIT 0,{$ShowPaskrel} ";
/*while ($members = mysqli_fetch_assoc($result)) 
	{
    	foreach ($members as $value)
	    {
	    	$sql = "SELECT user_name,user_lastname FROM usersbank WHERE user_id={$value}";
			$qry = mysqli_query($link,$sql) or die(mysqli_error($link));
			
			while ($ro = mysqli_fetch_array($qry))
			{ extract($ro); $unamebig = $user_name." ".$user_lastname; }
			
			$unamebig = isset($unamebig)?$unamebig:'/disabled profile/';
    	    echo "<a href='../display/profile.php?user=".$value."'>". $unamebig ."</a>";
	   	}
	   	echo '<br/>';
	}//guardar num array os prontos em vez de dar echo individual,, aí sorteia por alfabeto
	
	if($members==0)
	{
		echo "look for an id:<br/><form method='get'><input type='number' name='id' value='Submit'></form>";
	}*/
?>