<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'systematics';
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
                  <label>Klasse</label>
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control clr" name="class" maxlength="255" placeholder="Mineralienklasse eingeben" value="">
                </div>
              </div>
              <div class="row mb-20">
                <div class="col-md-1">
                  <label>Abteilung</label>
                </div>
                <div class="col-md-3">
                 <input type="text" class="form-control clr" name="department" maxlength="255" placeholder="Mineralogische Abteilung eingeben" value="">
                </div> 
              </div>
              <div class="clearfix"></div> 
              <div class="row mb-20">
                <div class="col-md-3">
                  <button class="btn btn-success" type="button" id="btnSave" name="btnSave" value="save"><i class="fa fa-fw fa-lg fa fa-floppy-o"></i>Klasse speichern</button>
                </div> 
                <div class="col-md-3">
                  <a href="page-systematics.php">
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
    <script type="text/javascript" src="ajax/addsystematic/add_systematic.js"></script>
 <?php }else{
       header('Location: index.php');
    } ?>