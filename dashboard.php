<?php 
  include('inc/login.php');
  if( (isset($_SESSION['uid']) != '') ){
    $page = 'home';
    include_once 'inc/check.php'; 
    // header -->
    include_once 'templates/header.php';
    require_once 'inc/config_news.php'; ?>
    <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <!-- Navbar-->
        <?php include_once 'templates/navbar.php'; ?>
        <!-- Side-Nav-->
        <?php include_once 'templates/sidebar.php'; ?>
        <div class="content-wrapper">
          <?php
          if(is_array($news) || is_object($news)) {
            foreach($news as $val) {
              if(isset($val['id']) ) { ?>
              <div class="row user" id="row<?php echo $val['id']; ?>">
                <div class="col-md-7"></div>
                <div class="col-md-4">
                  <div class="tab-content">
                    <div class="tab-pane active" id="news-timeline<?php echo $val['id']; ?>">
                      <div class="timeline">
                        <div class="post">
                          <div class="post-media">
                            <div class="content">
                              <h5><strong><?php echo $val['title']; ?></strong></h5>
                              <p class="text-muted"><small><?php echo $val['start_date']; ?></small></p>
                            </div>
                          </div>
                          <div class="post-content">
                            <p><?php echo $val['shorttext']; ?></p>
                          </div>
                          <ul class="post-utility">
                            <li class="shares"><a href="#news-details<?php echo $val['id']; ?>" data-toggle="tab"><i class="fa fa-fw fa-lg fa-arrow-circle-right"></i>Mehr Lesen</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!--setting-->
                    <div class="tab-pane fade" id="news-details<?php echo $val['id']; ?>">
                      <div class="card user-settings">
                        <h4 class="line-head"><strong><?php echo $val['title']; ?></strong></h4>
                        <div class="row mb-20">
                          <div class="col-md-12">
                            <label><?php echo $val['description']; ?></label>
                          </div>
                        </div>
                        <div class="row mb-20">
                          <div class="col-md-10">
                            <div class="table-responsive mailbox-messages">
                              <table class="table table-hover attachment">
                                <tbody>
                                  <?php
//                                  if( isset($val["link"]) ) { 
                                    echo '
                                      <tr id="idrow'.$val['id_file'].'">
                                        <td><a href="/ruby/docs/'.$val["file_link"].'"><img src="/ruby/docs/'.$val["file_link"].'" class="preview_image" width="200" height="180"></a></td>
                                      </tr>';
//                                  }?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="shares col-md-5">
                            <a href="dashboard.php"><i class="fa fa-fw fa-lg fa fa-arrow-circle-up"></i>Weniger Lesen</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php    
              }
            }  
          } ?>
          </div>
        </div>
      <!--</div>-->
    </div>
  <!-- footer-->
 <?php
  include_once 'templates/footer.html';
    }else{
       header('Location: index.php');
    }
  ?>
