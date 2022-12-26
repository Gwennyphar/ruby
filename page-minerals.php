<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'minerals';
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
                  <a href="page-add-mineral.php"><button class="btn btn-primary" type="button"><i class="fa fa-lg fa-pencil"></i> Mineral anlegen</button></a>
                  <table class="table table-hover table-bordered" id="table_minerals">
                    <thead>
                      <tr class="table-header">
                        <th>Mineralienname</th>
                        <th>Chemische Zusammensetzung</th>
                        <th class="no--sorting"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(is_array($minerals) || is_object($minerals)) {
                        $i = 0;
                        foreach($minerals as $val) {
                          if(isset($val['id']) ) {
                            echo '<tr id="idrow'.$val['id'].'">
                            
                            <td id="name'.$val['id'].'">'.$val["name"].'</td>
                            <td id="formula'.$val['id'].'">'.$val["formula"].'</td>
                                <td class="no--border">
                                <span class="col-md-1"><a href="page-edit-mineral.php?id='.$val["id"].'"><i class="fa fa-lg fa-edit"></i></a></span>'
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
  <script type="text/javascript" src="ajax/delmineral/del_mineral.js"></script>
 <?php }else{
       header('Location: index.php');
    } ?>