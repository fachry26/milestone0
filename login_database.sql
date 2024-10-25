-- Create database
CREATE DATABASE IF NOT EXISTS app_fachry;

-- Use the database
USE app_fachry;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
