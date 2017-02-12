<?php
    date_default_timezone_set('UTC');

    if (php_sapi_name() != 'cli')
        die("error: not command line");

    try
    {
        $db = new PDO('sqlite:db/openra.db');
        echo "Connection to DB established.\n";

        if ($db->query('ALTER TABLE sysinfo ADD COLUMN x64 BOOL DEFAULT 1'))
            echo "Added column 'x64'.\n";
        if ($db->query('ALTER TABLE sysinfo ADD COLUMN windowsize STRING DEFAULT "0x0"'))
            echo "Added column 'windowsize'.\n";
        if ($db->query('ALTER TABLE sysinfo ADD COLUMN windowscale STRING DEFAULT "1.00"'))
            echo "Added column 'windowscale'.\n";
        if ($db->query('ALTER TABLE sysinfo ADD COLUMN sysinfoversion INTEGER DEFAULT 1'))
            echo "Added column 'sysinfoversion'.\n";

        $db = null;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>
