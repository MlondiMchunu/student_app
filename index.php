<?php
include_once 'config/config.php';

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $level = $_POST['level'];
        $student = new Undergraduate($name, $age, $level);
        if ($student->exists()) {
            $errorMessage = "Student already exists.";
        } else {
            $student->save();
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $level = $_POST['level'];
        $student = new Undergraduate($name, $age, $level);
        $student->update($id);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $student = new Undergraduate("", 0, "");
        $student->delete($id);
    }
}

$students = Undergraduate::getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Student Management</h1>

    <?php if (!empty($errorMessage)): ?>
        <p class="error"><?= $errorMessage ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php">
        <input type="hidden" name="id" id="id">
        <input type="text" name="name" id="name" placeholder="Name" required>
        <input type="number" name="age" id="age" placeholder="Age" required>
        <input type="text" name="level" id="level" placeholder="Level" required>
        <button type="submit" name="create">Create</button>
        <button type="submit" name="update">Update</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Level</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['age'] ?></td>
                <td><?= $student['level'] ?></td>
                <td>
                    <button onclick="editStudent(<?= $student['id'] ?>, '<?= $student['name'] ?>', <?= $student['age'] ?>, '<?= $student['level'] ?>')">Edit</button>
                    <form method="POST" action="index.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $student['id'] ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="js/scripts.js"></script>
</body>
</html>
