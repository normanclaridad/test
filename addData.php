<?php
ini_set('date.timezone', 'Asia/Manila');

if(!$_POST)
{
    echo json_encode(["code" => 3, "message" => "Invalid request"]);
    return;
}

$fName = $_POST['first_name'];
$lName = $_POST['last_name'];

$validationMessage = "";
if(empty($fName))
{
    $validationMessage = "First Name is required.";
}

if(empty($lName))
{
    $validationMessage .= "<br />Last Name is required.";
}

if(!empty($validationMessage))
{    
    echo json_encode(["code" => 4, "message" => $validationMessage]);
    return;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_records";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createdAt =  date("Y-m-d H:i:s");

$sql = "INSERT INTO students 
        (first_name, last_name, created_at)
            VALUES
        ('".$fName."','". $lName."', '". $createdAt ."');";

$result = $conn->query($sql);

$message = ['code' => 1, 'message' => 'Error adding this record.'];
if($result)
{
    $message = ['code' => 0, 'message' => 'Successfully added'];
}

echo json_encode($message);
return;