<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Records</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function validateForm() {
            const projectId = document.forms["researchForm"]["project_id"].value;
            const projectTitle = document.forms["researchForm"]["project_title"].value;
            const leadResearcher = document.forms["researchForm"]["lead_researcher"].value;
            const fundingAmount = document.forms["researchForm"]["funding_amount"].value;
            const startDate = document.forms["researchForm"]["start_date"].value;
            const endDate = document.forms["researchForm"]["end_date"].value;

            if (projectId === "" || projectTitle === "" || leadResearcher === "" || fundingAmount === "" || startDate === "") {
                alert("Please fill out all required fields.");
                return false;
            }

            if (new Date(startDate) > new Date(endDate)) {
                alert("End Date cannot be earlier than Start Date.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Research Project Management</h1>
        <form name="researchForm" method="post" action="create.php" onsubmit="return validateForm()" class="space-y-4">
            <div>
                <label for="project_id" class="block font-medium">Project ID</label>
                <input type="number" name="project_id" id="project_id" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label for="title" class="block font-medium">Project Title</label>
                <input type="text" name="title" id="title" maxlength="100" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label for="lead_researcher" class="block font-medium">Lead Researcher</label>
                <input type="text" name="lead_researcher" id="lead_researcher" maxlength="50" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label for="funding_amount" class="block font-medium">Funding Amount (₹)</label>
                <input type="number" step="0.01" name="funding_amount" id="funding_amount" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label for="status" class="block font-medium">Project Status</label>
                <select name="status" id="status" class="w-full border p-2 rounded" required>
                    <option value="">Select Status</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                    <option value="Paused">Paused</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label for="start_date" class="block font-medium">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label for="end_date" class="block font-medium">End Date</label>
                <input type="date" name="end_date" id="end_date" class="w-full border p-2 rounded">
            </div>
            <div class="flex space-x-2">
                <button type="submit" name="create" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
                <button type="submit" formaction="update.php" name="update" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
                <a href="delete.php" class="bg-red-500 text-white px-4 py-2 rounded">Delete</a>
                <a href="read.php" class="bg-gray-500 text-white px-4 py-2 rounded">View Records</a>
            </div>
        </form>
    </div>
</body>
</html>
