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
          <div class="row user">
            <div class="col-md-8">
              <div class="tab-content">
                <div class="card">
                  <h4 class="line-head">News bearbeiten</h4>
                  <div class="row mb-20">
                    <div class="col-md-1">
                      <label>Überschrift</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="title<?php echo $news_d['id']; ?>" maxlength="45" placeholder="Überschrift eingeben" value="<?php echo $news_d['title']; ?>">
                    </div>
                    </div>
                    <div class="row mb-20">
                      <div class="col-md-1">
                        <label>Datum Start</label>
                      </div>
                      <div class="col-md-3">
                        <div class="input-group date col-md-12">
                          <input class="form-control" size="16" type="text" name="start_date<?php echo $news_d['id']; ?>" value="<?php echo $news_d['start_date']; ?>" placeholder="Anzeigen ab">
                          <span class="input-group-addon btn btn-danger"><span class="fa fa-times"></span></span>
                          <span class="input-group-addon btn btn-info"><span class="fa fa-calendar"></span></span>
                        </div>
                      </div> 
                      <div class="col-md-3">
                        <div class="input-group date col-md-12">
                          <input class="form-control" size="16" type="text" name="end_date<?php echo $news_d['id']; ?>" value="<?php echo $news_d['end_date']; ?>" placeholder="Anzeigen bis">
                          <span class="input-group-addon btn btn-danger"><span class="fa fa-times"></span></span>
                          <span class="input-group-addon btn btn-info"><span class="fa fa-calendar"></span></span>
                        </div>
                      </div> 
                    </div>
                    <div class="row mb-20">
                      <div class="col-md-1">
                        <label>Kurztext</label>
                      </div>
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="shorttext<?php echo $news_d['id']; ?>" name="shorttext" maxlength="255" rows="5" cols="5" placeholder="Kurzbeschreibung" ><?php echo $news_d['shorttext']; ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-20">
                      <div class="col-md-1">
                        <label>Beschreibung</label>
                      </div>
                      <div class="col-md-6">
                        <textarea type="text" class="form-control" id="description<?php echo $news_d['id']; ?>" name="description" maxlength="" rows="10" cols="5" placeholder="Beschreibung" ><?php echo $news_d['description']; ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-20">
                      <div class="col-md-1">
                        <label>Fotos</label>
                      </div>
                      <div class="col-md-10">
                        <div class="table-responsive mailbox-messages">
                          <table class="table table-hover attachment">
                            <tbody>
                              <?php
                                if(!empty($news_d['file_link']) ){
                                  echo '
                                    <tr id="idrow'.$news_d['id_file'].'">
                                      <td><a href="/ruby/docs/'.$news_d["file_link"].'"><img src="/ruby/docs/'.$news_d["file_link"].'" class="preview_image" width="200" height="180"></a></td>
                                      <td><a class="remove-file" id="'.$news_d['id_file'].'" name="attachment" id="attachment" value="'.$news_d['id_file'].'"><i class="fa fa-fw fa-small fa fa-times"></i></a></td>
                                      <td><a href="/ruby/docs/'.$news_d['file_link'].'" target="blank"><i class="fa fa-paperclip"></i></a></td>
                    
                                    </tr>';
                                }?>
                            </tbody>
                          </table>
                        </div>
                        <div class="input-group col-md-4">
                          <input type="file" class="form-control" id="fileupload" name="fileupload" multiple/>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div> 
                    <div class="row mb-20">
                      <div class="col-md-3">
                        <input type="hidden" name="gid" value="<?php echo $news_d['id']; ?>">
                        <button class="btn btn-success btnUpd" type="button" id="btnUpd" name="btnUpd" value="<?php echo $news_d['id']; ?>"><i class="fa fa-fw fa-lg fa fa-floppy-o"></i>Änderung speichern</button>
                      </div> 
                      <div class="col-md-3">
                        <button class="btn btn-danger btnDel" type="button" id="btnDel" name="btnDel" value="<?php echo $news_d['id']; ?>"><i class="fa fa-fw fa-lg fa fa-trash-o"></i>News löschen</button>
                      </div>
                      <div class="col-md-3">
                        <a href="page-news.php">
                          <button class="btn btn-info" type="button" id="btnQuit" name="btnQuit" ><i class="fa fa-fw fa-lg fa fa-table"></i>Zur Übersicht</button>
                        </a>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <!-- footer-->
    <?php include_once 'templates/footer.html'; ?>
    <script type="text/javascript" src="js/plugins/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/plugins/daterangepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/plugins/locales/bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
    <script type="text/javascript" src="ajax/addcollection/upload.js"></script>
    <script type="text/javascript" src="ajax/updnews/upd_news.js"></script>
    <script type="text/javascript" src="ajax/delnews/del_files.js"></script>
    <script type="text/javascript" src="ajax/delnews/del_news_details.js"></script>
    <script type="text/javascript">
      $('.date').datetimepicker({
         language:  'de',
         weekStart: false,
         todayBtn:  true,
         autoclose: true,
         todayHighlight: true,
         startDate: new Date(),
         endDate: '+1y',
         startView: 2,
         minView: 2,
         maxView: 2,
         forceParse: true,
         daysOfWeekDisabled:"",
         minuteStep: 5,
         pickerPosition: "bottom-right",
         initialDate: new Date(),
         format: "dd.mm.yyyy"
        }); 
  </script>
 <?php }else{
       header('Location: index.php');
    } ?>