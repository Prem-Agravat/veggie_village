<?php

include_once "config.php";

try {
    $pdoconn = new PDO("mysql:host=$host; dbname=$database", $user, $pwd, array( PDO::ATTR_PERSISTENT => true ));
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    // Output a helpful message instead of crashing silently
    die("<div style='padding: 20px; background: #ffebee; border: 1px solid #ffcdd2; color: #b71c1c; font-family: sans-serif; border-radius: 5px; margin: 20px;'>
        <strong>Database Connection Error!</strong><br>
        Could not connect to the database. If you recently uploaded to InfinityFree, please ensure your database credentials in <code>backends/config.php</code> are updated.<br><br>
        <strong>Technical Details:</strong> " . htmlspecialchars($e->getMessage()) . "
    </div>");
}


?>


