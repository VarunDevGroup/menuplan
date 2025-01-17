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
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>MenuPlan</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/css/adminlte.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="./assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition layout-top-nav layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="./home.php" class="navbar-brand">
        <img src="./assets/images/Menuplan.jpg" alt="MenuPlan" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">MenuPlan</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
       <li class="nav-item">
		<?php echo 'Welcome ' . $_SESSION["userName"] ; ?>         
        </li>
        <li class="nav-item">&nbsp;<a  href="logout.php" >Sign out</i></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Master Data</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
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
					  <div class="col-sm-11">
					 <h3 class="card-title">PAL Master</h3>
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
                  <th >PAL Id</th>
                    <th >PAL Name</th>
                    <th >PAL Value</th>
                    <th ></th> <th ></th>
                  </tr>
                  </thead>
                 
                  <tfoot>
                  <tr>
                  <th >PAL Id</th>
                    <th >PAL Name</th>
                    <th >PAL Value</th>
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


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<script src="./assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./appjs/palscript.js"></script>
<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/js/adminlte.min.js"></script>
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
