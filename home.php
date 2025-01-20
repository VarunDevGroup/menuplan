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

<?php include(__DIR__ . '\common\header.php'); ?>

<body class="hold-transition layout-top-nav layout-footer-fixed">
<div class="wrapper">

<!--NAVIGATION-->
<?php include(__DIR__ . '\common\topnavigation.php'); ?>
<!--NAVIGATION-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Master Data</small></h1>
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
					  <div class="col-sm-11">
					 <h3 class="card-title"><b>Language Master</b></h3>
					  </div><!-- /.col -->
				 
				</div><!-- /.row -->
		
		
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
            <div class="col-md-12" id="msg"></div>
              </div>
              <div class="col-sm-1">
				
				
      
              <button type="button" class="btn btn-block bg-gradient-primary btn-sm"
              data-toggle="modal" data-target="#add_modal">Add New</button>
              </div><!-- /.col -->
              
            
              <table id="tblData" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th >Language Id</th>
                    <th >Language Name</th>
                    <th >Language code</th>
                    <th ></th> <th ></th>
                  </tr>
                  </thead>
                 
                  <tfoot>
                  <tr>
                  <th >Language Id</th>
                    <th >Language Name</th>
                    <th >Language code</th>
                    <th ></th> <th ></th>
                  </tr>
                  </tfoot>
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

  <?php include(__DIR__ . '\common\footer.php'); ?>

  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include(__DIR__ . '\common\requiredscripts.php'); ?>
<!-- REQUIRED SCRIPTS -->
<script src="./appjs/script.js"></script>

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
