<?php
    include('../_base/outbasestuff-cms.php');
    include('../_base/_cms-bar.php');
?>

<head>
    <title>User Updates</title>
    <meta name="viewport" content="width=device-width, initial-scale=.55, maximum-scale=.55">
</head>
 
<?php
    $updateQ = $_GET['uq'];

    if($updateQ==0)
    {
        if(isset($_POST['pPass']))
        {
            $_SESSION['pPass'] = $_POST['pPass'];
        }
        if(isset($_POST['pEmail']))
        {
            $_SESSION['pEmail'] = $_POST['pEmail'];
        }
        
        require('set-functions.php');
        UPacc();
    }
    
    if($updateQ==1)
    {
        require('set-functions.php');
        UPsoc();
    }
?>