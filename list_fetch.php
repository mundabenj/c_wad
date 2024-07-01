<table class="table table-dark table-hover">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Handle</th>
        <th scope="col">Fullname</th>
        <th scope="col">Email</th>
    </thead>
    <tbody>
<?php
require_once("includes/db_connect.php");

if(isset($_POST["query"])){
    $search_term = mysqli_real_escape_string($conn, $_POST["query"]);
    $sel_stds = "SELECT * FROM students WHERE username LIKE '%$search_term%' OR fullname LIKE '%$search_term%' ORDER BY fullname ASC";
}else{
    $sel_stds = "SELECT * FROM students ORDER BY fullname ASC";
}
$sel_res = ($conn->query($sel_stds));
$sn = 0;
while($sel_row = $sel_res->fetch_assoc()){
    $sn++;
?>
<tr>
    <td><?php print $sn;?></td>
    <td><?php print $sel_row["username"];?></td>
    <td><?php print $sel_row["fullname"];?></td>
    <td><?php print $sel_row["email"];?></td>
</tr>
<?php
}
?>
    </tbody>
</table>