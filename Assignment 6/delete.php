<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Project Record</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Delete Project Record</h2>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "root", "", "research_management");
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);
            
            $sql = "DELETE FROM projects WHERE project_id = '$project_id'";
            
            if (mysqli_query($conn, $sql)) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            Project successfully deleted!
                          </div>';
                } else {
                    echo '<div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
                            No project found with this ID.
                          </div>';
                }
            } else {
                echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        Error deleting project: ' . mysqli_error($conn) . '
                      </div>';
            }
            
            mysqli_close($conn);
        }
        ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">
                    Project ID:
                </label>
                <input type="text" name="project_id" id="project_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" 
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Delete Project
                </button>
                <a href="index.php" 
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Back
                </a>
            </div>
        </form>
    </div>
</body>
</html>