<?php 
include_once '../inc/check.php';
$btn = filter_var(filter_input(INPUT_POST, 'btn'), FILTER_SANITIZE_STRING);

if( strcmp($btn, 'updProfile') == 0 ) {
    
    //get the saved password from database
    $sql = "SELECT password FROM v_users WHERE uid = ".$user_check;
    if(isset($sql)) {
        $stmnt = $mysqli->prepare($sql);
        $stmnt->execute();
        $result = $stmnt->get_result();
        while($row = $result->fetch_object()) {
            $pwd = $row->password;
        }
        $username     = filter_var(filter_input(INPUT_POST, 'username'), FILTER_SANITIZE_STRING);
        $curntPwd  = filter_var(filter_input(INPUT_POST, 'curnt_pwd'), FILTER_SANITIZE_STRING);
        $saltPwd   = md5($curntPwd);
        $txtPwd    = filter_var(filter_input(INPUT_POST, 'new_pwd'), FILTER_SANITIZE_STRING);
        $newPwd    = md5($txtPwd);
        $repeatPwd = md5( filter_var(filter_input(INPUT_POST, 'repeat_pwd'), FILTER_SANITIZE_STRING) );
        if( ( strcmp($pwd, $saltPwd) == 0 && strcmp($newPwd, 'd41d8cd98f00b204e9800998ecf8427e') == 0 ) ) {
          $update = "UPDATE users u, logins l
                     SET u.name = '$username'
                     WHERE u.id_ma = l.id_ma AND l.uid = ".$user_check;
        } else if( strcmp($pwd, $saltPwd) == 0 && strcmp($newPwd, $repeatPwd) == 0 ) {
          $update = "UPDATE users u,logins l
                     SET u.name = '$username', l.md5 = '$newPwd', pwd = '$txtPwd'
                     WHERE u.id_ma = l.id_ma AND l.uid = ".$user_check;
        } else {
            $output = json_encode(array('type'=>'error', 'title' => ' Achtung: ', 'text' => 'Passwörter stimmen nicht überein.', 'alert' => 'warning', 'icon'=>'fa fa-warning'));  
            die($output);
        }
        //change Layouttext
        if(isset($update)) {
            $stmnt = $mysqli->prepare($update);
            $stmnt->execute();
            if($stmnt == true) {
              
              //password  
              if(empty($txtPwd)) {
                $pw = $curntPwd;
              } else {
                $pw = $txtPwd;
              }
                          
              $output = json_encode(array('fullname'=>$username, 'user'=> strtolower($username), 'pw'=>$pw, 'type'=>'success', 'title' => ' Änderung erfolgreich: ', 'text' => 'Ihr Profil wurde aktualisiert.', 'alert' => 'success', 'icon'=>'fa fa-check'));  
              die($output);
            } else {
                $output = json_encode(array('type'=>'error', 'title' => ' Änderung fehlgeschlagen: ', 'text' => 'Aktualisierung war nicht erfolgreich.', 'alert' => 'danger', 'icon'=>'fa fa-ban'));  
                die($output);
            }
            $mysqli->close();      
        }
    } else {
       $output = json_encode(array('type'=>'error', 'title' => ' Fehler: ', 'text' => 'Aktualisierung nicht möglich.', 'alert' => 'info', 'icon'=>'fa fa-bug'));  
       die($output);
    }
}