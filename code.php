<?php
session_start();
include './includes/dbconfig.php';

if(isset($_POST['save_data']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $data = [
        'username' => $username,
        'email' => $email,
        'phone' => $phone
    ];

    $ref =  "contact/";
    $post_data = $database->getReference($ref)->push($data);

    if($post_data)
    {
        $_SESSION['status'] = "Data Inserted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Failed to Insert Data";
        header("Location: index.php");
    }
}

if(isset($_POST['update_data']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $token = $_POST['token'];

    $data = [
        'username' => $username,
        'email' => $email,
        'phone' => $phone
    ];

    $ref =  "contact/".$token;
    $post_data = $database->getReference($ref)->update($data);

    if($post_data)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Failed to Update Data";
        header("Location: index.php");
    }
}

if(isset($_POST['delete_data']))
{
    $token = $_POST['ref_token'];
    $ref = "contact/".$token;
    $deletedata = $database->getReference($ref)->remove();
    if($deletedata)
    {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete Data";
        header("Location: index.php");
    }
}

?>