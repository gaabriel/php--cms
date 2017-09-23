<?php

function UPacc()
{
    $link = mysqli_connect("localhost", "root", "", "generaldata");
    $IDp = $_SESSION['ownID'];
    $query = "UPDATE usersbank SET user_name = '{$_POST['pName']}',user_lastname = '{$_POST['pLast']}',user_birthday = '{$_POST['pBirth']}',user_email = '{$_POST['pEmail']}',user_password = '{$_POST['pPass']}',user_gender = '{$_POST['pSex']}' WHERE user_id='{$IDp}'";
    mysqli_query($link,$query) or die(mysqli_error($link));

    $_SESSION['lEmail'] = $_SESSION['pEmail']; unset($_SESSION['pEmail']); 
    $_SESSION['lPass'] = $_SESSION['pPass']; unset($_SESSION['pPass']);

    echo "  <div id='marginstart'></div>
            <h2 id='set-updater-text'>Successfully Updated</h2>";
}


function UPsoc()
{
    $link = mysqli_connect("localhost", "root", "", "generaldata");
    $IDp = $_SESSION['ownID'];
    $query = "UPDATE usersbank SET user_course = '{$_POST['pCourse']}',user_facebook = '{$_POST['pFace']}',user_twitter = '{$_POST['pTwitter']}',user_instagram = '{$_POST['pInsta']}' WHERE user_id='{$IDp}'";
    mysqli_query($link,$query) or die(mysqli_error($link));

    echo "  <div id='marginstart'></div>
            <h2 id='set-updater-text'>Successfully Updated</h2>";
}





?>