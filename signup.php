<?php
    require_once("includes/db_connect.php");
    include_once("templates/header.php");
    include_once("templates/nav.php");

    if(isset($_POST["sign_up"])){
        $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
        $email = mysqli_real_escape_string($conn, $_POST["email_address"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $passphrase = mysqli_real_escape_string($conn, $_POST["passphrase"]);
        $genderId = mysqli_real_escape_string($conn, $_POST["genderId"]);
        $roleId = mysqli_real_escape_string($conn, $_POST["roleId"]);

        // verify that the full name contains only letters, space and single quotation

        // verify that the email has the correct format

        if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
            header("Location: ?wrong_email_format");
            exit();
        }
        
        // verify that the email address domain is authorized (Strathmore.edu, gmail.com, yahoo.com, etc)

        // verify that the new email address does not exist already in the database
        
        // verify that the new username does not exist already in the database
        
        // verify that the password is identical to the repeat password
        
        // verify that the password length is between 6 and 16 characters


        $insert_message = "INSERT INTO messages (sender_name, sender_email, subject_line, message) VALUES ('$fullname', '$email', '$subject_line', '$text_message')";
        
        if ($conn->query($insert_message) === TRUE) {
            header("Location: view_messages.php");
            exit();
        } else {
            echo "Error: " . $insert_message . "<br>" . $conn->error;
        }
    }
?>

<div class="header">
    <h1>Sign Up</h1>
</div>
        
<div class="row">
    <div class="content">
    <h1>Sign Up</h1>
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact_form">
        <label for="Fn">Fullname:</label><br>
        <input type="text" name="fullname" id="Fn" maxlength="50" placeholder="Fullname" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email_address" maxlength="50" placeholder="Email address" required><br>
        <?php if(isset($_GET["wrong_email_format"])){ print "<span class='error_form'>wrong email format</span>"; } ?>
        <br>

        <label for="username">Username: </label><br>
        <input type="text" id="username" name="username" maxlength="50" placeholder="Username" required><br><br>

        <label for="password">Password: </label><br>
        <input type="password" id="password" name="passphrase" placeholder="Password" required><br><br>
        
        <label for="genderId">Gender:</label><br>
        <select name="genderId" id="genderId" required>
            <option value="">--Select Gender--</option>
            <?php
$sel_gen = "SELECT * FROM `gender` ORDER BY gender ASC";
$sel_gen_res = $conn->query($sel_gen);
while($sel_gen_row = $sel_gen_res->fetch_assoc()) {
?>
    <option value="<?php print $sel_gen_row["genderId"]; ?>"><?php print $sel_gen_row["gender"]; ?></option>
<?php } ?>

        </select>
        <br>

        <label for="roleId">Role:</label><br>
        <select name="roleId" id="roleId" required>
            <option value="">--Select Role--</option>
            <?php
$sel_rol = "SELECT * FROM `roles` ORDER BY role ASC";
$sel_rol_res = $conn->query($sel_rol);
while($sel_rol_row = $sel_rol_res->fetch_assoc()) {
?>
    <option value="<?php print $sel_rol_row["roleId"]; ?>"><?php print $sel_rol_row["role"]; ?></option>
<?php } ?>
        </select>

        <br><br>
    <input type="submit" name="sign_up" value="Sign Up" >
</form>
</div>
<?php include_once("templates/side_bar.php");?>
        </div>      
<?php include_once("templates/footer.php");?>