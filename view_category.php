<?php
    include("header.php");
    include("connect.php");
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        $pageid = $_GET['pageid'];
        echo "<h1 id='o'>This categories cid is:$cid</h1>";
        $sql = "SELECT category_title FROM forum.categories WHERE id= '".$cid."'LIMIT 1";
        $fetch = mysql_query($sql) or die(mysql_error());
        $rows = mysql_fetch_assoc($fetch);
        $title = $rows['category_title'];
        echo "<h1 id='o'>Category: $title</h1>";
        $sql2 = "SELECT * FROM forum.topics  WHERE category=$cid";
        echo "<div id='topic_section'><hr>";
        $fetch2 = mysql_query($sql2) or die(mysql_error());
        while($rows2=mysql_fetch_assoc($fetch2)){
            $topic_title=$rows2['topic_title'];
            $topic_content=$rows2['topic_content'];
            $topic_creator=$rows2['topic_creator'];
            $topic_upvotes=$rows2['topic_upvotes'];
            $topic_date=$rows2['topic_date'];
            $topic_last_user=$rows2['topic_last_user'];
            echo "<div class='topics'><h1 id='r'>Topic: $topic_title</h1>";
            echo "<h1 id='r'>Started by:$topic_creator</h1>";
            echo "<h1 id='r'>Upvotes:$topic_upvotes</h1>";
            echo "<h1 id='r'>Created at:$topic_date</h1>";
            echo "<h1 id='r'>Last user:$topic_last_user</h1><hr></div>";
            
        }
        echo "</div>";
    }else{
        echo "<h1>Error, this category doesn't exist.</h1>";
    }

?>
<?php
include("footer.php");
?>