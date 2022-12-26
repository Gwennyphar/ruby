<?php 
  include_once '../inc/check.php';
  $id = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);
  $mineral = filter_var(filter_input(INPUT_POST, 'name'), FILTER_SANITIZE_STRING);
  /**
   * delete user
   */
   $del_mineral = "DELETE m.*
     FROM minerals m
     WHERE id_mineral = $id";

   if(isset($del_mineral)) {
     $stmnt_del = $mysqli->prepare($del_mineral);
     $stmnt_del->execute();
   }
   if ($stmnt_del == true ) {
     $output = json_encode(array('type'=>'success', 'title' => ' Löschen erfolgreich: ', 'text' => $mineral.' wurde gelöscht.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
     die($output); 
   } else {
     $output = json_encode(array('type'=>'error', 'title' => ' Löschen fehlgeschlagen: ', 'text' => $mineral.'  wurde nicht gelöscht.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
     die($output);
   }