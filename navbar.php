<?php if(!isset($_SESSION)) {
    session_start(); }
    include_once 'link.php';

    include('config/dbconn.php');
    $query = "SELECT cat_id,cat_name FROM category";
    $result = mysqli_query($dbconn,$query);
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="common/style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
    <title>?Hard-O-R</title>
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="font-family: 'Montserrat', sans-serif;">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a href="index.php"><img class="logo" src="image/image.jpg" alt="Logo"></a>
        </li>
        <a class="navbar-brand" href="index.php">Hard-O-R</a>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>


          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Electronic Prducts
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                while($res = mysqli_fetch_array($result)) {
                    $cat_id=$res['cat_id'];
                    $cat_name=$res['cat_name']

                 ?>
                 <a class="dropdown-item" href="products.php?cat_name=<?php echo $cat_name; ?>"><?php echo $cat_name; ?></a>
              <?php } ?>
              </div>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="user_cart.php">Shopping Cart</a>
          </li>
        </ul>
        <?php
            if($_SESSION["loginstatus"]=="true"){
              include_once 'common/nav_username.php';
              }
              else{

              include_once 'common/nav_.php';
            }


        ?>

    </nav>


</body>
</html>
