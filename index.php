<?php
require __DIR__ . '/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';

    if (insert_todo($pdo, $title, $errors)) {
        header('Location: index.php');
        exit;
    }
}

$stmt = $pdo->query('SELECT id, title, created_at FROM todos ORDER BY created_at DESC');
$todos = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Homework 8 To Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            background-color: #f9f9f9;
        }
        h1 {
            color: #003366;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        button {
            margin-top: 8px;
            padding: 8px 16px;
            font-size: 1rem;
        }
        .errors {
            background: #ffe6e6;
            border: 1px solid #cc0000;
            padding: 8px 12px;
            margin-bottom: 16px;
        }
        .errors li {
            margin-left: 20px;
        }
        ul.todos {
            list-style: none;
            padding: 0;
        }
        ul.todos li {
            background: #ffffff;
            border: 1px solid #ddd;
            margin-bottom: 6px;
            padding: 8px 10px;
        }
        .created-at {
            font-size: 0.8rem;
            color: #666;
        }
    </style>
</head>
<body>

<h1>To Do List</h1>

<?php if ($errors): ?>
    <div class="errors">
        <strong>Please fix the following:</strong>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="index.php" novalidate>
    <label for="title">New task (max 140 characters):</label><br>
    <input
        type="text"
        id="title"
        name="title"
        maxlength="140"
        value="<?= htmlspecialchars($_POST['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        required
    >
    <button type="submit">Add Task</button>
</form>

<h2>Current Tasks</h2>

<?php if (count($todos) === 0): ?>
    <p>No tasks yet. Add your first one above.</p>
<?php else: ?>
    <ul class="todos">
        <?php foreach ($todos as $todo): ?>
            <li>
                <div>
                    <?= htmlspecialchars($todo['title'], ENT_QUOTES, 'UTF-8') ?>
                </div>
                <div class="created-at">
                    Created at:
                    <?= htmlspecialchars($todo['created_at'], ENT_QUOTES, 'UTF-8') ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
