<?php 
include_once '../inc/check.php';
include_once '../inc/inc.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'update') == 0 ) {

  $id            = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);
  $title         = filter_var(filter_input(INPUT_POST, 'title'), FILTER_SANITIZE_STRING);
  $id_mineral    = filter_var(filter_input(INPUT_POST, 'id_mineral'), FILTER_SANITIZE_STRING);
  $mineral       = filter_var(filter_input(INPUT_POST, 'mineral'), FILTER_SANITIZE_STRING);
  $location      = filter_var(filter_input(INPUT_POST, 'location'), FILTER_SANITIZE_STRING);
  $number        = filter_var(filter_input(INPUT_POST, 'number'), FILTER_SANITIZE_STRING);
  $description   = str_replace('€', '&euro;', filter_var(filter_input(INPUT_POST, 'description'), FILTER_SANITIZE_STRING));
  $id_file       = filter_var(filter_input(INPUT_POST, 'attachment'), FILTER_SANITIZE_STRING);
  $imgVal        = filter_var(filter_input(INPUT_POST, 'imgVal'), FILTER_SANITIZE_STRING);

  //Datum in DB Format formatieren
  $date          = filter_var(filter_input(INPUT_POST, 'date'), FILTER_SANITIZE_STRING);
  $convDate      = date('Y-m-d', strtotime($date));
  

  /**
   * update attachements
   */
  
  if( $id_file != '' && $imgVal !== '' ) {
    $attmnt = "UPDATE attachments "
      . "SET link = '$imgVal'"
      . "WHERE id_file = ".$id_file;
    if(isset($attmnt)) {
      $stmnt_attmnt = $mysqli->prepare( utf8_decode($attmnt) );
      $stmnt_attmnt->execute(); 
    }
  }
  
  if( $id_file == '' && !empty($imgVal) ) {
    
    $insert = "INSERT INTO attachments (link)"
        . "VALUES ('".$imgVal."')";
    if(isset($insert)) {
      $stmnt_attmnt = $mysqli->prepare( utf8_decode($insert) );
      $stmnt_attmnt->execute();
      $fkFile = mysqli_insert_id($mysqli);   
    }
    
    /**
     * update specimen fk
     */
    $update = "UPDATE specimen "
        ."SET id_file = $fkFile "
        ."WHERE id_specim = ".$id;
    if(isset($update)) {
      $stmnt_upd = $mysqli->prepare($update);
      $stmnt_upd->execute();    
    } 
  }
  
  /**
   * update specimen
   */
  $update = "UPDATE specimen "
      . "SET title = '$title',  id_mineral = '$id_mineral', id_location = '$location', date = '$convDate', number = '$number', description = '$description' "
      . "WHERE id_specim = ".$id;
    
  if(isset($update)) {
    $stmnt = $mysqli->prepare( utf8_decode($update) );
    $stmnt->execute();
    $mysqli->close();
    if($stmnt == true) {
      $output = json_encode(array('brand'=>$brand, 'type'=>'success', 'title' => ' Änderung erfolgreich: ', 'text' => $mineral.' wurde aktualisiert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
      die($output);
    } 
  }else {
    $output = json_encode(array('type'=>'error', 'title' => ' Änderung fehlgeschlagen: ', 'text' => 'Aktualisierung war nicht erfolgreich.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
    die($output);  
  }
}