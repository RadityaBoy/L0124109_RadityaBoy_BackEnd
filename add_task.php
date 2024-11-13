<?php
include 'db_connect.php';

if (isset($_POST['task'])) {
    $task = trim($_POST['task']);
    if (!empty($task)) {
        $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (:task)");
        $stmt->execute(['task' => $task]);
    }
}
header('Location: index.php');
exit();
?>
