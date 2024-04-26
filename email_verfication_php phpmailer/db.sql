-- Create a database if it doesn't exist
CREATE DATABASE IF NOT EXISTS email_verification_db;

-- Switch to the created database
USE email_verification_db;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    verification_code VARCHAR(255) NOT NULL,
    is_verified TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add a unique index on the email column to ensure uniqueness
ALTER TABLE users ADD UNIQUE INDEX idx_unique_email (email);
