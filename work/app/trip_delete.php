<?php

    require_once('functions.php');
    use Trip\Functions;
    Functions::deleteTrip($_GET['id']);
    
?>
<br>
<a href="../public/list.php">戻る</a>