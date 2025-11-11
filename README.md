# CPSC 332 Homework 8

To do list made with php and mariadb

What it does:
- Validate: task is required and ≤ 140 chars
- Insert: Use a prepared INSERT statement into the todos table
- Redirect: After success, perform a Post/Redirect/Get back to index.php

On list: 
- Query the database with SELECT to display all tasks
- Escape output using htmlspecialchars()
- Show newest items first

## Database

- DBMS: MariaDB / MySQL
- Database name: `cpsc332_hw8`
- Main table: `todos`

```sql
CREATE TABLE todos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(140) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Notes
- Host: 127.0.0.1
- Database: cpsc332_hw8
- User: hw8user
- Password: hw8pass