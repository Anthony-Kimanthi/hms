-- Create database (only if not exists)
CREATE DATABASE IF NOT EXISTS hmis_db;

-- Use the database
USE hmis_db;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','doctor','nurse','lab','pharmacy') NOT NULL
);

INSERT INTO users (username, password, role) VALUES
('admin', '$2y$10$OqPuvJ8BdQbH1b6LpE6ru.5R6mK7fPjvZfVi7rAAg9P6eDdPoJd3W', 'admin'), -- password: admin123
('doctor1', '$2y$10$9/hxj9Nc7p06fV57eKjTuOW8UJ6hME9QJ2B4lP7PoVwSBw.5tUldW', 'doctor'); -- password: doc123
