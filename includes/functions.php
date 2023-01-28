<?php

require_once('database-functions.php');

// Constants.
const USER_SESSION_KEY = 'user';

// Always call session_start.
session_start();

// --- Utils ----------------------------------------------------------------------------------
function displayError($errors, $name) {
    if(isset($errors[$name]))
        echo "<div class='text-danger'>{$errors[$name]}</div>";
}

function displayValue($form, $name) {
    if(isset($form[$name]))
        echo 'value="' . htmlspecialchars($form[$name]) . '"';
}

function displayChecked($form, $name, $value) {
    if(isset($form[$name]) && $form[$name] === $value)
        echo 'checked';
}

function redirect($location) {
    header("Location: $location");
    exit();
}

// Trims array values except for keys within the exclude array parameter.
function trimArray(&$array, $exclude = []) {
    foreach($array as $key => &$value) {
        if(is_string($value) && !in_array($key, $exclude))
            $value = trim($value);
    }
}

// --- User -----------------------------------------------------------------------------------
function isUserLoggedIn() {
    return isset($_SESSION[USER_SESSION_KEY]);
}

function getLoggedInUser() {
    return isUserLoggedIn() ? $_SESSION[USER_SESSION_KEY] : null;
}

function loginUser($form) {
    $errors = [];

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';

    $key = 'password';
    if(!isset($form[$key]) || strlen($form[$key]) < 6)
        $errors[$key] = 'Password is required and must contain at least 6 characters.';

    if(count($errors) === 0) {
        $user = getUser($form['email']);

        if($user !== false && $form['password'] === $user['password'])
            // Set session variable to login user.
            $_SESSION[USER_SESSION_KEY] = $user;
        else
            $errors[$key] = 'Login failed, email and / or password incorrect. Please try again.';
    }

    return $errors;
}

function logoutUser() {
    // Unset all session variables.
    session_unset();
}

function registerUser(&$form) {
    // Trim array values.
    trimArray($form, ['password', 'confirmPassword']);

    $errors = [];

    $key = 'firstname';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'First name is required.';

    $key = 'lastname';
    if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
        $errors[$key] = 'Last name is required.';

    $key = 'email';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
        $errors[$key] = 'Email is invalid.';
    else if(getUser($form[$key]) !== false)
        $errors[$key] = 'Email is already registered.';

    $key = 'phone';
    if(!isset($form[$key]) || preg_match('/^\+61 4\d{2} \d{3} \d{3}$/', $form[$key]) !== 1)
        $errors[$key] = 'Phone number is invalid. Must be in the format: +61 4xx xxx xxx';

    $key = 'age';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 16, 'max_range' => 120]]) === false)
        $errors[$key] = 'Minimum age is 16.';

    $key = 'student-status';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select student status.';

    $key = 'employment-status';
    if(!isset($form[$key]) || preg_match('/^true|false$/', $form[$key]) !== 1)
        $errors[$key] = 'Must select employment status.';
    
    $key = 'password';
    $passw=$form[$key];
    $first=$passw[0];
    $end=$passw[strlen($form[$key])-1];
    if($first>64&&$first<91)
    {
        echo 'the first charachters is a capital alphabet';
        echo "<p>$first</p>";
    }
    if($end>47&&$end<58)
    {
        echo 'the last charachters is a number';
        echo "<p>$end</p>";
    }
    if(preg_match('/-/', $form[$key])||preg_match('/_/', $form[$key]))
    {
        echo 'there is a _or-';
    }

    if(!isset($form[$key]) || strlen($form[$key]) <8 )
        $errors[$key] = 'must be at least 8 characters start with a capital alphabet, must have at least 8 characters must have a hyphen or underscore (i.e. – or _) and must end with a number.';
    
    $key = 'confirmPassword';
    if(isset($form['password']) && (!isset($form[$key]) || $form['password'] !== $form[$key]))
        $errors[$key] = 'Passwords do not match.';

    if(count($errors) === 0) {
        // Prepare user data.
        // NOTE: All fields are already trimmed due to the trimArray function call above.
        $user = [
            'firstname' => htmlspecialchars($form['firstname']),
            'lastname' => htmlspecialchars($form['lastname']),
            'email' => $form['email'],
            'phone' => htmlspecialchars($form['phone']),
            'age' => filter_var($form['age'], FILTER_VALIDATE_INT),
            'student_status' => (int) filter_var($form['student-status'], FILTER_VALIDATE_BOOLEAN),
            'employment_status' => (int) filter_var($form['employment-status'], FILTER_VALIDATE_BOOLEAN),
            'password' => $form['password']
        ];

        // Insert user into database.
        insertUser($user);

        // Auto-login the registered user.
        loginUser([
            'email' => $user['email'],
            'password' => $form['password']
        ]);
    }

    return $errors;
}

// --- Services -------------------------------------------------------------------------------
function recordActivity($email, $serviceID, $form) {
    $errors = [];

    $key = 'duration';
    if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1, 'max_range' => 480]]) === false)
        $errors[$key] = 'Duration must be a whole number and not be less than 1 or greater than 480.';
    
    if(count($errors) === 0) {
        // Prepare activity data.
        $activity = [
            'email' => $email,
            'service_id' => $serviceID,
            'service_type' => $form['type'],
            'duration_minutes' => filter_var($form['duration'], FILTER_VALIDATE_INT)
        ];

        // Insert activity into database.
        insertActivity($activity);
    }

    return $errors;
}