<?php 
include_once '../inc/check.php';
include_once '../inc/inc.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'update') == 0 ) {
//
  $newsId        = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);
  $title         = filter_var(filter_input(INPUT_POST, 'title'), FILTER_SANITIZE_STRING);
  $shorttext     = filter_var(filter_input(INPUT_POST, 'shorttext'), FILTER_SANITIZE_STRING);
  $description   = filter_var(filter_input(INPUT_POST, 'description'), FILTER_SANITIZE_STRING);
  $id_file       = filter_var(filter_input(INPUT_POST, 'attachment'), FILTER_SANITIZE_STRING);
  $imgVal        = filter_var(filter_input(INPUT_POST, 'imgVal'), FILTER_SANITIZE_STRING);
  
  //Datum in DB Format formatieren
  $start_date    = filter_var(filter_input(INPUT_POST, 'start'), FILTER_SANITIZE_STRING);
  $end_date      = filter_var(filter_input(INPUT_POST, 'end'), FILTER_SANITIZE_STRING);
  $start_date_us = date('Y-m-d', strtotime($start_date));
  $end_date_us   = date('Y-m-d', strtotime($end_date));
  
    /**
   * update attachements
   */
  
  if( $id_file != '' && $imgVal !== '' ) {
    $attmnt = "UPDATE news_attachments "
      . "SET link = '$imgVal'"
      . "WHERE id_file = ".$id_file;
    if(isset($attmnt)) {
      $stmnt_attmnt = $mysqli->prepare( utf8_decode($attmnt) );
      $stmnt_attmnt->execute(); 
    }
  }
  
  if( $id_file == '' && !empty($imgVal) ) {
    
    $insert = "INSERT INTO news_attachments (link)"
        . "VALUES ('".$imgVal."')";
    if(isset($insert)) {
      $stmnt_attmnt = $mysqli->prepare( utf8_decode($insert) );
      $stmnt_attmnt->execute();
      $fkFile = mysqli_insert_id($mysqli);   
    }
    
    /**
     * update specimen fk
     */
    $update = "UPDATE news "
        ."SET id_file = $fkFile "
        ."WHERE id_news = ".$newsId;
    if(isset($update)) {
      $stmnt_upd = $mysqli->prepare($update);
      $stmnt_upd->execute();    
    } 
  }

  /**
   * update news
   */
  $update = "UPDATE news "
      . "SET title = '$title', shorttext = '$shorttext', description = '$description', start = '$start_date_us', end = '$end_date_us' "
      . "WHERE id_news = ".$newsId; 

  if(isset($update)) {
    $stmnt = $mysqli->prepare( utf8_decode($update) );
    $stmnt->execute();
    $mysqli->close();
    if($stmnt == true) {
      $output = json_encode(array('brand'=>$brand, 'type'=>'success', 'title' => ' Änderung erfolgreich: ', 'text' => $title.' wurde aktualisiert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
      die($output);
    } 
  }else {
    $output = json_encode(array('type'=>'error', 'title' => ' Änderung fehlgeschlagen: ', 'text' => 'Aktualisierung war nicht erfolgreich.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
    die($output);  
  }
}