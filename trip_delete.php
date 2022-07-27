<?php

    require_once('functions.php');
    use Trip\Functions;
    Functions::deleteTrip($_GET['id']);
    
?>
<br>
<a href="/">戻る</a>