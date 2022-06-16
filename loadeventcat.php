<?php
session_start();
include('connection.php');

//get user_id
$user_id = $_SESSION['user_id'];
$event_id = $_SESSION['event_id'];
$host_id = $_SESSION['host_id'];

//run query to delete any notes with no content
$sql = "DELETE FROM event_forum_categories WHERE cat_description=''";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-warning">An error occured.</div>';
    exit;
}

//run query to look for notes corresponding to user_id
$sql = "SELECT * FROM event_forum_categories WHERE event_id='$event_id' ORDER BY cat_id ASC";

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
                    echo '<div id="'.$event_id.'"><h3 class="topic-title"><a href="eventforumtopics.php?id=' . $catID . '">' . $catname . '</a></h3>' . '<p>'.$description.'</p></div>
                        <div class="delete-cat admin-only">
                            <button type="button" class="btn btn-lg btn-danger deleteforumelementbtn"><strong>&#8722;</strong></button>
                        </div>';
                echo '</td>';
            echo '</tr>';
        }
    }else{
        echo "<div class='alert alert-warning'>No categories created yet.</div>";
        if($host_id == $user_id){
            echo "
            <div class='alert alert-warning'>Forum not created, please click the 'Create Forum' button to create one.</div>
            <button class='btn btnDone createForum' id='$event_id' name='createforum' type='button'>Create Forum</button>";
        }else{
            echo "<div class='alert alert-warning'>Forum not created, please contact the event organiser to request that they create one using the 'Create Forum' button in the event management screen.</div>";
        }
    }
}else{
    echo '<div class="alert alert-warning">An error occured, finding the categories.</div>';
//    echo mysqli_error($link); USED FOR DEBUGGING
}

?>