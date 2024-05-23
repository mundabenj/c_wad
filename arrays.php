<h1>Arrays</h1>

<?php
    // Indexed or numeric arrays
    $fnames = ["Alex", "Peter", "James"];
    print_r($fnames);

    echo '<br>';

    $colors = array("Black", "Green", "Yellow", "White", "Red", "Blue", "Red", "Blue");
?>
<pre>
    <?php  print_r($colors); ?>
</pre>
<?php  print $fnames[1]; ?>
<?php
// Associative Arrays

$user = [
    "fullname" => "Alex Okama",
    "email" => "AOkama@yahoo.com",
    "phone" => "+2547855555"
];

?>
<pre>
    <?php  print_r($user); ?>
</pre>

<?php
// Multidimentional Arrays

$user_details = [
    "Director" => array(
        "fullname" => "Alex Okama",
        "email" => "AOkama@yahoo.com",
        "address" => "Mada",
        "phone" => [
            "Mobile" => "+254715546456",
            "Work" => "+254715547156",
            "Cell" => "+254715549656"
        ]
        ),
    "Manager" => array(
        "fullname" => "Peter Okama",
        "email" => "POkama@yahoo.com",
        "address" => "Mada",
        "phone" => [
            "Mobile" => "+254715544456",
            "Work" => "+254715547144",
            "Cell" => "+254715549636"
        ]
        ),
    "Secretary" => array(
        "fullname" => "Ann Okama",
        "email" => "Okama@yahoo.com",
        "address" => "Mada",
        "phone" => [
            "Mobile" => "+254715585456",
            "Work" => "+254715545414",
            "Cell" => "+254715549636"
        ]
        )
        ];
        print $user_details["Secretary"]["phone"]["Work"];
?>
<pre>
    <?php  print_r($user_details); ?>
</pre>
<?php
$items = ["book", "pen", 456, 45.5, "File54"];
?>

<pre>
    <?php  var_dump($items); ?>
</pre>

<?php
// fnames
$age = [45, 42, 23];

    $user_age = array_combine($fnames, $age);

    $user_data = array_merge($fnames, $age);
?>

<pre>
    <?php  print_r($user_data); ?>
</pre>
