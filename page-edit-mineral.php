<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'minerals';
   include_once 'inc/check.php'; ?>
    <!--header -->
    <?php include_once 'templates/header.php';
    include_once 'inc/profil_mineral.php'; ?>
    <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <!-- Navbar-->
        <?php include_once 'templates/navbar.php'; ?>
        <!-- Side-Nav-->
        <?php include_once 'templates/sidebar.php'; ?>
        <div class="content-wrapper">
          <div class="row user">
            <div class="col-md-3">
              <div class="card p-0">
                <ul class="nav nav-tabs nav-stacked user-tabs">
                  <li class="active"><a href="#user-profile" data-toggle="tab">Übersicht</a></li>
                  <li><a href="#user-settings" data-toggle="tab">Stammdaten bearbeiten</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-9">
              <div class="tab-content">
                <div class="tab-pane active" id="user-profile">
                  <div class="timeline">
                    <div class="post">
                      <div class="post-media">
                        <div class="content">
                          <h5 class="pull-right" id="full"><?php // echo ($mineral_d['full']); ?></h5>
                        </div>
                      </div>
                      <div class="post-content">
                        <p id="mineral"><b>Mineralienname:</b> <?php echo $mineral_d['name']; ?></p>
                        <p id="formula"><b>Chemische Formel: </b><?php echo $mineral_d['formula']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card user-settings fade" id="user-settings">
                <h4 class="line-head"></h4>
                <div class="row mb-20">
                  <div class="col-md-2">
                    <label>Mineraliename</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" name="mineral" maxlength="255" placeholder="Mineralienname eingeben" value="<?php echo $mineral_d['name']; ?>">
                  </div>
                </div>
                <div class="clearfix"></div> 
                <div class="row mb-20">
                  <div class="col-md-2">
                    <label>Chemische Formel</label>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" name="formula" maxlength="255" placeholder="Chemische Formel eingeben" value="<?php echo $mineral_d['formula']; ?>">
                  </div>
                </div> 
                <div class="clearfix"></div> 
                <div class="row mb-20">
                  <div class="col-md-3">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button class="btn btn-success" type="button" id="btnUpd" name="btnUpd" value="update"><i class="fa fa-fw fa-lg fa fa-floppy-o"></i>Änderung speichern</button>
                  </div> 
                  <div class="col-md-3">
                    <button class="btn btn-danger btnDel" type="button" id="btnDel" name="btnDel" value="delete"><i class="fa fa-fw fa-lg fa fa-trash-o"></i>Mineral löschen</button>
                  </div> 
                  <div class="col-md-3">
                    <a href="page-minerals.php">
                      <button class="btn btn-info" type="button" id="btnQuit" name="btnQuit" ><i class="fa fa-fw fa-lg fa fa-table"></i>Zur Übersicht</button>
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
    <!-- footer-->
    <?php include_once 'templates/footer.html'; ?>
    <script type="text/javascript" src="ajax/updmineral/upd_mineral.js"></script>
    <script type="text/javascript" src="ajax/delmineral/del_profile_mineral.js"></script>
 <?php }else{
       header('Location: index.php');
    } ?>