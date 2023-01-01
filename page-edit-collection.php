<?php 
 include('inc/login.php');
 if( (isset($_SESSION['uid']) != '') ){
   $page = 'collection';
   include_once 'inc/check.php'; ?>
    <!--header -->
    <?php 
    include_once 'templates/header.php'; 
    include_once 'inc/config.php';
    include_once 'inc/specimen_details.php'; 
    ?>
    <body class="sidebar-mini fixed">
      <div class="wrapper bg-rd">
        <!-- Navbar-->
        <?php include_once 'templates/navbar.php'; ?>
        <!-- Side-Nav-->
        <?php include_once 'templates/sidebar.php'; ?>
        <div class="content-wrapper">
            <div class="col-md-12">
              <div class="tab-content">
                <div class="card">
                  <h4 class="line-head"><label></label></h4>
                  <div class="row mb-20">
                    <div class="form-group">
                      <div class="col-md-2">
                        <label>Exemplar</label>
                      </div>
                      <div class="radio-inline animated-radio-button">
                        <label>
                          <input type="radio" name="type" id="mineral" checked="" value="1"><span class="label-text">Mineral</span>
                        </label>
                      </div>
                      <div class="radio-inline animated-radio-button">
                        <label>
                          <input type="radio" class="" name="type" id="fossil" value="2"><span class="label-text">Fossil</span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Mineral</label>
                    </div>
                    <div class="col-md-3">
                      <?php echo getMineral($mysqli, 'sel_mineral', $specimen_d['id_mineral'], 'sel_mineral'); ?>
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Titel</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control clr" name="title" maxlength="255" placeholder="Bezeichnung eingeben" value="<?php echo $specimen_d['title']; ?>">
                    </div> 
                    <div class="col-md-2">
                      <label></label>
                    </div>
                      <?php if( isset($specimen_d['link']) ) { ?>
                      <div class="row mb-6">
                        <div class="col-md-3">
                          <a href="/ruby/docs/<?php echo $specimen_d['link']; ?>">
                              <img src="/ruby/docs/<?php echo $specimen_d['link']; ?>" class="preview_image_detailpage" width="50%" height="50%">
                          </a>
                          <?php
                            echo '
                            <div class="col-md-10">
                              <div class="col-md-1"><a class="remove-file" id="attachment" name="attachment" value="'.$specimen_d['id_file'].'"><i class="fa fa-fw fa-small fa fa-times"></i></a></div>
                              <div class="col-md-1"><a href="/ruby/docs/'.$specimen_d['link'].'" target="blank"><i class="fa fa-paperclip"></i></a></div>
                            </div>';
                          ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Fund/Kaufdatum</label>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group date col-md-12">
                        <input class="form-control clr" size="16" type="text" name="date" value="<?php echo $specimen_d['date']; ?>" placeholder="Datum auswählen">
                        <span class="input-group-addon btn btn-danger"><span class="fa fa-times"></span></span>
                        <span class="input-group-addon btn btn-info"><span class="fa fa-calendar"></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Fundort</label>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group col-md-12">
                        <?php echo getLocation($mysqli, 'sel_local', $specimen_d['id_location'], 'sel_local'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Sammlungsnummer</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control clr" name="number" maxlength="255" placeholder="Sammlungsnummer eingeben" value="<?php echo $specimen_d['number']; ?>">
                    </div> 
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Status</label>
                    </div>
                    <div class="col-md-2 toggle">
                      <label>
                        <input type="checkbox" class="clr" name="stat1" id="stat1" value="1" onclick="collection();"><span class="button-indecator"></span>
                      </label>
                      <label id="stat-1">in Sammlung</label>
                    </div>
                    <div class="col-md-2 toggle">
                      <label>
                        <input type="checkbox" class="clr" name="stat2" id="stat2" value="1" onclick="sale();"><span class="button-indecator"></span>
                      </label>
                      <label id="stat-2">zum Verkauf</label>
                    </div>
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Beschreibungen</label>
                    </div>
                    <div class="col-md-5">
                      <textarea type="text" class="form-control clr" id="description" name="description" rows="5" maxlength="" placeholder="Beschreibung eingeben"><?php echo $specimen_d['description']; ?></textarea>
                    </div> 
                  </div>
                  <div class="row mb-20">
                    <div class="col-md-2">
                      <label>Fotos</label>
                    </div>
                    <div class="col-md-10">
                      <div class="table-responsive mailbox-messages">
                        <div class="input-group col-md-4">
                          <input type="file" class="form-control" id="fileupload" name="fileupload" value="" multiple/>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="clearfix"></div>
                <div class="row mb-20">
                  <div class="col-md-2">
                    <input type="hidden" name="id" value="<?php echo $specimen_d['id']; ?>">
                    <button class="btn btn-success" type="button" id="btnUpd" name="btnUpd" value="update"><i class="fa fa-fw fa-lg fa fa-floppy-o"></i>Speichern</button>
                  </div> 
                  <div class="col-md-2">
                    <button class="btn btn-danger btnDel" type="button" id="btnDel" name="btnDel" value="delete"><i class="fa fa-fw fa-lg fa fa-trash-o"></i>Löschen</button>
                  </div>   
                  <div class="col-md-2">
                     <button class="btn btn-warning" type="button" id="addCopyBtn" name="addCopyBtn" ><i class="fa fa-fw fa-lg fa fa-copy"></i>Klonen</button> 
                  </div>
                  <div class="col-md-2">
                    <a href="page-collection.php">
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
    </div>
    <!-- footer-->
    <?php include_once 'templates/footer.html'; ?>
  <script type="text/javascript" src="js/plugins/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
  <script type="text/javascript" src="js/plugins/daterangepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="js/plugins/locales/bootstrap-datetimepicker.de.js" charset="UTF-8"></script>
  <script type="text/javascript" src="ajax/addcollection/upload.js"></script>
  <script type="text/javascript" src="ajax/updcollection/upd_specimen.js"></script>
  <script type="text/javascript" src="ajax/addcollection/add_specimens.js"></script>
  <script type="text/javascript" src="ajax/delcollection/del_specimen_details.js"></script>
  <script type="text/javascript" src="ajax/delcollection/del_files.js"></script>
  <script type="text/javascript">
    $('.date').datetimepicker({
      language:  'de',
      weekStart: true,
      todayBtn:  true,
      autoclose: true,
      todayHighlight: true,
      endDate: '-0m',
      changeMonth: false,
      changeYear: true,
      startView: 3,
      minView: 3,
      maxView: 3,
      forceParse: true,
      daysOfWeekDisabled:"",
      minuteStep: 5,
      pickerPosition: "top-right",
      initialDate: new Date(),
      format: "dd.mm.yyyy"
     });
     
  
    /**
     * 
     * @returns {undefined}
     */
    function collection() {
      var text;
      var stat = document.getElementById("stat1").checked;

      if(stat === true) {
        text = 'in Sammlung';
      } else if(stat === false) {
        text = '';
      }
      document.getElementById('stat-1').innerHTML = text;
    }
    collection();
    
    
    /**
     * 
     * @returns {undefined}
     */
    function sale() {
      var text;
      var stat = document.getElementById("stat2").checked;

      if(stat === true) {
        text = 'zum Verkauf';
      } else if(stat === false) {
        text = '';
      }
      document.getElementById('stat-2').innerHTML = text;
    }
    sale();  
  </script>
 <?php }else{
       header('Location: index.php');
    } ?>