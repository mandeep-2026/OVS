<?php
$connect = mysqli_connect("sql100.infinityfree.com","if0_39898261","6A7ploOqMOVSt0","if0_39898261_voting") or die("connection failed");
if($connect)
{
    echo "connected";

}
else
{
    echo "not connected";
}
?>