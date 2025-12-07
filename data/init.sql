DROP DATABASE IF EXISTS car_dealership;

CREATE DATABASE car_dealership;
USE car_dealership;

CREATE TABLE cars (
    
id INT AUTO_INCREMENT PRIMARY KEY, 
make VARCHAR(50), 
model VARCHAR(50), 
engine_power DOUBLE,
color VARCHAR(50), 
price DOUBLE, 
image VARCHAR(255));


INSERT INTO cars (make, model, engine_power, color, price, image) VALUES

('BMW', '320d', 190, 'Alpine White', 26900, '/CarDealership/public/images/BMW_320d.jpg'),
('Audi', 'A4 2.0 TFSI', 204, 'Metallic Grey', 28500, '/CarDealership/public/images/Audi_A4.jpg'),
('Mercedes-Benz', 'C200', 184, 'Black', 31200, '/CarDealership/public/images/Mercedes_C200.jpg'),
('Toyota', 'Corolla Hybrid', 122, 'Blue', 20300, '/CarDealership/public/images/Toyota_Corolla.jpg'),
('Honda', 'Civic 1.5 Turbo', 182, 'Red', 22800, '/CarDealership/public/images/Honda_Civic.jpg'),
('Volkswagen', 'Golf 1.6 TDI', 115, 'Silver', 18900, '/CarDealership/public/images/Volkswagen_Golf.jpg');

CREATE TABLE users (

id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) UNIQUE NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL,
password VARCHAR(255) NOT NULL,
phone VARCHAR(20),
address_line VARCHAR(255),
county VARCHAR(30),
country VARCHAR(30),
postcode VARCHAR(20)
);

CREATE TABLE user_favorites (

id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
car_id INT NOT NULL,

CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
CONSTRAINT fk_car FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE,

UNIQUE KEY unique_favorite (user_id, car_id)
);
