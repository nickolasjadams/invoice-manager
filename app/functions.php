<?php

use App\Helpers\Session;

function d($data = null) {
    if ($data != null) {
        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    }
}

function dd($data = null) {
    die(d($data));
}


/**
 * Escape html. Alias for htmlspecialchars.
 *
 * @param  string $str
 * @return string
 */
function e($str) {
    return htmlspecialchars($str);
}

/**
 * Escapes and trims a value.
 *
 * @param  string $str
 * @return string
 */
function sanitize($str) {
    return trim(htmlspecialchars($str));
}

/**
 * A templating function that returns an emoji for a boolean value.
 * 
 * @param bool $value
 */
function boolean_emoji($value) {
    return ($value) ? '&#9989;' : '&#10060;';
}


/**
 * A templating function to echo our form errors.
 *
 * @param  mixed $key The name of the input element
 */
function validate_form($key) {
    $errors = Session::getErrors();
    if ($errors !== NULL) {
        if (array_key_exists($key, $errors)) {
            echo $errors[$key];
        }
    }
}

/**
 * A templating function to echo out the css classname when input elements are invalid
 *
 * @param  mixed $key The name of the input element
 */
function invalid_form_element($key) {
    $errors = Session::getErrors();
    if (array_key_exists($key, $errors)) {
        echo 'invalid';
    }
}

/**
 * A templating function to echo a value if it exists, or update
 * with session form data if post fails with errors.
 *
 * @param  mixed $value
 */
function persisted_or_stored($posted_key, $stored_key) {

    $form_data = Session::getFormData();
    if (isset($form_data[$posted_key])) {
        echo $form_data[$posted_key];
    } else {
        echo $stored_key;
    }
    
    
}

/**
 * A templating function to update with previous session form data
 * if post fails with errors.
 *
 * @param  mixed $value
 */
function persisted($posted_key) {

    $form_data = Session::getFormData();
    if (isset($form_data[$posted_key])) {
        echo $form_data[$posted_key];
    }
    
}


/**
 * A templating function to echo out a bootstrap 4 alert
 *
 * @param  string $type success, info, warning, danger
 * @param  string $message
 */
function bs4_alert($type, $message) {
    echo "<div class=\"alert alert-{$type} alert-dismissible\">" .
         '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
         "{$message}</div>";
}



/**
 * Posts mock data from an associative array for testing.
 *
 * @param  mixed $arr
 */
function mock_post($arr) {
    foreach($arr as $key => $value) {
        $_POST[$key] = $value;
    }
}

/**
 * Templating function to eacho out a status tag for the invoices list.
 */
function status_tag($status_text) {

    switch ($status_text) {
        case 'Paid':
            echo "<span class='status-btn bg-success'>{$status_text}</span>";
            break;
        case 'Due':
            echo "<span class='status-btn bg-warning'>{$status_text}</span>";
            break;
        case 'Overdue':
            echo "<span class='status-btn bg-danger'>{$status_text}</span>";
            break;
        case 'Draft':
            echo "<span class='status-btn bg-primary'>{$status_text}</span>";
            break;
        case 'Unpaid':
            echo "<span class='status-btn bg-primary'>{$status_text}</span>";
            break;
        case 'Cancelled':
            echo "<span class='status-btn bg-primary'>{$status_text}</span>";
            break;
    }
}