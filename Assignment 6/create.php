<script src="https://cdn.tailwindcss.com"></script>
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

// Create
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $project_id = $_POST['project_id'];
    $title = $_POST['title'];
    $lead_researcher = $_POST['lead_researcher'];
    $funding_amount = $_POST['funding_amount'];
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO projects (project_id, title, lead_researcher, funding_amount, status, start_date, end_date)
            VALUES ('$project_id', '$title', '$lead_researcher', '$funding_amount', '$status', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo '<div class="mt-4">';
    echo '<a href="index.php">Back to Homepage</a>';
    echo '</div>';
}
$conn->close();
?>