<?php
include("header.php");



?>
<form id="" action="regist.php" class="" method='post'>
    <h1>Sign up to the SYSTEM</h1>
    <input type='text' placeholder='username' name='username'/><br/>
    <input type='password' placeholder='password' name='password'/ ><br/>
    <input type='submit' name='register' value='REGISTER'/>
</form>
<?php
    if(isset($_POST['register'])){
        if($_POST['username']==""||$_POST['password']==""){
            echo "<p class='error'>All the fields must be filled in</p>";   
        }else{
            $valid=true;
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(invalid($username)||invalid($password)){
                $valid=false;
                echo "<p class='error'>Only [a-z][A-Z][0-9] are acceptional</p>";
            }
            if(strlen($password)<8){
                $valid=false;
                echo "<p class='error'>Password must be longer than 8 characters</p>";
            }
            if(sql_search($username,"username")){
                $valid=false;
            }
            if($valid){
                $password = encrypt($password);
                $mysqli = new mysqli("localhost","root","","forum");
                $sql="INSERT INTO users(username ,password) VALUES ('".$username."','".$password."')";
                $stmt = $mysqli->prepare($sql);
                mysqli_query($mysqli,$sql);
                $getID = "SELECT id FROM forum.users WHERE username='".$username."' LIMIT 1";
                $execute = mysql_query($getID) or die (mysql_error());
                $fetch = mysql_fetch_assoc($execute);
                $id = $fetch['id'];
                $_SESSION['uid']=$id;
                echo "<h1 id='lal'>Your unique id is:".$_SESSION['uid']."</h1>";
                header("Location: index.php");
                exit(); 
                
                
                
            }
        }
    }
?>
<?php
    include("footer.php");
?>