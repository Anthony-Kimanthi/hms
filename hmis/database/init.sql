-- Create database (only if not exists)
CREATE DATABASE IF NOT EXISTS hmis_db;

-- Use the database
USE hmis_db;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','doctor','nurse','lab','pharmacy') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a default admin user (password = "admin123")
INSERT INTO users (username, password, role) 
VALUES (
    'admin', 
    -- MySQL native hash for "admin123"
    '$2y$10$8i1QJoM8E5P0UZY4dzsdGeuZtJixUMthq22uXQy.9qE3SG4gLgF/S',
    'admin'
);
