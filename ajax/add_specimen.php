<?php 
include_once '../inc/check.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'btnSave') == 0 || strcmp($btn, 'addCopyBtn') == 0) {
  
  if(strcmp(filter_var(filter_input(INPUT_POST, 'type'), FILTER_SANITIZE_STRING), '') == 1 ){
    $type = 1;
  } else {
    $type = 0;
  }

  $title         = filter_var(filter_input(INPUT_POST, 'title'), FILTER_SANITIZE_STRING);
  $mineral       = filter_var(filter_input(INPUT_POST, 'mineral'), FILTER_SANITIZE_STRING);
  $location      = filter_var(filter_input(INPUT_POST, 'location'), FILTER_SANITIZE_STRING);
  $number        = filter_var(filter_input(INPUT_POST, 'number'), FILTER_SANITIZE_STRING);
  $description   = str_replace('€', '&euro;', filter_var(filter_input(INPUT_POST, 'description'), FILTER_SANITIZE_STRING));
  $imgVal        = filter_var(filter_input(INPUT_POST, 'imgVal'), FILTER_SANITIZE_STRING);
        
  
  //Datum in DB Format formatieren
  $date          = filter_var(filter_input(INPUT_POST, 'date'), FILTER_SANITIZE_STRING);
  $convDate      = date('Y-m-d', strtotime($date));
    
  /**
   * errorhandling
   */       
  if(empty($title) ) {
    $output = json_encode(array('type'=>'error', 'title' => ' Achtung: '.$title, 'text' => 'Bitte einen Titel vergeben.', 'alert' => 'warning', 'icon'=>'fa fa-warning'));  
    die($output);
  } else {
    
    /**
     * insert attachements
     */
     $attmnt = "INSERT INTO attachments (link)"
      . "VALUES ('".$imgVal."')";
     if(isset($attmnt)) {
      $stmnt_attmnt = $mysqli->prepare( utf8_decode($attmnt) );
      $stmnt_attmnt->execute();
      $fkFile = mysqli_insert_id($mysqli);  
    }
           
    /**
     * insert specimen
     */
     $spec = "INSERT INTO specimen (type, title, id_mineral, date, id_location, number, description, id_file )"
       . " VALUES ($type, '".$title."', $mineral, '".$convDate."', $location, '".$number."', '".$description."', $fkFile)";

     if(isset($spec)) {
       $stmnt_spec = $mysqli->prepare( utf8_decode($spec) );
       $stmnt_spec->execute();  
     }

     if ($stmnt_spec == true ) {
       $output = json_encode(array('type'=>'success', 'title' => ' Speichern war erfolgreich: ', 'text' => ' Belegstück angelegt.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
       die($output);  
     }
     $mysqli->close(); 
     
  }  
} else {
  $output = json_encode(array('type'=>'error', 'title' => ' Speichern fehlgeschlagen: ', 'text' => 'Belegstück wurde nicht gespeichert.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
  die($output);
}
    