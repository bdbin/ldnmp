<!DOCTYPE html>
<html>
<head>
<title>Welcome to LDNMP</title>
</head>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<h1 style="text-align: center;"> Welcome to LDNMP </h1>';
echo '<h2>Technology stack</h2>';

echo '<ul>';
echo '<li>PHP Version: ', PHP_VERSION, '</li>';
echo '<li>Nginx Version: ', $_SERVER['SERVER_SOFTWARE'], '</li>';
echo '<li>MySQL Version: ', getMysqlVersion(), '</li>';
echo '</ul>';

echo '<h2>PHP extension that has been installed</h2>';
printExtensions();

/**
 * get MySQL version
 */
function getMysqlVersion()
{
    if (extension_loaded('PDO_MYSQL')) {
        try {
            $dbh = new PDO('mysql:host=mysql;dbname=mysql', 'root', 'gYFMzPu85nWnYxebBGnxvf');
            $sth = $dbh->query('SELECT VERSION() as version');
            $info = $sth->fetch();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return $info['version'];
    } else {
        return 'PDO_MYSQL extension No Install ×';
    }

}

/**
 * get php extension
 */
function printExtensions()
{
    echo '<ol>';
    foreach (get_loaded_extensions() as $i => $name) {
        echo "<li>", $name, '=', phpversion($name), '</li>';
    }
    echo '</ol>';
}
