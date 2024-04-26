CREATE DATABASE library;

USE library;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL
);

INSERT INTO books (title, author) VALUES
    ('Book 1', 'Author 1'),
    ('Book 2', 'Author 2'),
    ('Book 3', 'Author 3');
