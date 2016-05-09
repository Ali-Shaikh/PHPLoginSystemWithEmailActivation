<?php

$con = mysqli_connect('localhost', 'login1', 'login1', 'login_db_1');

//if ($con){
//    echo "It's Connected";
//}
?>

<?php
function escape($string)
{
    global $con;
    return mysqli_real_escape_string($con, $string);
}

?>

<?php
function query($query)
{
    global $con;

    return mysqli_query($con, $query);
}

?>

<?php
function fetch_array($result)
{
    global $con;

    return mysqli_fetch_array($result);
}

?>

<?php

?>

<?php

?>

