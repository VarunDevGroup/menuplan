<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION["loggedin"] != true) {
  header("Location: login.php");
  exit;
}
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '\menuplan\common\header.php'); ?>

<body class="hold-transition layout-top-nav layout-footer-fixed">
  <div class="wrapper">

<!--NAVIGATION-->
<?php include($_SERVER['DOCUMENT_ROOT'] . '\menuplan\common\topnavigation.php'); ?>
<!--NAVIGATION-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Admin Backend</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                <li class="breadcrumb-item active">Coupon Master</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">

            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">

                <div class="row mb-2">
                    <div class="col-sm-9">
                      <h3 class="card-title">Coupon Management</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-1 text-right">
                    <button type="button" class="btn btn-block bg-gradient-primary btn-sm"
                    data-toggle="modal" data-target="#add_modal">Add New</button>

                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-primary btn-sm" href="admin.php">
                        <i class="fas fa-long-arrow-alt-left">
                        </i>
                        Back To Master
                      </a>
                    </div>
                  </div><!-- /.row -->




                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12" id="msg">
                      
                    </div>
                  </div>
                 

                  <table id="tblData" class="table table-bordered table-hover ">
                  <thead class="bg-info">
                      <tr>
                     
                        <th>Coupon Code</th>
                        <th>Valid Till</th>
                        <th>Coupon Amount</th>
                        <th>Coupon Used</th>
                       
                        <th></th>
                      </tr>
                    </thead>

                   
                  </table>
                </div>
                <!-- /.card-body -->
              </div>


              <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->


      <!-- Main Footer -->
      <?php include($_SERVER['DOCUMENT_ROOT'] . '\menuplan\common\footer.php'); ?>

<!-- Main Footer -->


    
<!-- REQUIRED SCRIPTS -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '\menuplan\common\requiredscripts.php'); ?>
<!-- REQUIRED SCRIPTS -->
<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/appjs/coupon.js"></script>

    <script>
      $(function() {


      });
    </script>

    <!-- Add Modal -->
    <div class="modal fade" id="add_modal" data-bs-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Generate Coupon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form action="" id="new-frm">
              <input type="hidden" name="actiontype" Value="InsertData">
                <div class="form-group">
                  <label for="couponDiscount" class="control-label">Select Discount %</label>
                  <select id="couponDiscount" name="couponDiscount" >
   
                      <option value=".25"> 25% off </option>
                      <option value=".50"> 50% off</option>
                      <option value=".75"> 75% off</option>
                      <option value="1"> 100% off</option>
                    </select>
                 </div>
               
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" form="new-frm">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

   
  

</body>

</html>