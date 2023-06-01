<?php
//SESSION START HERE
session_start();
include('config/dbcon.php');

//For user side access to data in same folder. Check include directory
function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status= '0'"; //Fix to 0
    return $query_run = mysqli_query($con,$query);
}

//For trending display on landing page
function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending= '1'"; //If a product is "1" on trending
    return $query_run = mysqli_query($con,$query);
}

//To get which produts are active (0)
function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug = '$slug' AND status = '0' LIMIT 1";
    return $query_run = mysqli_query($con,$query);
}

//Self-explanatory
function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id = '$category_id' AND status = '0'";
    return $query_run = mysqli_query($con,$query);
}

//Self-explanatory
function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug = '$slug' AND status = '0' ";
    return $query_run = mysqli_query($con,$query);
}

function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price  
                FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con,$query);
}

function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id ='$userId' ORDER BY id DESC";
    return $query_run = mysqli_query($con,$query);
}

//Check if tracking number is valid and corresponds with user's account
function checkTrackingNoValid($trackingNo)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id']; //tracking no should also belong to the specific user
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId'";
    return mysqli_query($con,$query);
}

function getOrderHistory()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE status= '2' OR '3' AND user_id='$userId'";   
    return $query_run= mysqli_query($con,$query);
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}
?>