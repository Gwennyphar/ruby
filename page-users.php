<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'users';
   include_once 'inc/check.php'; ?>
    <!--header -->
    <?php
    include_once 'templates/header.php';
    require_once 'inc/config.php'; ?>
    <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <!-- Navbar-->
        <?php include_once 'templates/navbar.php'; ?>
        
        <!-- Side-Nav-->
        <?php include_once 'templates/sidebar.php'; ?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <a href="page-add-user.php"><button class="btn btn-primary" type="button"><i class="fa fa-lg fa-user-plus"></i> Benutzer anlegen</button></a>
                  <table class="table table-hover table-bordered" id="table_users">
                    <thead>
                      <tr class="table-header">
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Aktiviert</th>
                        <th class="no--sorting"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(is_array($users) || is_object($users)) {
                        $i = 0;
                        foreach($users as $val) {
                          if(isset($val['id']) ) {
                            echo '<tr id="idrow'.$val['id'].'">  '
                              . '<td id="full'.$val['id'].'">'.$val["full"].'</td>'
                              . '<td>'.$val["email"].'</td>'
                              . '<td>'.$val["aktiv"].'</td>
                                <td class="no--border">
                                <span class="col-md-1"><a href="page-edit-user.php?id='.$val["id"].'"><i class="fa fa-lg fa-edit"></i></a></span>'
                              . '<span class="col-md-1"><a class="btnDel" value="'.$val['id'].'" name="btnDel'.$val['id'].'" id="btnDel'.$val['id'].'"><i class="fa fa-lg fa-trash"></i></a></span>
                                </td>
                                </tr>';
                          }                      
                        }
                      } ?>
                    </tbody>
                  </table>
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
    <?php
     include_once 'templates/footer.html';
    ?>
  <script type="text/javascript" src="ajax/deluser/del_usr.js"></script>
 <?php }else{
       header('Location: index.php');
    } ?>