<?php
        include('db.php');
       
      if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $token = bin2hex(random_bytes(15));

        $check_email = mysqli_query($conn, "SELECT email FROM users where email = '$email' ");
        if(mysqli_num_rows($check_email) > 0){
          echo '<script>alert("unable to register the email is already exist")</script>';
        }
        else{
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = mysqli_query($conn, "INSERT INTO users (name, email, Password , token , status) VALUES ('$name',  '$email', '$password', '$token', 'inactive')");
              if($result){
                
                $subject = "EMAIL ACTIVATION";
                $txt = "HI $name.  PLEASE CLICK HERE TO ACTIVATE YOUR  http://localhost/Full%20Login%20and%20Register%20app/activate.php?token=$token";
                $sender = "From: abubakarwaheed0347@gmail.com";
                
                if(mail($email,$subject,$txt,$sender)){
                  $_SESSION['msg']="check your mail to activate account $email.";
                  header("Location:login.php");
                }else{
                  echo "mail not send successfully";

                }
                
              }
              else{
                ?>
                <script>alert("not regiter");</script>
                <?php
              }
          }
            echo('Record Entered Successfully');
            // header("Location:login.php");
        }

       
      }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>sign up!</title>

   
     <style>
        body{
            background-color: #17A2B8;
        }
        
     </style>
  </head>
  <body >
  <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form  action="" method="POST" enctype="multipart/form-data">

                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <!-- <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg confirm_password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg ">Repeat your password</label>
                </div> -->

              

                <input class="btn btn-primary" type="submit" value="Submit"  name="submit">

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>