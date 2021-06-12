<?php

$q = isset($_GET['q']) ? $_GET['q'] : '';

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

$sql = "SELECT *
            FROM students 
        WHERE 
            last_name LIKE '%". $q ."%'
        OR
            first_name LIKE '%". $q ."%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    //Array
    $arr = [];
    while($row = $result->fetch_assoc()) {
    //    echo $row["first_name"]. " " . $row["last_name"] . '<br />';
        $arr[] = [
            'id'            => $row['id'],
            'first_name'    => $row['first_name'], 
            'last_name'     => $row['last_name'],
            'created_at'    => $row['created_at'],
            'updated_at'    => $row['updated_at']
        ];
    }
    // print_r($arr);
    echo json_encode($arr);
    return;
} else {
//   echo "0 results";
    echo json_encode([]);
    return;
}
$conn->close();