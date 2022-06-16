<?php
session_start();
include('connection.php');

//<!--    Store it in a variable-->
$catID = $_SESSION['cat'];

//<!--    Prepare variables for query-->
$catID = mysqli_real_escape_string($link, $catID);

//<!--    Run query set activation field to activated for the provided email-->
$sql = "SELECT * FROM forum_categories WHERE cat_id='$catID'";
$result = mysqli_query($link, $sql);

//<!--    If query is successful, show success message and invite user to login-->
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error();
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<h2>Questions in the ′' . $row['cat_name'] . '′ category</h2>';
        }
     
        //do a query for the topics
        $sql = "SELECT * FROM forum_topics WHERE topic_cat='$catID'";
        $result = mysqli_query($link, $sql);
         
        if(!$result)
        {
            echo 'The questions could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no questions in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<table class="table table-condensed" id="forumTable" border="1">
                      <tr>
                        <th>Question</th>
                        <th>Created on</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<div id="'.$row['topic_id'].'">
                                    <h3 class="topic-title"><a href="forumanswers.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>
                                </div>
                                <div class="delete-top admin-only">
                                        <button type="button" class="btn btn-lg btn-danger deleteforumelementbtn"><strong>&#8722;</strong></button>
                                    </div>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['topic_date']));
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}
?>            