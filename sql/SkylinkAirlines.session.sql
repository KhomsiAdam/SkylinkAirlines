-- @block
CREATE TABLE admins (
    admin_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    admin_name VARCHAR(128) NOT NULL,
    admin_password VARCHAR(128) NOT NULL
);
-- @block
CREATE TABLE users (
    users_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    users_firstname VARCHAR(128) NOT NULL,
    users_lastname VARCHAR(128) NOT NULL,
    users_email VARCHAR(128) NOT NULL UNIQUE,
    users_password VARCHAR(128) NOT NULL,
    users_dateofbirth DATE NOT NULL,
    users_country VARCHAR(128) NOT NULL,
    users_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- @block
CREATE TABLE flights (
    flight_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    flight_type VARCHAR(128) NOT NULL,
    flight_origin VARCHAR(128) NOT NULL,
    flight_destination VARCHAR(128) NOT NULL,
    flight_departure_time DATETIME NOT NULL,
    flight_return_time DATETIME,
    flight_price INT NOT NULL,
    flight_seats INT NOT NULL,
    flight_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    flight_updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- @block
CREATE TABLE reservations (
    reserv_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    users_id INT NOT NULL,
    flight_id INT NOT NULL,
    reserv_type VARCHAR(128) NOT NULL,
    reserv_origin VARCHAR(128) NOT NULL,
    reserv_destination VARCHAR(128) NOT NULL,
    reserv_departure_time DATETIME NOT NULL,
    reserv_status VARCHAR(128) NOT NULL,
    reserv_seats INT NOT NULL,
    reserv_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    reserv_updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (users_id) REFERENCES users(users_id),
    FOREIGN KEY (flight_id) REFERENCES flights(flight_id)
);

-- @block
CREATE TABLE passengers (
    passengers_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    reserv_id INT NOT NULL,
    passengers_firstname VARCHAR(128) NOT NULL,
    passengers_lastname VARCHAR(128) NOT NULL,
    passengers_dateofbirth DATE NOT NULL,
    passengers_country VARCHAR(128) NOT NULL,
    passengers_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reserv_id) REFERENCES reservations(reserv_id)
);