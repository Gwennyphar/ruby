<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  include_once 'inc.php';
  
  if( filter_input(INPUT_GET, 'id') ) {
    $newsId = filter_input(INPUT_GET, 'id');
    $news_d = getNewsDetails($mysqli, $newsId);
  }
  $news = getNews($mysqli);



  /**
   * news overview
   * @param type $mysqli
   * @return type
   */
  function getNews($mysqli) {
    $sql = "SELECT id_news, title, shorttext, description, start, end, id_file, file_link"
      . " FROM v_news order by start desc ";
    
    if($result = $mysqli->query($sql)) {
      $arr[] = '';
      while($obj  = $result->fetch_object()){
        $arr[] = array(
          'id'          => $obj->id_news,
          'title'       => utf8_encode($obj->title),
          'shorttext'   => utf8_encode($obj->shorttext),
          'description' => utf8_encode($obj->description),
          'start_date'  => convertDatetime($obj->start),
          'end_date'    => convertDatetime($obj->end),
          'id_file'     => $obj->id_file,
          'file_link'   => $obj->file_link,
        );
      }
    }
    $result->close();
    return $arr;
  }
    
   
  /**
   * news details
   * @param type $mysqli
   * @param type $newsId
   * @return type
   */
  function getNewsDetails($mysqli, $newsId) {
    $sql = "SELECT id_news, title, shorttext, description, start, end, id_file, file_link "
      . "FROM v_news WHERE id_news = $newsId order by start desc ";
    
    
    if($result = $mysqli->query($sql)) {
      $arr[] = '';
      while($obj  = $result->fetch_object()){
        $arr = array(
          'id'          => $obj->id_news,
          'title'       => utf8_encode($obj->title),
          'shorttext'   => utf8_encode($obj->shorttext),
          'description' => utf8_encode($obj->description),
          'start_date'  => convertDatetime($obj->start),
          'end_date'    => convertDatetime($obj->end),
          'id_file'     => $obj->id_file,
          'file'        => explode(",", $obj->file_link),
          'file_link'         => $obj->file_link,
        );
      }
    }
    $result->close();
    return $arr;
  }