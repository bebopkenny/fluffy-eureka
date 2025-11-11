-- create database
CREATE DATABASE cpsc332_hw8
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE cpsc332_hw8;

-- create todos table
CREATE TABLE todos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(140) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
