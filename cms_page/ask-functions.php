<script type="text/javascript">

function askpost_grow(element) 
{
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

</script>


<?php


function askPost($posterID)
{
	echo "<div id='ASKpost'>
			<form method='post' action='asky.php' autocomplete='off'>
						<input type='text' name='askpuID' style='display:none;' value=".$posterID."/>
				<div id='titleaskp'>Ask something:</div>
				<div style='margin-bottom:2px;'>
					<input type='text' name='titleAskp' id='askptittag' minlength='4' maxlength='80' placeholder='question title / 4-80 chars'>
				</div>
				<textarea name='askpbody' onkeyup='askpost_grow(this);' minlength='10' maxlength='800' 	placeholder='from 10 to 800 chars' wrap=VIRTUAL TextMode='MultiLine'></textarea>
				<div id='butright'><input type='submit' value='Send' class='askpbut'/></div>
			</form>
		</div>";
}


function RelASKPosts($ShowPaskrel)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$query = "SELECT askp_id,askp_title,askp_stamp FROM askposts ORDER BY askp_id DESC LIMIT 0,{$ShowPaskrel} ";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	while ($row = mysqli_fetch_array($result))
	{
	    echo "<div id='askpask'>
				<div id='askpaskti'><a href='../ask/see.php?id=".$row[0]."'>".$row[1]."</a></div>
				<div id='askpasktf'>".$row[2]."</div>
			</div>
			<div id='askpaskbackgr'>&nbsp;</div>";
	} 
}



function askpIDpage($fileASKP)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$query = "SELECT askp_uid,askp_title,askp_stamp,askp_body FROM askposts WHERE askp_id={$fileASKP}";
	$result = mysqli_query($link, $query)or die(mysqli_error($link));
	$count= mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	if($count==1)
	{
		$sql = "SELECT user_name,user_lastname FROM usersbank WHERE user_id='{$row[0]}'";
		$qry = mysqli_query($link,$sql) or die(mysqli_error($link));
		while ($ro = mysqli_fetch_array($qry))
		{ extract($ro); $askpauthor1 = $user_name." ".$user_lastname; }
		$askpauthor1 = isset($askpauthor1)?$askpauthor1:'/disabled profile/';
		echo "	<div id='ASKseepost'>
					<form>
						<div id='askpseetd'>".$row[2]."</div>
						<div id='askpseeauthor'><a href='../display/profile.php?user=".$row[0]."'>". $askpauthor1 ."</a></div>
						<div class='askpseeteb'>
							<div id='askpseetitle'>".$row[1]."</div>
							<div id='askpseebody'><pre>".$row[3]."</pre></div>
						</div>
					</form>
				</div>";
	}
	else 
	{
		echo "	<div id='ASKseepost'>
					<form method='get'>
						Nothing with this id on register,<br/>Try another one:<br/>
						<input type='number' name='id' value='Submit'> 
					</form>
				</div>";
	}
}


function askReply($replierID, $askseeID)
{
	echo "	<div id='ASKreply'>
				<form method='post' action='askr.php' autocomplete='off'>
						<input type='text' name='askruID' style='display:none;' value=".$replierID.">
						<input type='text' name='askrseeID' style='display:none;' value=".$askseeID.">
					<div id='titleaskr'>Reply:</div>
					<textarea name='askrbody' onkeyup='askpost_grow(this);' minlength='10' maxlength='500' 	placeholder='from 10 to 500 chars' wrap=VIRTUAL TextMode='MultiLine'></textarea>
					<div id='butrightr'><input type='submit' value='Send' class='askrbut'/></div>
				</form>
			</div>";
}


function RelASKReply($question,$ID)
{
	$link = mysqli_connect("localhost", "root", "", "generaldata");
	$query = "SELECT askr_uid,askr_body,askr_stamp,askr_id FROM askreply WHERE askr_aim={$question} ORDER BY askr_id DESC";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	while ($row = mysqli_fetch_array($result))
	{
		$sql = "SELECT user_name,user_lastname FROM usersbank WHERE user_id='{$row[0]}'";
		$qry = mysqli_query($link,$sql) or die(mysqli_error($link));
		while ($ro = mysqli_fetch_array($qry))
		{ extract($ro); $askpauthor = $user_name." ".$user_lastname; }
		$askpauthor = isset($askpauthor)?$askpauthor:'/disabled profile/';

		$sql = "SELECT v_v FROM askvotes WHERE (v_rid='{$row[3]}' and v_v='U')";
		$qry = mysqli_query($link,$sql) or die(mysqli_error($link));
		$Vup = mysqli_num_rows($qry);
		$sql = "SELECT v_v FROM askvotes WHERE (v_rid ='{$row[3]}' and v_v='D')";
		$qry = mysqli_query($link,$sql) or die(mysqli_error($link));
		$Vdown = mysqli_num_rows($qry);

		echo "	<div id='askrask'>
	    			<div id='askraskBlockVote'>
	    				<div class='votepad'>
		    				<a id='voteup' class='' href='askvote.php?askv=U&&repId=".$row[3]."&&fromId=".$question."'><p>▲".$Vup."</p></a>
							<a id='votedown' class='' href='askvote.php?askv=D&&repId=".$row[3]."&&fromId=".$question."'><p>▼".$Vdown."</p></a>
		    			</div>
	    			</div>
	    			<div id='askraskBlock'>
						<div id='askraskre'><pre>".$row[1]."</pre></div>
						<div id='askrasktdnl'><a href='../display/profile.php?user=".$row[0]."'>".$askpauthor."</a></div>
						<div id='askrasktdnr'>".$row[2]."</div>
					</div>
				</div>";
	} 
}

?>