<?php

include('../config/dbcon.php');
include('myfunctions.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['checkPassword']);

    //check if email is already registered
    $check_email_query = "SELECT email FROM users WHERE email = '$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    $check_phone_query = "SELECT phone FROM users WHERE phone = '$phone' ";
    $check_phone_query_run = mysqli_query($con, $check_phone_query);

        if (mysqli_num_rows($check_email_query_run) > 0)
            {
                $_SESSION['message'] = "Email already registered!";
                header('Location: ../register.php');
            }

        else
            {
                $allowed_candidate_domain = array("plm.edu.ph","outlook.com"); 

                if (checkIfPLMEmail(strtolower($email), $allowed_candidate_domain, 1))
                {

                    if (mysqli_num_rows($check_phone_query_run) > 0)
                    {

                        $_SESSION['message'] = "Phone number already registered!";
                        header('Location: ../register.php');

                    }
                    else
                    {
                        if($password == $cpassword)
                        {
                            $uppercase = preg_match('@[A-Z]@', $password);
                            $lowercase = preg_match('@[a-z]@', $password);
                            $number = preg_match('@[0-9]@', $password);
                            $specialChars = preg_match('@[^\w]@', $password);
        
                            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
                            {
                                $_SESSION['message'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
                                header('Location: ../register.php');
                            }
        
                            else
                            {
        
                                $insert_query = "INSERT INTO users(name,email,phone,password) VALUES ('$name','$email','$phone','$password')";
                                $insert_query_run = mysqli_query($con,$insert_query);
        
                                if ($insert_query_run)
                                    {
                                        $_SESSION['message'] = "Account registered successfully!";
                                        header('Location: ../login.php');
                                    }
        
                                else
                                    {
                                        $_SESSION['message'] = "Something went wrong.";
                                        header('Location: ../register.php');
                                    }
                            }
                        }
                        else 
                        {
                            $_SESSION['message'] = "Passwords do not match!";
                            header('Location: ../register.php');
                        }
                    }
                } 

                else 
                {
                    $_SESSION['message'] = "Use your PLM email address to continue registration!";
                    header('Location: ../register.php');
                }

                
                   
            }   
}

else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run) or die( mysqli_error($con));
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as= $userdata['role_as'];


        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail,
        ];  
        
        $_SESSION['role_as'] = $role_as;
        if ($role_as == 1)
        {
            redirect("../admin/approved-orders.php", "Welcome, admin!");
        }

        else {   
            redirect("../index.php", "Logged in successfully!");
        }

    }
    else
    {
        redirect("../login.php", "Invalid credentials!");
    }
}

?>