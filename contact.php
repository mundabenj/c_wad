<?php include_once("templates/header.php");?>
<?php include_once("templates/nav.php");?>
<div class="header">
    <h1>Talk To Us</h1>
</div>
        
<div class="row">
    <div class="content">
    <h1>Forms</h1>
    <form action="" method="" class="contact_form">
        <label for="Fn">Fullname:</label><br>
        <input type="text" id="Fn" placeholder="Fullname"><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="mail" placeholder="Email address"><br><br>
        
        <label for="sb">Subject:</label><br>
        <select name="" id="sb">
            <option value="">---Select Subject-</option>
            <option value="1">Email Support</option>
            <option value="2">eLearning Support</option>
            <option value="3">AMS Support</option>
        </select>
        <br><br>
    <label for="ms">Message:</label><br>
    <textarea cols="30" rows="7" name="message" id="ms"></textarea><br><br>
    
    <input type="submit" value="Send Message">
</form>
</div>
<?php include_once("templates/side_bar.php");?>
        </div>      
        <?php include_once("templates/footer.php");?>
