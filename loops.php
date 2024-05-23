<h1>Loops</h1>
<h4>While Loop</h4>
<?php
    //While loop
    $init = 0;
    while($init < 7){
        print $init . "<br>";
        $init++;
    }
?>
<h4>do-While Loop</h4>
<?php
    //do-While loop
    $i = 11;
    do{
        print $i . "<br>";
        $i++; 
    }while($i < 16);
?>
<h4>for Loop</h4>
<?php
    //for loop
for($s=44; $s<55; $s+=2){
    print $s . "<br>";
}
?>
<h4>foreach</h4>
<?php
    $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];



?>
<form action="">
    <select name="" id="">
        <option value="">--Months--</option>
        <?php 
            foreach($months AS $month){
                echo "<option value=''>$month</option>";
            }
        ?>
    </select>
    <select name="" id="">
        <option value="">--Years--</option>
        <?php 
            $y = 2015;
            while($y < 2030){
                print"<option value=''>$y</option>";
                $y++;
            }
        ?>
    </select>
</form>