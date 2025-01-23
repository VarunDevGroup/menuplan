
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION["loggedin"]!=true)
{
	header("Location: login.php");
	exit;
}
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '\menuplan\common\header.php'); 

?>

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
            <h1 class="m-0 text-dark">Admin Area</small></h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                Master Data Management
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <div class="container" style="text-align:center">
                        <div class="row" style="padding-bottom:20px">
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/DietIcon.jfif" style="width:100px;height:100px" />
                                <br />

                               <a href="">Diet Management</a>
                            </div>
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/food.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="foodsection.php">Food Management</a>
                            </div>
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/MasterManagement.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/MasterData.php">Master Management</a>
                            </div>
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/PAL.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="pal.php">Physical Activity Management</a>
                                    </div>
                        </div>
                        <hr />
                        <div class="row" style="padding-bottom:20px">
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/Formula.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="formula.php">Formula Configuration</a>
                            </div>
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/Report.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="">Report Master</a>
                            </div>
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/Repo.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="">Image Repository</a>
                            </div>
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/Screen.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="">Screen Master</a>
                                
                            </div>
                        </div>
                        <hr />
                        <div class="row" style="padding-bottom:20px">

                          
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/Coupon.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="coupon.php">Coupon Master</a>
                            </div>
                            <div class="col-3">
                                <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/dist/img/Plan.jfif" style="width:100px;height:100px" />
                                <br />
                                <a href="">Plan Master</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <?php include($_SERVER['DOCUMENT_ROOT'] . '\menuplan\common\footer.php'); ?>

  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '\menuplan\common\requiredscripts.php'); ?>
<!-- REQUIRED SCRIPTS -->

<script>

  $(function () {
   
  
  });
</script>

  <!-- Add Modal -->
  <div class="modal fade" id="add_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
					
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new-frm">
                            <div class="form-group">
                                <label for="language_name" class="control-label">Language Name</label>
                                <input type="text" class="form-control rounded-0" id="language_name" name="language_name" required>
                            </div>
                            <div class="form-group">
                                <label for="language_code" class="control-label">Language Code</label>
                                <input type="text" class="form-control rounded-0" id="language_code" name="language_code" required>
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
<!-- Edit Modal -->
<div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Author's Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-frm">
                            <input type="hidden" name="language_id">
                            <div class="form-group">
                                <label for="language_name" class="control-label">Language Name</label>
                                <input type="text" class="form-control rounded-0" id="language_name" name="language_name" required>
                            </div>
                            <div class="form-group">
                                <label for="language_code" class="control-label">Language Code</label>
                                <input type="text" class="form-control rounded-0" id="language_code" name="language_code" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="edit-frm">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Modal -->
    <div class="modal fade" id="delete_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="delete-frm">
                            <input type="hidden" name="language_id">
                            <p>Are you sure to delete <b><span id="name"></span></b> from the list?</p>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" form="delete-frm">Yes</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
        </div>
</body>
</html>
