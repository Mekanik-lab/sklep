CREATE DATABASE IF NOT EXISTS sklep CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE sklep;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS messages (
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS motors (
    id_motor INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,      
    price DECIMAL(10,2) NOT NULL,     
    image VARCHAR(255) NOT NULL       
);

INSERT INTO motors (name, description, 	price, image) VALUES
("Husqvarna TC 85", "Husqvarna TC 85", 31000, "./assets/husqvarna-tc-85.jpg"),
("Husqvarna TC 125", "Husqvarna TC 125", 45000, "./assets/husqvarna-tc-125.png"),
("Husqvarna TC 250", "Husqvarna TC 250", 60000, "./assets/husqvarna-tc-250.png"),
("Husqvarna TC 300 Heritage", "Husqvarna TC 300 Heritage", 65000, "./assets/husqvarna-tc-300-heritage.png"),
("Husqvarna FC 250", "Husqvarna FC 250", 59900, "./assets/husqvarna-fc-250.png"),
("Husqvarna FC 450", "Husqvarna FC 450", 59900, "./assets/husqvarna-fc-450.png");