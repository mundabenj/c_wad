<?php
session_start();

if(isset($_SESSION["fname"])){
    print "Yes";
    print '<br>';
    print '<a href="page_04.php">Destroy Session</a>';
}else{
    print "No";
    print '<br>';
    print '<a href="page_01.php">Create Session</a>';
}
?>


