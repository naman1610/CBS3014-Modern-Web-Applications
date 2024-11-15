<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "research_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $project_id = $_POST['project_id'];
    $title = $_POST['title'];
    $lead_researcher = $_POST['lead_researcher'];
    $funding_amount = $_POST['funding_amount'];
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "UPDATE projects SET title='$title', lead_researcher='$lead_researcher', funding_amount='$funding_amount', status='$status', start_date='$start_date', end_date='$end_date' WHERE project_id='$project_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>