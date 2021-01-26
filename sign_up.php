
 <?php  
        include_once 'navbar.php';
 ?>
 <?php
    include_once 'database.php';
    $con = new DB_con();
    if(isset($_POST['submit']))
    {
        $msg="";
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $cpassword =test_input ($_POST['c_password']);
        $gender = test_input($_POST['gender']);
        $selectresult = $con->serach_email($email);
        if(mysqli_num_rows($selectresult)>0)
        {
             echo'email already exists';
        }
        elseif($password != $cpassword){
            echo "passwords doesn't match";
        }
        else{
            $res = $con->users_insert($name,$email,$password,$gender);
            if($res)
            {
                ?>
                <script>
                alert('Record inserted...');
                window.location='index.php'
                </script>
                <?php
        
            }
            else
            {
                ?>
                <script>
                alert('error inserting record...');
                window.location='index.php'
                </script>
                <?php
            } 
        }       
        
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
 ?>
<div class="container">
    <h3 style="text-align:center;" class="text-success">Create your account</h3>
    <form style="width:500px; margin:auto"  method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control" name="c_password" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="ohters">ohters</option>
            </select>
        </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    
    </form>
</div>

