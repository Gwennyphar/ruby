<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'users';
   include_once 'inc/check.php'; ?>
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
          <div class="col-md-3">
            <div class="card p-0">
              <ul class="nav nav-tabs nav-stacked user-tabs">
                <li class="active"><a href="#user-profile" data-toggle="tab">Profil</a></li>
                <li><a href="#user-settings" data-toggle="tab">Profil bearbeiten</a></li>
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
                        <h5 class="pull-right" id="full"><?php echo ($fullname); ?></h5>
                      </div>
                    </div>
                    <div class="post-content">
                      <p id="user"><b>Benutzername:</b> <?php echo $login_user; ?></p>
                      <p id="pw"><b>Kennwort:</b> <?php echo $pwtxt; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="user-settings">
                <div class="card user-settings">
                  <h4 class="line-head">Profil</h4>
                  <div class="row mb-20">
                    <div class="col-md-1">
                      <label>Benutzername</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="username" maxlength="45" placeholder="Benutzername eingeben" value="<?php echo $fullname; ?>">
                    </div> 
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-1">
                      <label>Aktuelles Passwort</label>
                    </div>
                    <div class="col-md-3">
                     <input type="password" class="form-control clr" name="curnt_pwd" maxlength="64" placeholder="Aktuelles Passwort" value="">
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-1">
                      <label>Neues Passwort</label>
                    </div>
                    <div class="col-md-3">
                     <input type="password" class="form-control clr" id="new_pwd" name="new_pwd" maxlength="64" placeholder="Neues Passwort" value="">
                    </div>
                    <div class="col-md-1 mb-20">
                      <button class="btn btn-default" type="button" id="btnRandom" name="btnRandom" value="random"><i class="fa fa-fw fa-lg fa fa-key"></i></button>
                    </div>
                      <span id="show_pwd"></span>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-1">
                      <label>Passwort wiederholen</label>
                    </div>
                    <div class="col-md-3">
                     <input type="password" class="form-control clr" name="repeat_pwd" maxlength="64" placeholder="Passwort wiederholen" value="">
                    </div>
                  </div>
                  <div class="row mb-6">
                    <div class="col-md-3">
                      <button class="btn btn-success" type="button" id="updProfile" name="btnUpd" value="update"><i class="fa fa-fw fa-lg fa fa-floppy-o"></i>Änderung speichern</button> 
                    </div>
                    <div class="col-md-3">
                      <a href="dashboard.php">
                        <button class="btn btn-warning" type="button" id="btnQuit" name="btnQuit" ><i class="fa fa-fw fa-lg fa fa-times-circle"></i>Abbrechen</button>
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
    </div>
    </div>
    <!-- footer-->
    <?php include_once 'templates/footer.html'; ?>
    <script type="text/javascript" src="ajax/password/create_pwd.js"></script>
    <script type="text/javascript" src="ajax/updprofile/upd_profile.js"></script>
    
 <?php }else{
       header('Location: index.php');
    } ?>