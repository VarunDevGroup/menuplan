
  <?php 
  //if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
    // last request was more than 30 minutes ago
  //  session_unset();     // unset $_SESSION variable for the run-time 
    //session_destroy();   // destroy session data in storage
    //header("Location: " .  $_SERVER['DOCUMENT_ROOT'] . "/menuplan/login.php");
	  //exit;
//}
 // $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/home.php" class="navbar-brand">
        <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/assets/images/Menuplan.jpg" alt="MenuPlan" class="brand-image img-circle elevation-3"
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
            <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/home.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown dropdown-hover">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Admin</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/admin.php" class="dropdown-item">Admin Dashboard</a></li>
              <li class="dropdown-divider"></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/admin.php" class="dropdown-item">Coupon Master
              </a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/admin.php" class="dropdown-item">Diet Management</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/fooditems.php" class="dropdown-item">Food Management</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/formula.php" class="dropdown-item">Formula Configuration</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/admin.php" class="dropdown-item">Image Repository</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/MasterData.php" class="dropdown-item">Master Management</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/pal.php" class="dropdown-item">PAL</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/admin.php" class="dropdown-item">Plan Master</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/admin.php" class="dropdown-item">Report Master</a></li>
              <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/menuplan/admin/admin.php" class="dropdown-item">Screen Master</a></li>

              
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