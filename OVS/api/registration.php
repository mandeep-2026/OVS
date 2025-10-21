<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("connect.php");

$email     = $_POST['email'];
$voterid   = $_POST['voterid'];
$mobile    = $_POST['mobile'];
$password  = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address   = $_POST['address'];
$image     = $_FILES['photo']['name'];
$tmp_name  = $_FILES['photo']['tmp_name'];
$role      = $_POST['role'];

if ($password === $cpassword) {

    // ✅ Check if voterid already exists
    $check = mysqli_query($connect, "SELECT * FROM user WHERE voterid='$voterid'");
    if (mysqli_num_rows($check) > 0) {
        echo '<script>alert("Voter ID already exists! Please use a different Voter ID."); window.location="../routes/registration.html";</script>';
        exit();
    }

    // ✅ Safe file name
    $image = time() . '_' . basename($image);

    // ✅ Move uploaded file
    if (move_uploaded_file($tmp_name, "../uploads/" . $image)) {

        // ✅ Insert query
        $insert = mysqli_query($connect, "INSERT INTO `user` (email, voterid, mobile, password, address, photo, role, status, votes) 
        VALUES ('$email', '$voterid', '$mobile', '$password', '$address', '$image', '$role', 0, 0)");

        if ($insert) {
            echo '<script>alert("Registration Successful!"); window.location="../index.html";</script>';
        } else {
            echo '<script>alert("Database Error: ' . mysqli_error($connect) . '"); window.location="../routes/registration.html";</script>';
        }
    } else {
        echo '<script>alert("File upload failed! Please try again."); window.location="../routes/registration.html";</script>';
    }
} else {
    echo '<script>alert("Password and Confirm Password do not match!"); window.location="../routes/registration.html";</script>';
}
?>
