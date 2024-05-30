<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initia-scale=1.0">
        <title> Student Management</title>
        <link rel="stylesheet" href="styles/style.css">
    </head> 
    <body>
        <h1>Student Management System</h1>
        <form id="student-form">
            <input type="hidden" id="sttudent-id">
            <label for="name">Name:</label>
            <input type="text" id="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" required>
            <label for="age">Age:</label>
            <input type="number" id="age" required>
            <label for="major">Major:</label>
            <input type="text" id="major" required>
            <button type="submit">Save</button>
        </form>
        <table id="students-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Major</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dynamic content will be displayed here -->
        </tbody>
        </table>
        <script src="scripts/script.js"></script>
    </body>