<?php

$u = '9012345678901';
echo $u;echo "<br/>";
$u = sha1($u);
echo $u;echo "<br/>";
$c = strlen($u);
echo $c;echo "<br/>";

function calcAge($birth,$now)//calculate age
{
    $difference = abs(strtotime($now) - strtotime($birth));

    $years = floor($difference / (365*60*60*24));
    $months = floor(($difference - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($difference - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

    return $years;
}
































/*



















<input style='display:none;' type='text' name='tagsAskp' id='askptittag' size='25' minlength='4' maxlength='40' placeholder='ex: #History / 4-40 chars'>






 set prof           <h3><label for="pUrl"> profile/ </label><br/><input type="name" name="pUrl" id="pUrl" size="25" minlength="5" maxlength="30" placeholder="your own url" value="<?php echo $_SESSION['INFOtotal'][12]; ?>"></h3>

set updat           if(isset($_POST['pUrl']))
        {
            $_SESSION['pUrl'] = $_POST['pUrl'];
        }


set functions           $url = $_SESSION['pUrl'];
                      $urltran = preg_replace('/ /','-',$url);
                    ////////////////////////
                      user_url = '{$urltran}'
                      /////////////////////////
                      echo "<h3>new url: ". $urltran ."</h3>";

                $_SESSION['ownURL'] = $_SESSION['pUrl'];
                unset($_SESSION['pUrl']);
                ////////////////////////////////////
                user_url = '{$urltran}'
                /////////////////////
                 echo "<h3>url: ".$urltran."</h3>";

                    $_SESSION['ownURL'] = $_SESSION['pUrl'];
                    unset($_SESSION['pUrl']);


profile/groups             $ID = $_GET['p'];
                            if($ID=='')
                        {
                echo "Sorry, no user's url inserted";
                    die();
                    }

cms bar           ?p='.$_SESSION['ownURL']; ?>


set functions
function UPsoc()
{
    $db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));
    $IDp = $_SESSION['ownID'];


            $sql = "SELECT user_id FROM usersbank WHERE user_url = '{$urltran}'";
            $query = mysqli_query($db,$sql) or die(mysqli_error($db));
            $digger = mysqli_num_rows($query);

            if($digger==0)
            {
                $query2 = "UPDATE usersbank
                        SET user_course = '{$_POST['pCourse']}',
                            user_facebook = '{$_POST['pFace']}',
                            user_twitter = '{$_POST['pTwitter']}',
                            user_instagram = '{$_POST['pInsta']}',
                            
                        WHERE user_id = '{$IDp}'";
                mysqli_query($db,$query2) or die(mysqli_error($db));

                echo "<h2 id='set-updater-text'>Successfully Updated</h2>";
                
            }
            
            if($digger==1)
            {
                $rows = mysqli_fetch_array($query);
                extract($rows);

                if($user_id==$IDp)
                {
                    $query = "UPDATE usersbank
                            SET user_course = '{$_POST['pCourse']}',
                                user_facebook = '{$_POST['pFace']}',
                                user_twitter = '{$_POST['pTwitter']}',
                                user_instagram = '{$_POST['pInsta']}',
                                
                            WHERE user_id = '{$IDp}'";
                    mysqli_query($db,$query) or die(mysqli_error($db));

                    echo "<h2 id='set-updater-text'>Successfully Updated</h2>";
                   
                }
                else
                {
                    echo "<h2 id='set-updater-text'>this url is already taken</h2>";
                    echo "<form><input type='button' value='Back' onClick='history.go(-1);return true;''></form>";
                    die();
                }
            }
}






<input type="button" value="Update Profile" onclick="window.location='../options/set-profile.php';"/>











/*
<?php
// 1 day measured in seconds = 60 seconds * 60 minutes * 24 hours
$delta = 86400;
 
// Check to see if link has expired
if ($_SERVER["REQUEST_TIME"] - $tstamp > $delta) {
    throw new Exception("Token has expired.");
}
// do one-time action here, like activating a user account
// ...





/*

// loop through the results
			while ($row = mysqli_fetch_assoc($result)) 
			{
				extract($row);
				echo '<tr>';
				echo '<td>' . $movie_name . '</td>';
				echo '<td>' . $movie_year . '</td>';
				echo '<td>' . $movie_director . '</td>';
				echo '<td>' . $movie_leadactor . '</td>';
				echo '<td>' . $movie_type . '</td>';
				echo '</tr>';
			}     





<FORM style='margin-top:0px;'><INPUT Type='button' VALUE='Back'></FORM>



<h2> <?php echo calcAGE($_SESSION['INFOtotal'][7],date('Y-m-d')); ?> </h2>







// retrieve information
$query = 'SELECT movie_name, movie_year, movie_director, movie_leadactor, movie_type, movie_running_time, movie_cost, movie_takings
        FROM movie
        WHERE movie_id = ' . $_GET['movie_id'];

$result = mysqli_query($db,$query) or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);
$movie_name         = $row['movie_name'];
$movie_director     = get_director($row['movie_director']);
$movie_leadactor    = get_leadactor($row['movie_leadactor']);
$movie_year         = $row['movie_year'];
$movie_running_time = $row['movie_running_time'] .' mins';
$movie_takings      = $row['movie_takings'] . ' million';
$movie_cost         = $row['movie_cost'] . ' million';
$movie_health       = calculate_differences($row['movie_takings'],
            $row['movie_cost']);






while ($row = mysqli_fetch_assoc($result)) 
{
    $date = $row['review_date'];
    $name = $row['reviewer_name'];
    $comment = $row['review_comment'];
    $rating = generate_ratings($row['review_rating']);





switch ($_GET['action']) 
{
    case 'add':
        switch ($_GET['type']) 
        {
            case 'movie':
                $query = 'INSERT INTO movie (movie_name, movie_year, movie_type, movie_leadactor, movie_director)
                        VALUES  
                        (
                            "' . $_POST['movie_name'] . '",
                            ' . $_POST['movie_year'] . ',
                            ' . $_POST['movie_type'] . ',
                            ' . $_POST['movie_leadactor'] . ',
                            ' . $_POST['movie_director'] . '
                        )';
                break;
        }
        break;

    case 'edit':
        switch ($_GET['type']) 
        {
            case 'movie':
                $query = 'UPDATE movie 
                        SET 
                            movie_name = "' .$_POST['movie_name']. '",
                            movie_year = ' . $_POST['movie_year'] . ',
                            movie_type = ' . $_POST['movie_type'] . ',
                            movie_leadactor = ' . $_POST['movie_leadactor'] . ',
                            movie_director = ' . $_POST['movie_director'] . '
                        WHERE 
                            movie_id = ' . $_POST['movie_id'];
                break;
        }
    break;
}

if (isset($query)) 
{
    $result = mysqli_query($db,$query) or die(mysqli_error($db));
}














/*
function getID($logged)
{
    $db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));

    $sql = "SELECT user_id FROM usersbank
    WHERE user_email = '$logged'";
    
    $query = mysqli_query($db,$sql) or die(mysqli_error($db));
    $digger = mysqli_num_rows($query);
    $gID = mysql_fetch_assoc($query);

    if($digger == 1)
    {
        foreach($gID as $getID)
        {
            echo $getID;
        }
    }   else    {   die();  }
}*/







    /*switch ($sorg)
    {
        case '0':
            $gors = "
                    <input type='radio' name='pSex' id='pMale' value='M' checked><label for='pMale'> Male &nbsp;&nbsp;</label>
                    <input type='radio' name='pSex' id='pFem' value='F'><label for='pFem'> Female </label>
                    ";
            echo $gors;     
        case '1':
            $gors = "
                    <input type='radio' name='pSex' id='pMale' value='M'><label for='pMale'> Male &nbsp;&nbsp;</label>
                    <input type='radio' name='pSex' id='pFem' value='F' checked><label for='pFem'> Female </label>
                    ";
            echo $gors; 
    }*/












/*

$query = $db->prepare("SELECT username, tstamp FROM pending_users WHERE token = ?");
$query->execute(array($token));
$row = $query->fetch(PDO::FETCH_ASSOC);
$query->closeCursor();
 

if ($row) {
    extract($row);
}
else {
    throw new Exception("Valid token not provided.");
}
 
// do one-time action here, like activating a user account
// ...
 
// delete token so it can't be used again
$query = $db->prepare(
    "DELETE FROM pending_users WHERE username = ? AND token = ? AND tstamp = ?",
);
$query->execute(
    array(
        $username,
        $token,
        $tstamp
    )
);







































*/


?>