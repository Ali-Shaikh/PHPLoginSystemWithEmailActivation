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

function confirm($result){
    global $con;

    if (!$result)

        die("Query Failed" .  mysqli_error($con));

}

?>

<?php
function row_count($result){

    return mysqli_num_rows($result);
}
?>

<?php
?>
<?php
?>

