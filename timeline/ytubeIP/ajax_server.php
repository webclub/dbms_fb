<?php


include("config.php");

global $dbtable,$item,$userid;

if (isset($_POST)) {
    extract($_POST);

    //check if item liked or disliked ??
    ($option) ? $like = 1 : $dislike = 1;

    // what to update ?
    ($like) ? $action = "likes" : $action = "dislikes";
    // check if entry allready exists ??
    $exist = mysql_num_rows(mysql_query("select * from " . $dbtable . " where `item-id` =" . $item));
    //$userip = $_SERVER['REMOTE_ADDR'];
    $userid = $_POST['userid'];
    var_dump($userid);
    if (!$exist) {
        mysql_query("insert into " . $dbtable . " values('','" . $item . "','" . $like . "','" . $dislike . "','" . $userid . "')");
    } else {
        // check if ip exists ??
        if(!ip_exists($userid))
          mysql_query("update " . $dbtable . " set " . $action . " = " . $action . " +1, uid = concat(`uid`, '#". $userid."') where `item-id` = " . $item);
        else{
            echo '{"ip_exists":"1"}';
            exit;
        }  
    }

    // get review count
    $count = mysql_fetch_assoc(mysql_query("select * from " . $dbtable . " where `item-id` = " . $item));
    // Remove ip field its useless to send this bulk to client machine and increase connection overload and responce slowdown
    unset($count['uid']);
    $count['ip_exists'] = "0";
    echo json_encode($count);
}
function ip_exists(){
   global $dbtable,$item,$userid;
   $record = mysql_fetch_assoc(mysql_query("select * from " . $dbtable . " where `item-id` = " . $item));
   if(in_array($userid,explode('#',$record['uid'])))
           return true;
   return false;
}
?>