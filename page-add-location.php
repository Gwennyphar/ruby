<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'locations';
   include_once 'inc/check.php'; 
   include_once 'inc/config.php'; ?>
    <!--header -->
    <?php include_once 'templates/header.php'; ?>
    <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <!-- Navbar-->
        <?php include_once 'templates/navbar.php'; ?>
        <!-- Side-Nav-->
        <?php include_once 'templates/sidebar.php'; ?>
        <div class="content-wrapper">
        <div class="row user">
          <div class="col-md-12">
            <div class="tab-content">
              <div class="card">
              <h4 class="line-head"></h4>
              <div class="row mb-20">
                <div class="col-md-1">
                  <label>Fundort</label>
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control clr" name="location" maxlength="255" placeholder="Fundort eingeben" value="">
                </div>
              </div>
              <div class="row mb-20">
                <div class="col-md-1">
                  <label>Land</label>
                </div>
                <div class="col-md-3">
                 <input type="text" class="form-control clr" name="country" maxlength="255" placeholder="Land eingeben" value="">
                </div> 
              </div>
              <div class="clearfix"></div> 
              <div class="row mb-12">
                <div class="col-md-2">
                  <button class="btn btn-success" type="button" id="btnSave" name="btnSave" value="save"><i class="fa fa-fw fa-lg fa fa-floppy-o"></i>Speichern</button>
                </div> 
                <div class="col-md-2">
                  <a href="page-locations.php">
                    <button class="btn btn-info" type="button" id="btnQuit" name="btnQuit" ><i class="fa fa-fw fa-lg fa fa-table"></i> Zur Übersicht</button>
                  </a>
                </div> 
              </div>
          </div>   
        </div>
        </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- footer-->
    <?php include_once 'templates/footer.html'; ?>
    <script type="text/javascript" src="ajax/addlocation/add_location.js"></script>
 <?php }else{
       header('Location: index.php');
    } ?>