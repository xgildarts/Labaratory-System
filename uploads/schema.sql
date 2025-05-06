DROP DATABASE IF EXISTS registrar_system;
DROP DATABASE IF EXISTS Admin_System;
CREATE DATABASE Admin_System;
USE Admin_System;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    special_order VARCHAR(50) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100),
    gender VARCHAR(10),
    birthdate VARCHAR(10),
    year_graduated INT,
    degree_program VARCHAR(50),
    address VARCHAR(255),
    contact VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO students (special_order, last_name, first_name, middle_name, gender, birthdate, year_graduated, degree_program, address, contact) VALUES
('SO-2024-001', 'Arpon', 'Benjamin', 'Lucrecio', 'Male', '02/15/1998', 2024, 'BSIT', 'San Nicolas', '09123456789'),
('SO-2024-002', 'Lachica', 'Andrea', 'Aguilar', 'Female', '05/23/1999', 2024, 'BSED-ENGLISH', 'Tayug', '09187654321'),
('SO-2024-003', 'Garcia', 'Princess', 'Reyes', 'Female', '09/10/1997', 2024, 'BSHM', 'Tayug', '09123459876'),
('SO-2024-004', 'Laurio', 'Sheilla', 'Titong', 'Female', '03/07/1998', 2024, 'BSIT', 'Tayug', '09198765432'),
('SO-2024-005', 'Ancheta', 'Grace', 'Tan', 'Female', '11/22/1999', 2024, 'BSBA-MM', 'San Nicolas', '09165432178'),
('SO-2024-006', 'Santos', 'John', '', 'Male', '', 2024, 'BSIT', '', '');

INSERT INTO users (username, password) VALUES
('admin', '$2y$10$3iZ8k6jY8Z2b1z3sQz2b8u2b8z3sQz2b8u2b8z3sQz2b8u2b8z3sQz'); -- Password: admin123