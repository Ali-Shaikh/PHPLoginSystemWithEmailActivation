<?php
/*******************************Helper Functions***************************/
?>

<?php
function clean($string)
{

    return htmlentities($string);
}

?>

<?php
function redirect($location)
{
    return header("Location: {$location}");
}

?>

<?php

function set_message($message)
{
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    } else {

        $message = "";

    }
}

?>

<?php

function display_message()
{
    if (isset($_SESSION['message'])) {

        echo $_SESSION['message'];

        unset($_SESSION['message']);
    }
}

?>

<?php
function token_generator()
{

    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;
}

?>

<?php

function validation_errors($error_message)
{
    $errors = "<div class='alert alert-danger alert-dismissible' role='alert'>";
    $errors .= "<button type='button' class='close' data-dismiss='alert'>";
    $errors .= "<span aria-hidden='true'>&times;</span>";
    $errors .= "<span class='sr-only'></span>";
    $errors .= "</button>";
    //$errors .= "<span class='glyphicon glyphicon-remove-circle'></span>";
    $errors .= " <strong> Warning! </strong>";
    $errors .= "$error_message";
    $errors .= "</div>";
    return $errors;
}
?>
<?php
/*******************************Validation Functions***************************/
?>

<?php

function validate_user_registration()
{

    $errors = [];

    $min = 3;
    $max = 20;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //echo "IT Works.";

        $first_name = clean($_POST['first_name']);
        $last_name = clean($_POST['last_name']);
        $email = clean($_POST['email']);
        $username = clean($_POST['username']);
        $password = clean($_POST['password']);
        $confirm_password = clean($_POST['confirm_password']);

        if (strlen($first_name) < $min) {

            $errors[] = "Your First Name cannot be less than {$min} characters";
        }

        if (strlen($first_name) > $max) {

            $errors[] = "Your First Name cannot be greater than {$max} characters";
        }

        if (strlen($last_name) < $min) {

            $errors[] = "Your Last Name cannot be less than {$min} characters";
        }

        if (strlen($last_name) > $max) {

            $errors[] = "Your Last Name cannot be greater than {$max} characters";
        }

        if (strlen($email) < $min) {

            $errors[] = "Your Email address cannot be less than {$min} characters";
        }

        if (strlen($email) > $max) {

            $errors[] = "Your Email address cannot be greater than {$max} characters";
        }

        if (strlen($username) < $min) {

            $errors[] = "Your Username cannot be less than {$min} characters";
        }

        if (strlen($username) > $max) {

            $errors[] = "Your Username cannot be greater than {$max} characters";
        }

        if($password !== $confirm_password) {

            $errors[] = "Your password fields do not match";

        }

        if (!empty($errors)) {
            foreach ($errors as $error) {

                echo validation_errors($error);
            }
        }
    }
}

?>
