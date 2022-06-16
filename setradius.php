<?php
//<!--Start Session-->
session_start();

if (isset($_POST['radius'])) {
    $_SESSION['radius'] = $_POST['radius'];
  }else{
    echo '<div class="alert alert-danger">Radius Not Set</div>';
}


?>