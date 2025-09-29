-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'doctor', 'nurse', 'lab', 'pharmacy', 'reception') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert an admin user
INSERT INTO users (username, password, role) VALUES 
('admin', '$2y$10$9hE3FJ7xUUtAF5ohElPqF.V6oZ3tAi8BnYXxE24Y2vq/vG4lPpWhO', 'admin');

-- Insert a doctor user
INSERT INTO users (username, password, role) VALUES 
('doctor1', '$2y$10$GdCgzFlAEtDWjwChy05Yqu7D9vlnjQTeQniVKwLqXfJx3ByTx1yG2', 'doctor');

