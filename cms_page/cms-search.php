<?php 
$link = mysqli_connect("localhost", "root", "", "generaldata");

if(isset($_GET["page"]))
{
	$page  = $_GET["page"];
} 
else { $page=1; }; 

$num_rec_per_page=10;
$start_from = ($page-1) * $num_rec_per_page; 

$sql = "SELECT * FROM pending_users LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query
?> 
	<table>
		<tr><td>id</td><td>token</td></tr>
<?php 
		while($row = mysql_fetch_assoc($rs_result))
		{ 
?> 
        	<tr>
            	<td><?php echo $row[0]; ?></td>
	            <td><?php echo $row[1]; ?></td>            
    	    </tr>
<?php 
		}; 
?> 
	</table>
<?php 
	$sql = "SELECT * FROM student"; 
	$rs_result = mysql_query($sql); //run the query
	$total_records = mysql_num_rows($rs_result);  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 

	echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) 
	{ 
        echo "<a href='pagination.php?page=".$i."'>".$i."</a> "; 
	}; 
	echo "<a href='pagination.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>