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

$sql = "SELECT project_id, title, lead_researcher, funding_amount, status, start_date, end_date FROM projects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="min-w-full divide-y divide-gray-200">';
    echo '<thead class="bg-gray-50"><tr>';
    $headers = ['Project ID', 'Title', 'Lead Researcher', 'Funding Amount', 'Status', 'Start Date', 'End Date'];
    foreach ($headers as $header) {
        echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">' . $header . '</th>';
    }
    echo '</tr></thead>';
    echo '<tbody class="bg-white divide-y divide-gray-200">';
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        foreach ($row as $value) {
            echo '<td class="px-6 py-4 whitespace-nowrap">' . $value . '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo "0 results";
}
echo '<div class="mt-4">';
echo '<a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Homepage</a>';
echo '</div>';

$conn->close();
?>