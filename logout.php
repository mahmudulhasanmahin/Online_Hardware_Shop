<?php
  if (session_status() == PHP_SESSION_NONE) {
  session_start();}
  $_SESSION["loginstatus"]="false";
session_unset();

header("location:index.php");
?>
