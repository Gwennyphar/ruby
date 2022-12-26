<?php 
  include_once '../inc/check.php';
  include_once '../inc/inc.php';
  
  $delId = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);
  $imgVal = filter_var(filter_input(INPUT_POST, 'imgVal'), FILTER_SANITIZE_STRING);
  $imgId = filter_var(filter_input(INPUT_POST, 'imgId'), FILTER_SANITIZE_STRING);
  $label = filter_var(filter_input(INPUT_POST, 'label'), FILTER_SANITIZE_STRING);
  $btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

  if( strcmp($btn, 'delFile') == 0 || strcmp($btn, 'delAttachment') == 0) {
  
    
    if( strcmp($btn, 'delFile') == 0) {
      $att_table  = 'attachments';
      $table      = 'specimen';
      $col        = 'id_specim';
    } else if(strcmp($btn, 'delAttachment') == 0) {
      $att_table  = 'news_attachments';
      $table      = 'news';
      $col        = 'id_news';
    }
    
    /**
     * delete attachment
     */
    $delete = "DELETE "
      . "FROM  $att_table "
      . "WHERE id_file = $imgId";

    if(isset($delete)) {
      $stmnt_del = $mysqli->prepare($delete);
      $stmnt_del->execute();
    }

    /**
     * update specimen fk
     */
    $update = "UPDATE $table "
      . "SET id_file = 0 "
      . "WHERE $col = ".$delId;

   if(isset($update)) {
     $stmnt_upd = $mysqli->prepare($update);
     $stmnt_upd->execute();  
   }
   
   if ($stmnt_upd == true ) {
     $output = json_encode(array('type'=>'success', 'title' => ' Löschen erfolgreich: ', 'text' => 'Datei gelöscht.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
     die($output);  
   } else {
     $output = json_encode(array('type'=>'error', 'title' => ' Löschen fehlgeschlagen: ', 'text' => 'Datei nicht gelöscht.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
     die($output);
   }
  }