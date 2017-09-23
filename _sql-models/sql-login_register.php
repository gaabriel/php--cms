<?php




/////////////////////            Checar Registros /           /////////////////////////////



$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');

mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));

// select the movie titles and their genre after 1990
$query = 'SELECT user_id, user_email, user_password
        FROM usersbank
        ORDER BY user_id';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

// show the results
echo '<table border="3" cellpadding="6" cellspacing="2" style="text-align:center;margin-left: auto;margin-right: auto;">';
while ($row = mysqli_fetch_assoc($result)) 
{
    echo '<tr>';
    foreach ($row as $value) 
    {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
    /*    
    WHERE movie_year > 1990
    ORDER BY movie_type'









    */
?>