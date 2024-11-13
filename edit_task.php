<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare("SELECT task FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $taskToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['new_task']) && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $newTask = trim($_POST['new_task']);
    if (!empty($newTask)) {
        $stmt = $pdo->prepare("UPDATE tasks SET task = :task WHERE id = :id");
        $stmt->execute(['task' => $newTask, 'id' => $id]);
    }
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Tugas</h1>
        <form action="edit_task.php" method="post" class="task-form">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="new_task" value="<?php echo htmlspecialchars($taskToEdit['task']); ?>" required>
            <button type="submit">Simpan Perubahan</button>
        </form>
        <a href="index.php" class="back-link">Kembali ke daftar</a>
    </div>
</body>
</html>
