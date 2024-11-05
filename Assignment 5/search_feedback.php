<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search Feedback</title>
</head>
<body>
    <div class="container">
        <h1>Search Feedback</h1>
        <form method="POST">
            <label for="query">Search by Name or Keyword:</label>
            <input type="text" id="query" name="query" required>
            <button type="submit">Search</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $query = htmlspecialchars($_POST['query']);
            $feedback = file_get_contents('feedback.txt');
            $entries = explode("\n\n", trim($feedback));
            $matchingEntries = [];

            foreach ($entries as $entry) {
                if (stripos($entry, $query) !== false) {
                    $matchingEntries[] = $entry;
                }
            }

            if ($matchingEntries) {
                echo "<h2>Matching Feedback:</h2>";
                echo "<table><tr><th>Feedback Date</th><th>Customer Name</th><th>Email</th><th>Feedback Message</th></tr>";
                foreach ($matchingEntries as $entry) {
                    $lines = explode("\n", $entry);
                    $date = str_replace("Date: ", "", $lines[0]);
                    $name = str_replace("Name: ", "", $lines[1]);
                    $email = str_replace("Email: ", "", $lines[2]);
                    $message = str_replace("Message: ", "", $lines[3]);
                    echo "<tr><td>$date</td><td>$name</td><td>$email</td><td>$message</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No matching feedback found.</p>";
            }
        }

        // Word occurrence count section
        $wordCounts = [];

        if (file_exists('feedback.txt')) {
            $feedback = file_get_contents('feedback.txt');
            $entries = explode("\n\n", trim($feedback));

            foreach ($entries as $entry) {
                $lines = explode("\n", $entry);
                // Get message line
                $message = str_replace("Message: ", "", $lines[3]);
                // Convert message to lowercase
                $message = strtolower($message);
                // Split message into words
                $words = preg_split('/\W+/', $message, -1, PREG_SPLIT_NO_EMPTY);

                foreach ($words as $word) {
                    if (in_array($word, ["great", "good", "poor"])) {
                        if (!isset($wordCounts[$word])) {
                            $wordCounts[$word] = 0;
                        }
                        $wordCounts[$word]++;
                    }
                }
            }

            if (!empty($wordCounts)) {
                echo "<h2>Word Occurrences:</h2>";
                echo "<table><tr><th>Word</th></tr>";
                echo "<th>Occurrences</th></tr>";
                foreach ($wordCounts as $word => $count) {
                    echo "<tr><td>" . htmlspecialchars($word) . "</td><td>" . htmlspecialchars($count) . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No word occurrences found.</p>";
            }
        }
        ?>
    </div>
</body>
</html>