<?php if(!isset($_SESSION)) {
    session_start(); } ?>

 <?php
    include_once 'link.php';
    include_once 'database.php';
    $con = new DB_con();
    if(isset($_POST['submit']))
    {

        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);
        $selectresult = $con->log_in_admin($username,$password);
        $result=mysqli_fetch_array($selectresult);
        if(mysqli_num_rows($selectresult)>0)
        {
            $_SESSION["admin_name"]= $result[0];
            $_SESSION["loginstatus_admin"]="true";
		    header("location:index.php");
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
 <style media="screen">
   .login_{
     padding-top: 25%;
   }
   .btn_login{
     margin-left: 35%;
     padding:10px 60px;
   }
 </style>
<div class="container">
   <div class="login_">

    <form style="width:500px; margin:auto"  method="post">
        <div class="form-group">

            <input type="text" class="form-control" name="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">

            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>
    <button type="submit" class="bbtn btn-primary btn-round btn-lg btn-block" name="submit">Submit</button>

    </form>
</div>
 </div>
