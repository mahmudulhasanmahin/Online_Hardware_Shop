<?php if(!isset($_SESSION)) {
    session_start(); } ?>
 <?php
     include_once 'navbar.php';
       include_once 'link.php';
 ?>
 <?php

    include_once 'database.php';
    $con = new DB_con();
    if(isset($_POST['submit']))
    {

        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $selectresult = $con->log_in($email,$password);
        $result=mysqli_fetch_array($selectresult);
        if(mysqli_num_rows($selectresult)>0)
        {
            $_SESSION["username"]= $result[0];
            $_SESSION["email"]=$result[1];
            $_SESSION["user_id"]=$result[2];
            $_SESSION["loginstatus"]="true";
		    //header("location:index.php");
          ?>
            <script>
              window.location.href = "index.php";
            </script>
            <?php
        }else{?>
            <script>
            alert("user not found");
            </script>
            <?php
        }

    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
<head>
  <style media="screen">
    .login_{
      padding-top: 25%;
    }
    .btn_login{
      margin-left: 35%;
      padding:10px 60px;
    }
  </style>
</head>
   <body>
     <div class="container">
         <div class="login_">
           <form style="width:500px; margin:auto"  method="post">
             <div class="input-group form-group-no-border input-lg">
                               <span class="input-group-addon">
                                   <i class="now-ui-icons users_circle-08"></i>
                               </span>
                              <input type="email" class="form-control" name="email" placeholder="Enter email" required>
              </div>
              <br>
              <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>
                <div class="footer text-center">

                                  <button type="submit" class="bbtn btn-primary btn-round btn-lg btn-block" name="submit">Login</button>
                </div>


           </form>
         </div>

     </div>
   </body>
 </html>
