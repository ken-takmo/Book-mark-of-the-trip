<?php

    require_once __DIR__ . "/config.php";

    use Trip\Database;
    use Trip\Functions;

    $pdo = Database::getInstance();
    $func = new Functions($pdo);

    $func->deleteTrip($_GET['id']);
    
?>
<br>
<a href="../public/list.php">戻る</a>