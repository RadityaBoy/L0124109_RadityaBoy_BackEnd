<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="task" placeholder="Tambah tugas baru" required>
        <button type="submit">Tambah</button>
    </form>
    <h2>Daftar Tugas:</h2>
    <ul>
        <?php
        $stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . htmlspecialchars($row['task']) . 
                 " <a href='edit_task.php?id=" . $row['id'] . "'>Edit</a> | 
                   <a href='delete_task.php?id=" . $row['id'] . "'>Hapus</a></li>";
        }
        ?>
    </ul>
</body>
</html>
