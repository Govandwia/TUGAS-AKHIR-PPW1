CREATE DATABASE laptop_store;

USE laptop_store;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `image_url` VARCHAR(255) NOT NULL AFTER `created_at`;
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO products (name, description, price, stock, image_url)
VALUES ('Lenovo ThinkPad X1 Carbon', 'A lightweight and durable 14-inch laptop with a long battery life.', 1499.99, 10, 'https://www.lenovo.com/us/en/d/thinkpad-x1-carbon/');

INSERT INTO products (name, description, price, stock, image_url)
VALUES ('ASUS ZenBook 13 OLED', 'A sleek and stylish 13.3-inch laptop with a stunning OLED display.', 1199.99, 15, 'https://www.asus.com/laptops/for-home/zenbook/zenbook-13-oled-ux325-11th-gen-intel/');

INSERT INTO products (name, description, price, stock, image_url)
VALUES ('Apple MacBook Air M1', 'A powerful and portable 13.3-inch laptop with Apple''s M1 chip.', 999.99, 8, 'https://www.apple.com/am/macbook-air-m1/');

INSERT INTO products (name, description, price, stock, image_url)
VALUES ('Dell XPS 13', 'A premium 13.4-inch laptop with a beautiful InfinityEdge display.', 1299.99, 12, 'https://www.dell.com/en-us/shop/dell-laptops/xps-13-laptop/spd/xps-13-9315-laptop');

INSERT INTO products (name, description, price, stock, image_url)
VALUES ('HP Spectre x360', 'A versatile 13.5-inch convertible laptop that can be used as a laptop, tablet, or tent.', 1399.99, 7, 'https://www.hp.com/us-en/shop/pdp/hp-spectre-x360-2-in-1-laptop-14t-eu000-14-7k635av-1');

INSERT INTO products (name, description, price, stock, image_url)
VALUES ('Microsoft Surface Laptop Studio', 'A powerful and versatile 14.4-inch laptop with a detachable keyboard.', 1699.99, 5, 'https://www.microsoft.com/en-us/d/surface-laptop-studio-2/8rqr54krf1dz');
