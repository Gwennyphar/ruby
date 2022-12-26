<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'news';
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
            <div class="col-md-8">
              <div class="tab-content">
                <div class="card">
                  <h4 class="line-head">Neue Nachricht erstellen</h4>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Titel/Überschrift</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control clr" name="title" maxlength="45" placeholder="Titel eingeben" value="">
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Datum Von</label>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group date col-md-12">
                        <input class="form-control clr" size="16" type="text" name="start_date" value="" placeholder="Anzeigen ab">
                        <span class="input-group-addon btn btn-danger"><span class="fa fa-times"></span></span>
                        <span class="input-group-addon btn btn-info"><span class="fa fa-calendar"></span></span>
                      </div>
                    </div>
                      <div class="col-md-1">
                      <label>Bis</label>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group date col-md-12">
                        <input class="form-control clr" size="16" type="text" name="end_date" value="" placeholder="Anzeigen bis">
                        <span class="input-group-addon btn btn-danger"><span class="fa fa-times"></span></span>
                        <span class="input-group-addon btn btn-info"><span class="fa fa-calendar"></span></span>
                      </div>
                    </div> 
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Kurztext</label>
                    </div>
                    <div class="col-md-4">
                      <textarea type="text" class="form-control clr" id="shorttext" name="shorttext" maxlength="255" rows="5" cols="5" placeholder="Kurzbeschreibung" ></textarea>
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Beschreibung</label>
                    </div>
                    <div class="col-md-4">
                      <textarea type="text" class="form-control clr" id="description" name="description" maxlength="" rows="5" cols="5" placeholder="Beschreibung" ></textarea>
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Fotos</label>
                    </div>
                    <div class="col-md-8">
                      <div class="input-group col-md-4">
                        <input type="file" class="form-control" id="fileupload" name="fileupload" value="" multiple/>
                      </div>
                    </div> 
                  </div>
                  <div class="clearfix"></div>
                  <div class="row mb-6">
                    <div class="col-md-4">
                      <button class="btn btn-success" type="button" id="addNews" name="btnSave" value="save"><i class="fa fa-fw fa-lg fa fa-floppy-o"></i>Artikel veröffentlichen</button>
                    </div>
                    <div class="col-md-6">
                      <a href="page-news.php">
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
    </div>
    <!-- footer-->
    <?php include_once 'templates/footer.html'; ?>
    <script type="text/javascript" src="js/plugins/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/plugins/locales/bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
    <script type="text/javascript" src="ajax/addcollection/upload.js"></script>
    <script type="text/javascript" src="ajax/addnews/add_news.js"></script>
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