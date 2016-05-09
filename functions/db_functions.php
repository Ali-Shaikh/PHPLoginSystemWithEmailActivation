<?php
/**
 * Database functions for a MySQL with PHP tutorial
 *
 * @copyright Eran Galperin
 * @license MIT License
 * @see http://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17
 */

/**
 * Connect to the database
 *
 * @return bool false on failure / mysqli MySQLi object instance on success
 */
?>
<?php
function db_connect()
{
    // Define connection as a static variable, to avoid connecting more than once
    static $connection;
    // Try and connect to the database, if a connection has not been established yet
    if (!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('config.ini');
        $connection = mysqli_connect($config['dbhost'], $config['username'],
            $config['password'], $config['dbname']);
    }
    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    return $connection;
}
?>

<?php
function db_error()
{
    $connection = db_connect();
    return mysqli_error($connection);
}
?>

<?php
function db_query($query)
{
    // Connect to the database
    $connection = db_connect();
    // Query the database
    $result = mysqli_query($connection, $query);
    return $result;
}
?>

<?php
function db_quote($value)
{
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection, $value) . "'";
}
?>

<?php
function db_select($query)
{
    $rows = array();
    $result = db_query($query);
    // If query failed, return `false`
    if ($result === false) {
        return false;
    }
    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>

<?php
$rows = db_select("SELECT * FROM `users`");
if($rows === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}

var_dump($rows);
?>