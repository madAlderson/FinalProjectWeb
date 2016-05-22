<?php
    include("connect.php");
function encrypt($input,$rounds=9){
    $salt="";
    $saltChars = array_merge(range('A','Z'),range('a','z'),range('0','9'));
    for($i = 0;$i<22;$i++){
        $salt .= $saltChars[array_rand($saltChars)];
        
    }
    return crypt($input, sprintf('$2y$%02d$',$rounds).$salt);
    
}
function invalid($text){
    return(bool)preg_match('/["!$%&\/()=[\]\?.:;\-_]/u',$text);
}
function sql_search($text,$field){
    $sql=mysql_query("SELECT * FROM forum.users WHERE '".$field."'='".$text."'");
    $res=$sql or die (mysql_error());
    $count=mysql_num_rows($res);
    if($count==1){
        return true;
    }
    return false;
}




?>