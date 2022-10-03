<?php

        session_start();
        include('db.php');

            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $password=$_POST['password'];

                $sql="select*from users where name='$name' AND password='$password'";
                $res=mysqli_query($conn, $sql);

                $found_accounts =mysqli_num_rows($res);
                if($found_accounts>0){
                    $_SESSION['is_user_logged_in'] =1;
                   

                    if(isset($_POST['rememberme'])){
                        setcookie('namecookie', $name , time()+86400);
                        setcookie('passwordcookie', $password , time()+86400);
                        
                        header("Location:index.php");
                    }else{
                        header("Location:index.php");

                    }
                    header("Location:index.php");
                }
                else{
                    echo "email or password not match"; 
                }
              
            }

?>

<html>
<head>
<title>login</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style>
 body {
    background: #222D32;
    font-family: 'Roboto', sans-serif;
}

.login-box {
    margin-top: 75px;
    height: auto;
    background: #1A2226;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: #ECF0F5;
}

.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type=password] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}

.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: #1A2226;
    color: #ECF0F5;
}

input:focus {
    outline: none;
    box-shadow: 0 0 0;
}

label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-outline-primary {
    border-color: #0DB8DE;
    color: #0DB8DE;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.btn-outline-primary:hover {
    background-color: #0DB8DE;
    right: 0px;
}

.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}
.login-title{
    animation: blinker 1s linear infinite;
}
</style>

</head>
<body>
    
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    LOGIN HERE
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="" method="POST"> 
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" class="form-control" name="name"
                                <?php
                                if(isset($_COOKIE['namecookie'])){
                                    echo $_COOKIE['namecookie'];
                                }
                                ?> 
                                >
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control"  name="password"
                                <?php
                                if(isset($_COOKIE['passwordcookie'])){
                                    echo $_COOKIE['passwordcookie'];
                                }
                                ?> 
                                >
                            </div>
                            <div class="form-group">
                            <input type="checkbox" name="rememberme" id="" >
                             <label for="rememberme" style="color: white;">RememberMe</label>
                            
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-4 login-btm login-text">
                                <a href="signup.php" class="btn btn-outline-primary" >REGISTER</a>
                                </div>
                                <div class="col-lg-4 login-btm login-text">
                                <a href="forgot.php" class="btn " style="color: #0DB8DE;" >FORGOT PASSWORD</a>
                                </div>
                                <div class="col-lg-4 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary" name="submit">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>

   
</body>

