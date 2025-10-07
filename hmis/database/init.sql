-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'doctor', 'nurse', 'lab', 'pharmacy', 'reception') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

TRUNCATE TABLE users;

INSERT INTO users (username, password, role) VALUES
('admin', '$2y$10$NvyER9WZKw.HxkE29M3rKe.0E5k3LNRKn5H1DxfvTkk1ClYBPXbL6', 'admin'),
('doctor1', '$2y$10$h0T4n1anrQ3uZBZcK6XG8.Wf8/7F8YfX1D6Hr29nsrjZ2b6ED5rDi', 'doctor');

