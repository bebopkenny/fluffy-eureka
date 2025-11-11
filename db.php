<?php

$dsn = 'mysql:host=127.0.0.1;dbname=cpsc332_hw8;charset=utf8mb4';
$db_user = 'hw8user';      
$db_pass = 'hw8pass';        

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo "Database connection error.";
    exit;
}

/**

 * @param PDO   $pdo
 * @param string $rawTitle  Title from user input
 * @param array  $errors    Array that will collect error messages
 * @return bool true on success, false if validation failed
 */
function insert_todo(PDO $pdo, string $rawTitle, array &$errors): bool
{
    // Basic sanitization and validation, as described in the assignment
    $title = trim($rawTitle);

    if ($title === '') {
        $errors[] = "Task title is required.";
    }

    if (mb_strlen($title) > 140) {
        $errors[] = "Task title must be 140 characters or fewer.";
    }

    if ($errors) {
        return false;
    }

    // prepared statement to avoid sql injection
    $stmt = $pdo->prepare('INSERT INTO todos (title) VALUES (?)');
    $stmt->execute([$title]);

    return true;
}
