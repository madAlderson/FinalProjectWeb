<?php
session_start();
include ("header.php");
include "connect.php";
?>
<body align="center">
    <div id="wrapper">
        <div id="login_form">
            <?php
            if(!isset($_SESSION['uid'])){
            echo"<form action='login.php' method='post'>
                <h1>Login to the system</h1>
                Username: <input type='text' name='username'/><br>
                Password: <input type='password' name='password'/><br>
                <input type='submit' name='login' value='Log In'/>
                <a id='ss' href='signup.php'>REGISTER</a>
                
                
            </form>";
            }else{
                echo "Welcome to the system. You are logged in with ID:".$_SESSION['uid']."
                <a href='logout.php'>Log out</a>";
            }
            echo "<div id='categories'>";
                
                $sql= "SELECT * FROM forum.categories;";
                $fetch = mysql_Query($sql) or die(mysql_Error());
                while($row = mysql_Fetch_Assoc($fetch)){
                    $title = $row['category_title'];
                    $description=$row['category_description'];
                    $topic_amount=$row['topic_amount'];
                    $last_post_d=$row['last_posted_date'];
                    $cid=$row['id'];
                    echo "<a href='view_category.php?cid=$cid&pageid=1'><h1 id='r'>$title</h1></a>
                            <h1 id='r'>$description</h1>
                            <h1 id='r'>amount of topics:$topic_amount</h1><hr>";
                            
                }
                
            
            echo"</div>";
            ?>
            
        </div>
    </div>
</body>

<?php
include("footer.php");
?>