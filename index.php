<?php
    include('inc/login.php'); // Include Login Script
    if ((isset($_SESSION['uid']) != '')) {
//      header('Location: dashboard.php');
  } ?>  
  <!--header -->
  <?php include_once 'templates/header.php';?>
  <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <div class="content-wrapper">
          <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="bs-component error"><?php echo $error;?></div>
      <div class="login-box">
        <form class="login-form" method="post">
          <h3 class="login-head">Willkommen</h3>
          <div class="form-group">
            <label class="control-label">Benutzername</label>
            <input class="form-control" type="text" name="uname" placeholder="Benutzername">
          </div>
          <div class="form-group">
            <label class="control-label">Passwort</label>
            <input class="form-control" type="password" name="pwd" placeholder="Passwort">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox"> 
              </div>
            </div>
          </div>
          <div class="form-group btn-container">
            <button  class="btn btn-primary btn-block" name="submit" value="login">Anmelden <i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form>
      </div>
    </section>
        </div>   
      </div>
    </div>
    <!-- footer-->
    <?php
     include_once 'templates/footer.html';
    ?>
