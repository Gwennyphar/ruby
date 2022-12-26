<?php 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'collection';
   include_once 'inc/check.php'; ?>
    <!--header -->
    <?php
     include_once 'templates/header.php';
     require_once 'inc/config.php'; 
     ?>
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
                  <table class="table table-hover table-bordered" id="table_collection">
                    <a href="page-add-specimen.php"><button class="btn btn-primary" type="button"><i class="fa fa-lg fa-diamond"></i> Neues Exemplar anlegen</button></a>
                    <h4><label></label></h4>
                    <thead>
                      <tr class="table-header">
                        <th>Titel</th>
                        <th>Mineral</th>
                        <th>Formel</th>
                        <th>Fundort</th>
                        <th>Foto</th>
                        <th class="no--sorting sorting">Aktion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(is_array($collection) || is_object($collection)) {
                        $i = 0;
                        foreach($collection as $val) {
                          if(isset($val['id']) ) {
                            echo '<tr id="idrow'.$val['id'].'">'
                              . '<td id="title'.$val['id'].'">'.$val["title"].'</td>'
                              . '<td>'.$val["mineral"].'</td>'
                              . '<td>'.$val["formula"].'</td>'
                              . '<td>'.$val["location"].'</td>'
                              . '<td>'; 
                            if( isset($val["link"]) ) { 
                              echo'<a href="/ruby/docs/'.$val["link"].'"><img src="/ruby/docs/'.$val["link"].'" class="preview_image" width="80" height="60"></a>';
                            }
                            echo '</td>
                              <td class="no--border">
                              <span class="col-md-1"><a href="page-edit-collection.php?id='.$val["id"].'"><i class="fa fa-lg fa-edit"></i></a></span>'
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
    <?php include_once 'templates/footer.html';?>
  <script type="text/javascript" src="ajax/delcollection/del_specimen.js"></script>
 <?php }else{
   header('Location: index.php');
 } ?>