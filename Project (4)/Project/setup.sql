CREATE DATABASE IF NOT EXISTS project_db;
USE project_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    role VARCHAR(10) DEFAULT 'user'
);

-- Default admin user (username: adminuser1, password: adminpass1)
INSERT INTO users (username, password, email, gender, role) 
VALUES ('adminuser1', 'adminpass1', 'admin@example.com', 'Male', 'admin');
