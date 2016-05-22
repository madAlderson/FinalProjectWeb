<?php
include("connect.php");
session_start();

$username=$_POST['username'];
$password=$_POST['password'];


echo "<h1>$username</h1><br/>";
echo "<h1>$password</h1>";


$mysqli = new mysqli('localhost','root','','forum'); 
$preparethissql = "SELECT username, password FROM forum.users WHERE username=? AND password=? LIMIT 1";
$stmt = $mysqli->prepare($preparethissql);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$stmt->store_result();
$res=$stmt->num_rows();

if($res == 1){
    echo "You succesfully logged-in";
    //$_SESSION['username'] = $username;
    //echo "<h1>".$_SESSION['username']."</h1>";
    $getID = "SELECT id FROM forum.users WHERE username='".$username."' LIMIT 1";
    $execute = mysql_query($getID) or die (mysql_error());
    $fetch = mysql_fetch_assoc($execute);
    $id = $fetch['id'];
    $_SESSION['uid']=$id;
    echo "<h1 id='lal'>Your unique id is:".$_SESSION['uid']."</h1>";
    header("Location: index.php");
    exit();
}else{
    echo "The username and password you typed are not supplied";
    
}




?>