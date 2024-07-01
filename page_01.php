<form action="" method="post">
    <input type="text" name="fname" id=""><br>
    <input type="submit" name="create" value="Create">
</form>

<?php
session_start();


if(isset($_POST["create"])){
    $_SESSION["fname"] = $_POST["fname"];

    print $_SESSION["fname"];

    print '<br>';
    print '<a href="page_02.php">Go to page 02</a>';
}



?>