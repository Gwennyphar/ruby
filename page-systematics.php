<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'systematics';
   include_once 'inc/check.php'; ?>
    <!--header -->
    <?php
     include_once 'templates/header.php';
     require_once 'inc/config.php';
    ?>
    <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <!-- Navbar-->
        <?php
         include_once 'templates/navbar.php';
        ?>
        <!-- Side-Nav-->
        <?php
          include_once 'templates/sidebar.php';
        ?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <a href="page-add-systematic.php"><button class="btn btn-primary" type="button"><i class="fa fa-lg fa-pencil"></i> Tafelwerk erweitern</button></a>
                  <table class="table table-hover table-bordered" id="table_minerals">
                    <thead>
                      <tr class="table-header">
                        <th>Klasse</th>
                        <th>Abteilung</th>
                        <th class="no--sorting"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(is_array($panelwork) || is_object($panelwork)) {
                        $i = 0;
                        foreach($panelwork as $class) {
                          if(isset($class['id']) ) {
                            echo '<tr id="idrow'.$class['id'].'">
                            
                            <td id="name'.$class['id'].'">'.$class["class"].'</td>
                            <td id="formula'.$class['id'].'">'.$class["department"].'</td>
                                <td class="no--border">
                                <span class="col-md-1"><a href="page-edit-mineral.php?id='.$class["id"].'"><i class="fa fa-lg fa-edit"></i></a></span>'
                              . '<span class="col-md-1"><a class="btnDel" value="'.$class['id'].'" name="btnDel'.$class['id'].'" id="btnDel'.$class['id'].'"><i class="fa fa-lg fa-trash"></i></a></span>
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
  <script type="text/javascript" src="ajax/delmineral/del_mineral.js"></script>
 <?php }else{
       header('Location: index.php');
    } ?>