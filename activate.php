<?php 
session_start();
include_once('db.php');

        if(isset($_GET['token'])){
                $token=$_GET['token'];
                $updatequery="update users set status='active' where token='$token'";
                
                $query=mysqli_query($conn, $updatequery);

                if($query){
                    $_SESSION['msg']="your account updated successfully";
                    header("Location: login.php");
                }else{
                    $_SESSION['msg']="your are logged out";
                    header("Location: login.php");
                }
        }

?>