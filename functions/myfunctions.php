<?php
session_start();
include('../config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * from $table";
    return $query_run = mysqli_query($con,$query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * from $table WHERE id = '$id' ";
    return $query_run = mysqli_query($con,$query);
}

//For user side access to data
function getAllActive($table)
{
    global $con;
    $query = "SELECT * from $table WHERE status='0'";
    return $query_run = mysqli_query($con,$query);
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

function getAllOrders() //For admin-side to fetch orders
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='0'";   
    return $query_run= mysqli_query($con,$query);
}

//Check if tracking number is valid and corresponds with user's account
function checkTrackingNoValid($trackingNo)
{
    global $con;
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo'";
    return mysqli_query($con,$query);
}

function getOrderHistory()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status !='0'";   
    return $query_run= mysqli_query($con,$query);
}

function checkIfPLMEmail($haystack, $needles=array(), $offset=0) {
    $chr = array();
    foreach($needles as $needle) {
            $res = strpos($haystack, $needle, $offset);
            if ($res !== false) $chr[$needle] = $res;
    }
    if(empty($chr)) return false;
    return min($chr);
}

?>