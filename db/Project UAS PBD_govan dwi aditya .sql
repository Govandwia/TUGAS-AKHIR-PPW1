-- Creating the users table
CREATE TABLE users (
    id NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY PRIMARY KEY,
    username VARCHAR2(50) NOT NULL,
    password VARCHAR2(255) NOT NULL,
    email VARCHAR2(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating the products table
CREATE TABLE products (
    id NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY PRIMARY KEY,
    name VARCHAR2(100) NOT NULL,
    description CLOB,
    price NUMBER(10, 2) NOT NULL,
    stock NUMBER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    image_url VARCHAR2(255) NOT NULL
);

-- Creating the orders table
CREATE TABLE orders (
    id NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY PRIMARY KEY,
    user_id NUMBER,
    total NUMBER(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Creating the order_items table
CREATE TABLE order_items (
    id NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY PRIMARY KEY,
    order_id NUMBER,
    product_id NUMBER,
    quantity NUMBER NOT NULL,
    price NUMBER(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Creating the reviews table
CREATE TABLE reviews (
    id NUMBER GENERATED BY DEFAULT ON NULL AS IDENTITY PRIMARY KEY,
    product_id NUMBER,
    user_id NUMBER,
    rating NUMBER CHECK (rating >= 1 AND rating <= 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comments VARCHAR2(255),
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- users
INSERT INTO users (username, password, email, created_at)
VALUES ('john_doe', 'password123', 'john.doe@example.com', CURRENT_TIMESTAMP);

INSERT INTO users (username, password, email, created_at)
VALUES ('jane_smith', 'qwerty', 'jane.smith@example.com', CURRENT_TIMESTAMP);

INSERT INTO users (username, password, email, created_at)
VALUES ('mike_jackson', 'mike123', 'mike.jackson@example.com', CURRENT_TIMESTAMP);

-- products
INSERT INTO products (name, description, price, stock, created_at, image_url)
VALUES ('Laptop X1', 'Powerful laptop with high performance.', 1299.99, 15, CURRENT_TIMESTAMP, 'laptop_x1.jpg');

INSERT INTO products (name, description, price, stock, created_at, image_url)
VALUES ('Laptop Y2', 'Lightweight and portable laptop for everyday use.', 899.99, 20, CURRENT_TIMESTAMP, 'laptop_y2.jpg');

INSERT INTO products (name, description, price, stock, created_at, image_url)
VALUES ('Laptop Z3', 'Gaming laptop with dedicated graphics card.', 1799.99, 10, CURRENT_TIMESTAMP, 'laptop_z3.jpg');

INSERT INTO products (name, description, price, stock, created_at, image_url)
VALUES ('Laptop A4', 'Sleek design with ultra-fast performance.', 1499.99, 18, CURRENT_TIMESTAMP, 'laptop_a4.jpg');

INSERT INTO products (name, description, price, stock, created_at, image_url)
VALUES ('Laptop B5', 'Convertible laptop with touchscreen display.', 1099.99, 25, CURRENT_TIMESTAMP, 'laptop_b5.jpg');

INSERT INTO products (name, description, price, stock, created_at, image_url)
VALUES ('Laptop C6', 'Budget-friendly laptop for students.', 699.99, 30, CURRENT_TIMESTAMP, 'laptop_c6.jpg');

INSERT INTO products (name, description, price, stock, created_at, image_url)
VALUES ('Laptop D7', 'Professional-grade laptop with long battery life.', 1999.99, 12, CURRENT_TIMESTAMP, 'laptop_d7.jpg');

-- orders
INSERT INTO orders (user_id, total, created_at)
VALUES (1, 1299.99, CURRENT_TIMESTAMP);

INSERT INTO orders (user_id, total, created_at)
VALUES (2, 1799.99, CURRENT_TIMESTAMP);

INSERT INTO orders (user_id, total, created_at)
VALUES (3, 899.99, CURRENT_TIMESTAMP);

-- order_items
INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES (1, 1, 1, 1299.99);

INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES (2, 3, 1, 1799.99);

INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES (3, 2, 2, 1799.98);

INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES (3, 1, 1, 899.99);

-- reviews
INSERT INTO reviews (product_id, user_id, rating, comments, created_at)
VALUES (1, 1, 5, 'Great laptop, exceeded my expectations.', CURRENT_TIMESTAMP);

INSERT INTO reviews (product_id, user_id, rating, comments, created_at)
VALUES (3, 2, 4, 'Excellent gaming performance, but a bit heavy.', CURRENT_TIMESTAMP);

INSERT INTO reviews (product_id, user_id, rating, comments, created_at)
VALUES (2, 3, 4, 'Perfect for everyday use, lightweight and fast.', CURRENT_TIMESTAMP);


-- 1.
SELECT p.id AS product_id, p.name AS product_name, p.description AS product_description, p.price AS product_price, p.stock AS product_stock,
       r.rating AS review_rating, r.comments AS review_comment, r.created_at AS review_created_at
FROM products p
LEFT JOIN reviews r ON p.id = r.product_id;

-- 2.
SELECT o.id AS order_id, u.username AS user_username, p.name AS product_name, oi.quantity AS quantity_ordered, oi.price AS item_price
FROM orders o
JOIN users u ON o.user_id = u.id
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON oi.product_id = p.id;

-- 3.
SELECT p.id AS product_id, p.name AS product_name, AVG(r.rating) AS avg_rating
FROM products p
LEFT JOIN reviews r ON p.id = r.product_id
GROUP BY p.id, p.name;

-- 4.
CREATE VIEW available_products AS
SELECT id, name, description, price, stock
FROM products
WHERE stock > 0;

SELECT * FROM available_products;



-- 5.
CREATE VIEW order_details AS
SELECT o.id AS order_id, u.username AS user_username, o.total, o.created_at
FROM orders o
JOIN users u ON o.user_id = u.id;

SELECT * FROM order_details;


-- 6.
SET SERVEROUTPUT ON;

CREATE OR REPLACE FUNCTION calculate_order_total(order_id IN NUMBER) RETURN NUMBER IS
    total_amount NUMBER;
BEGIN
    SELECT SUM(quantity * price) INTO total_amount
    FROM order_items
    WHERE order_id = order_id;

    RETURN total_amount;
END;
/

DECLARE
    total_amount NUMBER;
BEGIN
    total_amount := calculate_order_total(1); 
    DBMS_OUTPUT.PUT_LINE('Total order: ' || total_amount);
END;
/


-- 7.
CREATE OR REPLACE PROCEDURE update_product_stock(order_id IN NUMBER) IS
    v_total_quantity NUMBER;
BEGIN
    SELECT SUM(quantity) INTO v_total_quantity
    FROM order_items
    WHERE order_id = order_id;

    UPDATE products p
    SET p.stock = p.stock - v_total_quantity
    WHERE p.id IN (SELECT product_id FROM order_items WHERE order_id = order_id);
END;
/

/

BEGIN
    update_product_stock(1);
    COMMIT; 
    DBMS_OUTPUT.PUT_LINE('Stok produk berhasil diperbarui.');
END;
/



-- 8.
CREATE OR REPLACE TRIGGER update_order_total
AFTER INSERT OR DELETE ON order_items
FOR EACH ROW
BEGIN
    UPDATE orders o
    SET o.total = (SELECT SUM(quantity * price) FROM order_items WHERE order_id = :new.order_id)
    WHERE o.id = :new.order_id;
END;/

-- 9.
CREATE OR REPLACE TRIGGER send_review_notification
AFTER INSERT ON reviews
FOR EACH ROW
DECLARE
    reviewer_email VARCHAR2(100);
    product_name VARCHAR2(100);
    email_subject VARCHAR2(100);
    email_body VARCHAR2(4000);
BEGIN
    -- Mendapatkan email pengguna yang memberikan ulasan
    SELECT email INTO reviewer_email
    FROM users
    WHERE id = :new.user_id;

    -- Mendapatkan nama produk yang diulas
    SELECT name INTO product_name
    FROM products
    WHERE id = :new.product_id;

    -- Menyiapkan subjek dan isi email
    email_subject := 'Konfirmasi Ulasan Baru untuk Produk ' || product_name;
    email_body := 'Terima kasih atas ulasan Anda untuk produk ' || product_name || '. Ulasan Anda telah diterima dan akan ditampilkan di halaman produk.';

    -- Mengirim email
    UTL_MAIL.send(sender => 'admin@toko-laptop.com',
                  recipients => reviewer_email,
                  subject => email_subject,
                  message => email_body);
EXCEPTION
    WHEN OTHERS THEN
        -- Tangani kesalahan jika pengiriman email gagal
        DBMS_OUTPUT.put_line('Gagal mengirim email konfirmasi: ' || SQLERRM);
END;
/