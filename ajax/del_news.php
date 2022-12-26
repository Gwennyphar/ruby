<?php 
  include_once '../inc/check.php';
  $btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);
  
  if(strcmp($btn, 'delNews')==0 ) {
    $newsId = filter_var(filter_input(INPUT_POST, 'id'), FILTER_SANITIZE_STRING);

    /**
     * delete news
     *  LEFT JOIN attachments a ON s.id_file = a.id_file
     */
    $del_news = "DELETE n.*, a.* 
      FROM news n 
      LEFT JOIN news_attachments a ON n.id_file = a.id_file
      WHERE n.id_news = $newsId";

    if(isset($del_news)) {
      $stmnt_del = $mysqli->prepare($del_news);
      $stmnt_del->execute();
    }
    if ($stmnt_del == true ) {
      $output = json_encode(array('type'=>'success', 'title' => ' Löschen erfolgreich: ', 'text' => 'Artikel gelöscht.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
      die($output); 
    } else {
      $output = json_encode(array('type'=>'error', 'title' => ' Löschen fehlgeschlagen: ', 'text' => 'Artikel nicht gelöscht.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
      die($output);
    }
  }