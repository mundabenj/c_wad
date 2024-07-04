<?php
    require_once("includes/db_connect.php");
    include_once("templates/header.php");
    include_once("templates/nav.php");

    if(isset($_POST["sign_up"])){
        $_SESSION["fullname"] = $fullname = mysqli_real_escape_string($conn, ucwords(strtolower($_POST["fullname"])));
        $_SESSION["email"] = $email = mysqli_real_escape_string($conn, strtolower($_POST["email_address"]));
        $_SESSION["username"] = $username = mysqli_real_escape_string($conn, strtolower($_POST["username"]));
        $_SESSION["passphrase"] = $passphrase = mysqli_real_escape_string($conn, $_POST["passphrase"]);
        $_SESSION["rep_pass"] = $rep_pass = mysqli_real_escape_string($conn, $_POST["rep_pass"]);
        $_SESSION["genderId"] = $genderId = mysqli_real_escape_string($conn, $_POST["genderId"]);
        $_SESSION["roleId"] = $roleId = mysqli_real_escape_string($conn, $_POST["roleId"]);


        unset($_SESSION["error"]);
        // verify that the full name contains only letters, space and single quotation
        if(ctype_alpha(str_replace(" ", "", str_replace("\'", "", $fullname))) === FALSE){
            $_SESSION["nameLetter_err"] = "wrong name format";
            $_SESSION["error"] = "";
        }

        // verify that the email has the correct format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION["wrong_email_format"] = "wrong email format";
            $_SESSION["error"] = "";
        }
        
        // verify that the email address domain is authorized (strathmore.edu, gmail.com, yahoo.com, etc)
        $val_dom = ["strathmore.edu", "gmail.com", "yahoo.com"];
        $em_arr = explode("@", $email);
        $spot_dom = end($em_arr);
        if(!in_array($spot_dom, $val_dom)){
            $_SESSION["invalid_dom"] = "Invalid email domain " . $spot_dom ;
            $_SESSION["error"] = "";
        }

        // verify that the new email address does not exist already in the database
        $spot_em_ex = "SELECT `email` from `users` WHERE `email` = '$email' LIMIT 1";
        $spot_em_ex_res = $conn->query($spot_em_ex);
        if($spot_em_ex_res->num_rows > 0){
            $_SESSION["email_exists"] = "email exists";
            $_SESSION["error"] = "";
        }

        // verify that the new username does not exist already in the database
        $spot_un_ex = "SELECT `username` from `users` WHERE `username` = '$username' LIMIT 1";
        $spot_un_ex_res = $conn->query($spot_un_ex);
        if($spot_un_ex_res->num_rows > 0){
            $_SESSION["username_exists"] = "username exists";
            $_SESSION["error"] = "";
        }

        // verify that the password is identical to the repeat password
        if(strcmp($passphrase, $rep_pass) != 0){
            $_SESSION["matching_pass"] = "Passwords not matching";
            $_SESSION["error"] = "";
        }

        // verify that the password length is between 4 and 8 characters
        if(strlen($passphrase) < 4 OR strlen($passphrase) > 8){
            $_SESSION["error_pass_len"] = "password length should be between 4 and 8 characters";
            $_SESSION["error"] = "";
        }

        if(!isset($_SESSION["error"])){

            
$hash_pass = PASSWORD_HASH($rep_pass, PASSWORD_DEFAULT);


        $insert_user = "INSERT INTO users (fullname, email, username, password, genderId, roleId) VALUES ('$fullname', '$email', '$username', '$hash_pass', '$genderId', '$roleId')";
        
        if ($conn->query($insert_user) === TRUE) {
            header("Location: signup.php");
                // remove all session variables
            session_unset();
            $_SESSION["success"] = "";
            exit();
        } else {
            echo "Error: " . $insert_user . "<br>" . $conn->error;
        }
    }
    }
?>

<div class="header">
    <h1>Sign Up</h1>
</div>
        
<div class="row">
    <div class="content">
    <h1>Sign Up</h1>
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact_form" autocomplete="off">
        <?php if(isset($_SESSION["success"])){ print '<span class="success_form">Record Created successfully</span>'; unset($_SESSION["success"]); } ?><br>
        <label for="Fn">Fullname:</label><br>
        <input type="text" name="fullname" id="Fn" maxlength="50" placeholder="Fullname" required <?php if(isset($_SESSION["fullname"])){?> value="<?php print $_SESSION["fullname"]; unset($_SESSION["fullname"]); ?>" <?php } ?> autofocus><br>
        <?php if(isset($_SESSION["nameLetter_err"])){ print '<span class="error_form">'.$_SESSION["nameLetter_err"].'</span>'; unset($_SESSION["nameLetter_err"]); } ?>
        <br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email_address" maxlength="50" placeholder="Email address" required <?php if(isset($_SESSION["email"])){?> value="<?php print $_SESSION["email"]; unset($_SESSION["email"]); ?>" <?php } ?>><br>
        <?php if(isset($_SESSION["wrong_email_format"])){ print '<span class="error_form">'.$_SESSION["wrong_email_format"].'</span>'; unset($_SESSION["wrong_email_format"]); } ?>
        <?php if(isset($_SESSION["invalid_dom"])){ print '<span class="error_form">'.$_SESSION["invalid_dom"].'</span>'; unset($_SESSION["invalid_dom"]); } ?>
        <?php if(isset($_SESSION["email_exists"])){ print '<span class="error_form">'.$_SESSION["email_exists"].'</span>'; unset($_SESSION["email_exists"]); } ?>
        <br>
        
        <label for="username">Username: </label><br>
        <input type="text" id="username" name="username" maxlength="50" placeholder="Username" required <?php if(isset($_SESSION["username"])){?> value="<?php print $_SESSION["username"]; unset($_SESSION["username"]); ?>" <?php } ?>><br>
        <?php if(isset($_SESSION["username_exists"])){ print '<span class="error_form">'.$_SESSION["username_exists"].'</span>'; unset($_SESSION["username_exists"]); } ?>
        <br>
        
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="passphrase" placeholder="Password" required <?php if(isset($_SESSION["passphrase"])){?> value="<?php print $_SESSION["passphrase"]; unset($_SESSION["passphrase"]); ?>" <?php } ?> ><br>
        <?php if(isset($_SESSION["error_pass_len"])){ print '<span class="error_form">'.$_SESSION["error_pass_len"].'</span>'; unset($_SESSION["error_pass_len"]); } ?>
        <br>

        <label for="rep_pass">Repeat Password: </label><br>
        <input type="password" id="rep_pass" name="rep_pass" placeholder="Repeat Password" required <?php if(isset($_SESSION["rep_pass"])){?> value="<?php print $_SESSION["rep_pass"]; unset($_SESSION["rep_pass"]); ?>" <?php } ?> ><br>
        <?php if(isset($_SESSION["matching_pass"])){ print '<span class="error_form">'.$_SESSION["matching_pass"].'</span>'; unset($_SESSION["matching_pass"]); } ?>
        <br>
        

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