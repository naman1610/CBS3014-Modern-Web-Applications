<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Customer Feedback Management System</title>
</head>
<body>
    <div class="container">
        <h1>Customer Feedback Management System</h1>
        <form action="process_feedback.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="feedback">Feedback Message:</label>
            <textarea id="feedback" name="feedback" required></textarea>
            
            <button type="submit">Submit Feedback</button>
        </form>
        <br>
        <button onclick="location.href='search_feedback.php'" class="secondary-button">Go to Search Feedback</button>
    </div>
</body>
</html>