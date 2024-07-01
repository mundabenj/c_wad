<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="startTime();">
    <div id="demo"></div>
    <script>
        document.getElementById("demo").innerHTML = "My first JS code";
    </script>
<br>
<br>
<button onclick="document.getElementById('myImg').src='images/bg/turn_on.jpg'">Turn On</button>
<img src="images/bg/turn_on.jpg" alt="" id="myImg" width="200px">
<button onclick="document.getElementById('myImg').src='images/bg/turn_off.jpg'">Turn Off</button>

<br>
<br>
<a href="" onclick="return confirm('Are you sure?')">Delete</a>
<br>
<br>

<script>
    document.write(15 + 23);
</script>
<br>
<br>

<script>
    // window.alert('Record created')
</script>

<script>
    console.log(45 - 42);
</script>
<br>
<br>

<button onclick="window.print();">Print this page</button>
<br>
<br>
<script>
    let myAge = 45;
    const fullname = 'Alex Okama'
    document.write(fullname + ' is ' + myAge + ' years old.');
</script>

<script>
    // var firstname = prompt('What is your fisrt name?');
    // document.write(firstname);
</script>

<?php
    date_default_timezone_set ("Africa/Nairobi");
    print "Static timer: " . date("H:i:s");
?>
<br>
Dynamic time: <span id="txt"></span>
<br><br><br>
<script src="js/script.js"></script>

</body>
</html>