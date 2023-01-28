<!--This code defines some constants for connecting to the database. These include server name, database name, username and password. Then some functions are defined for interacting with the database.

The createConnection() function uses the constants defined above to create a new PDO object for connecting to the database.
The prepareAndExecute() function takes an SQL query and parameters and uses these to prepare and execute a statement. It returns a PDOStatement object.
The prepareExecuteAndFetchAll() function takes an SQL query and parameters and uses these to prepare, execute and fetch all rows. It returns an associative array.
The prepareExecuteAndFetch() function takes an SQL query and parameters and uses these to prepare, execute and fetch the first row. It returns an associative array.
The getUsers() function gets all users.
The getUser() function gets a user.
The insertUser() function inserts a user.
The getServices() function gets all services.
The getService() function gets a service.
The getServiceInstructions() function gets all service instructions.
The getServiceInstruction() function gets a service instruction.
The insertActivity() function inserts an activity.
Most of the functions in this code are various operations on the database, such as inserting, updating and querying data. Through the analysis of these functions, it can be seen that this
-->

<?php

// Constants.
const SERVER_NAME = 'rmit.australiaeast.cloudapp.azure.com';
const DB_NAME = 's3832854_wp_a2';
const USERNAME = DB_NAME;
const PASSWORD = 'abc123';

const DSN = 'mysql:host=' . SERVER_NAME . ';dbname=' . DB_NAME;

// --- Utils ----------------------------------------------------------------------------------
function createConnection() {
    return new PDO(DSN, USERNAME, PASSWORD);
}
//The createConnection() function uses the constants defined above to create a new PDO object for connecting to the database.

//The prepareAndExecute() function takes an SQL query and parameters and uses these to prepare and execute a statement. It returns a PDOStatement object.

function prepareAndExecute($query, $params = null) {
    $pdo = createConnection();
    $statement = $pdo->prepare($query);
    $statement->execute($params);

    return $statement;
}
//The prepareExecuteAndFetchAll() function takes an SQL query and parameters and uses these to prepare,
// execute and fetch all rows. It returns an associative array.


function prepareExecuteAndFetchAll($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

//The prepareExecuteAndFetch() function takes an SQL query and parameters and uses these to prepare, execute and fetch the first row. It returns an associative array.

function prepareExecuteAndFetch($query, $params = null) {
    $statement = prepareAndExecute($query, $params);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

// --- User -----------------------------------------------------------------------------------
//The getUsers() function gets all users.
function getUsers() {
    return prepareExecuteAndFetchAll('select * from user');
}

function getUser($email) {
    return prepareExecuteAndFetch('select * from user where email = :email', ['email' => $email]);
}

function insertUser($user) {
    return prepareAndExecute(
        'insert into user
        (email, password, first_name, last_name, phone, age, is_student, is_employed) values
        (:email, :password, :firstname, :lastname, :phone, :age, :student_status, :employment_status)', $user);
}

// --- Services -------------------------------------------------------------------------------
function getServices() {
    return prepareExecuteAndFetchAll('select * from service');
}

function getService($id) {
    return prepareExecuteAndFetch('select * from service where service_id = :id', ['id' => $id]);
}
function getuserservice($id){//using the id to display all the sevice id information
    return prepareExecuteAndFetch('select * from user_service where user_service_id = :id', ['id' => $id]);
}
function getServiceInstructions($id) {
    return prepareExecuteAndFetchAll('select * from service_instruction where service_id = :id', ['id' => $id]);
}
function getServiceInstructions2($id) {
    return prepareExecuteAndFetchAll('select * from meal');
}
function getServiceInstruction($id, $type) {
    return prepareExecuteAndFetch(
        'select * from service_instruction where service_id = :id and service_type = :type',
        ['id' => $id, 'type' => $type]);
}



function insertActivity($activity) {
    return prepareAndExecute(
        'insert into user_service
        (email, service_id, service_type, date_performed, duration_minutes) values
        (:email, :service_id, :service_type, now(), :duration_minutes)', $activity);
}
//insertmeal
function insertuser_Meal($user_meal)
{
    return prepareAndExecute(
        'insert into user_meal
        (email, meal_id,servings) values
        (:email, :meal_id, :servings)', $user_meal);

}
/*getServices() function gets all services.
The getService() function gets a service.
The getServiceInstructions() function gets all service instructions.
The getServiceInstruction() function gets a service instruction.
The insertActivity() function inserts an activity.
Most of the functions in this code are various operations on the database, such as inserting, updating and querying data. Through the analysis of these functions, it can be seen that this */