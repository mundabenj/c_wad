<?php
session_start();

unset($_SESSION["fname"]);

header("Location: page_03.php");