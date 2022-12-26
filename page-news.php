<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'news';
   include_once 'inc/check.php'; ?>
    <!--header -->
    <?php include_once 'templates/header.php';
    include_once 'inc/config_news.php'; ?>
    <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <!-- Navbar-->
        <?php include_once 'templates/navbar.php'; ?>
        <!-- Side-Nav-->
        <?php include_once 'templates/sidebar.php'; ?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-3">
              <a href="page-add-news.php"><button class="btn btn-primary" type="button"><i class="fa fa-lg fa-pdf"></i> Neuen Artikel erstellen</button></a>
            </div>
          </div>
           <?php
            if(is_array($news) || is_object($news)) {
              foreach($news as $val) {
                if(isset($val['id']) ) { ?>
                <div class="row user" id="row<?php echo $val['id']; ?>">
                  <div class="col-md-6">
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
                              <li class="likes"><a href="page-edit-news.php?id=<?php echo $val['id']; ?>"><i class="fa fa-fw fa-lg fa-pencil"></i>Bearbeiten</a></li>
                              <li class="shares"><a class="btnDel" value="<?php echo $val['id']; ?>" name="btnDel<?php echo $val['id']; ?>" id="btnDel<?php echo $val['id']; ?>"><i class="fa fa-fw fa-lg fa-trash"></i>Löschen</a></li>
                            </ul>
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
            <!--outside loop-->
          </div>
        </div>
    <!-- footer-->
    <?php include_once 'templates/footer.html'; ?>
    <script type="text/javascript" src="ajax/delnews/del_news.js"></script>
  <?php }else{
       header('Location: index.php');
    } ?>