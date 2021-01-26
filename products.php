<?php
    session_start();
    include('config/dbconn.php');
    if( $_SESSION['loginstatus']=="false"){
        header('location:log_in.php'); }
        include_once 'navbar.php';
        include_once 'link.php';
?>

<?php


if(isset($_POST['mybutton'])) {
  $prod_id=$_POST['mybutton'];
    echo '
    <!-- Modal Core -->

    <div class="modal-dialog">
    <div class="modal-content">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form group">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Enter Quantity:</h4>
    </div>
    <div class="modal-body">

    <div class="input-append">';

      echo "<select class='btn btn-warning btn-round dropdown-toggle' size='1' name='prod_qty' id='prod_qty'>";
      $i=1; $prod_qty=20;
      while ($i <= $prod_qty ){
          echo "<option value=".$prod_id.'|'.$i.">".$i."</option>";
          $i++;
      }
      echo "</select>";
    echo'
    </div>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Close</button>
    <a><button type="submit" name="submit" class="btn btn-success btn-round">Order</button></a>
    </div>
    </div>
    </form>
</div>
    </div>
    ';
}
if (isset($_POST['submit'])){
  //$prod_id=$_POST['mybutton'];
  $result=$_POST['prod_qty'];
  $result_explode = explode('|', $result);
  include('config/dbconn.php');
  $prod_id=$result_explode[0];
  $query = "SELECT * FROM products WHERE prod_id=$prod_id";
  $result = mysqli_query($dbconn,$query);
  while($res = mysqli_fetch_array($result)){
            $prod_id=$res['prod_id'];
            $prod_price=$res['prod_price'];
            $user_id = $_SESSION['user_id'];


                $prod_id=$prod_id;
                $prod_price=$prod_price;



                $prod_qty = $result_explode[1];
                $total = $prod_price * $prod_qty ;
                $user_id = $user_id;

                $date=date("Y-m-d");
                if(empty($prod_qty)){

                    if(empty($prod_qty)) {
                    echo "<br><center><h4><font color='red'><b>Error!</b> Enter Product Quantity.</font></h4></center>";
                }

                } else {

                mysqli_query($dbconn,"INSERT INTO order_details (prod_id,prod_qty,total,user_id)
                        VALUES ('$prod_id','$prod_qty','$total','$user_id')") or die(mysql_error());
                    ?>

                    <script type="text/javascript">
                        alert("Product Added To Cart!");
                        window.location = "user_cart.php";
                    </script>

                    <?php
                }
                }




              }

   ?>

<body class="index-page sidebar-collapse">


  <div class="wrapper">
      <div class="main">
          <div class="section section-basic">
              <div class="container">
                  <br>

                  <br><hr color="orange">

                    <div class="tab-pane  active" id="">
                      <ul class="thumbnails">
                      <?php
                      $cat_name=$_GET['cat_name'];
                      $query = "SELECT * FROM products WHERE category='$cat_name' ORDER BY prod_name ASC";
                      $result = mysqli_query($dbconn,$query);

                                              $numOfCols = 2;
                                              $rowCount = 0;
                                              $bootstrapColWidth = 12 / $numOfCols-1;
                                              ?>
                                              <div class="row">
                                              <?php
                                              while($res = mysqli_fetch_array($result)) {
                                                  $prod_id=$res['prod_id'];

                                          ?>

                                            <div class="col-md-<?php echo $bootstrapColWidth; ?>">
                                                  <div class="thumbnail">
                                                      <?php if($res['prod_pic1'] != ""): ?>
                                                      <img src="uploads/<?php echo $res['prod_pic1']; ?>" width="300px" height="200px">
                                                      <?php else: ?>
                                                      <img src="uploads/default.png" width="300px" height="200px">
                                                      <?php endif; ?>
                                                  <div class="caption">
                                                    <h5><b><?php echo $res['prod_name'];?></b></h5>
                                                    <form class="" action="" method="post">
                                                      <button class="btn btn-success btn-round pull-right" name="mybutton" value="<?php echo $res['prod_id'];?>">
                                                      <i class="now-ui-icons shopping_cart-simple"></i>Add To Cart</button>
                                                    </form>
                                                    <h6><a class="btn btn-success btn-round" title="Click for more details!" href="product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">Tk<?php echo $res['prod_price']; ?></medium></h6>
                                                  </div>

                                                  </div>
                                              </div>
                                              <div class="col-md-2">

                                              </div>
                                                <hr color="orange">

                                                <?php
                                          $rowCount++;

                                          if($rowCount % $numOfCols == 0) {
                                            echo '  <div class="row">

                                              </div>';
                                            echo '</div><hr color="orange"><div class="row">';}
                                      }
                                      ?>
                                      </div>

                        </ul>
                    </div>


      </div>
  </div>


</div>
<footer class="footer" data-background-color="black">
            <div class="container">
                <nav>

                </nav>

            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>


   <!---  inserted  -->
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="plugins/demo.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
     <!--  inserted  -->

</html>
