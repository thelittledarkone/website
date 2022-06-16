<?php
session_start();
include('connection.php');

//get user_id
$user_id = $_SESSION['user_id'];

//run query to delete any notes with no content
$sql = "DELETE FROM forum_categories WHERE cat_description=''";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-warning">An error occured.</div>';
    exit;
}

//run query to look for notes corresponding to user_id
$sql = "SELECT * FROM forum_categories ORDER BY cat_id ASC";

//show notes or alert message
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        //prepare the table
        echo '<table class="table table-condensed" id="forumTable" border="1">
              <tr>
                <th>Categories</th>
              </tr>'; 
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $catID = $row['cat_id'];
            $catname = $row['cat_name'];
            $description = $row['cat_description'];
                        
            echo '<tr>';
                echo '<td class="">';
                    echo '<h3 class="topic-title"><a href="forumquestions.php?id=' . $catID . '">' . $catname . '</a></h3>' . '<p>'.$description.'</p>';
                echo '</td>';
            echo '</tr>';
        }
    }else{
        echo '<div class="alert alert-warning">No categories created yet.</div>';
    }
}else{
    echo '<div class="alert alert-warning">An error occured, finding the categories.</div>';
//    echo mysqli_error($link); USED FOR DEBUGGING
}

?>