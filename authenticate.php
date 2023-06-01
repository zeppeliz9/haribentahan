<?php 
//No access if not logged in
if(!isset($_SESSION['auth']))
{
    header('Location: login.php');
    redirect("login.php",'Please log in to continue.');
}
?>