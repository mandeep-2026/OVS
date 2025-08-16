<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connect.php");

$email    = $_POST['email'];
$mobile   = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address  = $_POST['address'];
$image    = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role     = $_POST['role'];

if($password === $cpassword) {
    // Safe file name
    $image = time() . '_' . basename($image);
    
    // Move file
    if(move_uploaded_file($tmp_name, "../uploads/" . $image)) {
        $insert = mysqli_query($connect, "INSERT INTO `user` (email,mobile,password,address,photo,role,status,votes) 
        VALUES('$email','$mobile','$password','$address','$image','$role',0,0)");
        
        if($insert){
            echo '<script>alert("Registration Successful"); window.location="../";</script>';
        } else {
            echo '<script>alert("Database error: '.mysqli_error($connect).'"); window.location="../routes/registration.html";</script>';
        }
    } else {
        echo '<script>alert("File upload failed!"); window.location="../routes/registration.html";</script>';
    }
} else {
    echo '<script>alert("Password and Confirm password does not match!"); window.location="../routes/registraion.html";</script>';
}
?>
